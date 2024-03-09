/* This script is used for MQTT messaging system */
window.d3 = require('../libraries/d3');
window.mqttInit = require('../layout/mqtt-init');

/* Include functions for handling GUI */
window.quiz = require('./snippets/quiz');
/* Import scripts for HTTP requests */
window.helper = require('./snippets/helper');

$(document).ready(function () {
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));
    /* Last question category index */
    let lastCategory = 7;

    let jokerAvailable = true;
    /* Letter of correct answer */
    let correctAnsLetter = "", proposedAnswer = "";
    /* Current question category and next question category for category screens */
    let currentCategory, currentCategoryCustomTitle = "", currentCategoryImage = null, currentCategorySound = null, nextCategory = 1;
    /* Current question and next question */
    let currentQuestionNo = 1, nextQuestionNo = 1;
    /* Is additional (direct) question or just normal question */
    let questionType = "normal";
    /* Current level */
    let currentLevel = 0;

    /* For switching between High Score, Open Line and questions */
    let openLine = true, openLineCounter = 0, openLineSymbol = false, phoneNumber = 1, phoneNumberCounter = 1;

    /* Question timer */
    let questionTimer = 5, counterActive = false, counterNormalTimer = true;

    const interval = setInterval(function() {
        /*
         *  Timer: Every user has 5 seconds to answer the question before time is over
         */
        // if(counterActive){
        //     client.publish(mqttInit.liveFeedTVScreenTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50101", "time" : questionTimer }}), { qos: 0, retain: false }, function (error) {
        //         if (error) { console.log(error); }
        //     });
        //
        //     quiz.setTime(questionTimer);
        //
        //     if(questionTimer > 0) {
        //         if(questionTimer < 5){
        //             const audio = new Audio("/sounds/beep.wav");
        //             audio.play().then(r => function () {});
        //         }
        //
        //         questionTimer -= 1;
        //     }
        //     else{
        //         const audio = new Audio("/sounds/incorrect-answer.wav");
        //         audio.play().then(r => function () {});
        //
        //         /* Done ! We should finnish quiz ! */
        //         client.publish(mqttInit.liveFeedTVScreenTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50102", "time" : questionTimer }}), { qos: 0, retain: false }, function (error) {
        //             if (error) { console.log(error); }
        //         });
        //
        //         counterActive = false;
        //         questionTimer = 5;
        //     }
        // }

        /* Open Line GUI animations */
        if(openLine){
            /* Fade In and fade Out symbols */
            openLineSymbol = !openLineSymbol;
            if(openLineSymbol) {
                $("#UsklicnikGroupOLAfter").fadeIn(1000);
                $("#SignalGroup").fadeIn(1000);
            }else {
                $("#UsklicnikGroupOLAfter").fadeOut(1000);
                $("#SignalGroup").fadeOut(1000);
            }

            /* Right line raise and fall */
            if(openLineCounter === 8){
                for(let i=1; i<=7; i++){ $(".lbg-ol-" + i).addClass('d-none'); }
                openLineCounter = 0;

                if(phoneNumber){
                    $("#call_number_one").addClass('d-none');
                    $("#call_number_two").removeClass('d-none');
                }else{
                    $("#call_number_two").addClass('d-none');
                    $("#call_number_one").removeClass('d-none');
                }
                phoneNumber = !phoneNumber;
            }else{
                for(let i=1; i<=7; i++){ $(".lbg-ol-" + openLineCounter).removeClass('d-none'); }
                openLineCounter++;
            }

            /* Toggle phone numbers */
            if(phoneNumberCounter % 5 === 0){

            }

            phoneNumberCounter ++;
        }
    }, 1000);

    /* Waiting time between correct answer and new questions */
    let waitPeriod = 5000;

    /* Last answered question number */
    let answeredQuestionNo = 1;

    client.on('error', (err) => { client.end() });
    client.on('reconnect', () => { console.log('Reconnecting...'); });
    client.on('connect', () => {
        // Subscribe to topic
        client.subscribe(mqttInit.mainTopic(), { qos: 0 });

        /* Show SVG element */
        $(".main-svg-file").removeClass('d-none');

        console.log("Connected to " + mqttInit.mainTopic());
    });

    client.on('disconnect', () => { console.log('Client disconnected:' + clientID); });

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());

        if(response['code'] === '0000'){
            /* Message type */
            let subCode = response['data']['sub_code'];
            let data    = response['data'];

            if(subCode === '50000'){
                /* Quiz just started, show screen for questions */

                /*
                 *  Joker is actually available since new quiz is started so we need to raise flag for joker available
                 *  but since it can't be used on first question, it is also disabled !
                 * */
                jokerAvailable = true; quiz.jokerAvailable(); quiz.jokerDisabled();

                /* Hide line open GUI */
                quiz.openLine("hide");

                /* Reveal normal question (always first category) */
                quiz.revealTheQuestion(subCode, response['data']['question'], 1);

                /* Set correct answer letter */
                correctAnsLetter = data['question']['correct_answer'];

                /* Current and next question numbers */
                currentQuestionNo = data['current_question'];
                nextQuestionNo    = data['next_question'];

                /* Set current and next question categories */
                currentCategory = data['question']['category'];
                nextCategory = data['next_question']['category'];

                /* Set total score to default value - Hide all elements */
                quiz.totalScoreDefaultValue();

                /* Set timer counter as inactive */
                counterActive = false;
                /* Set default timer value to 5 and set GUI */
                // questionTimer = 5; quiz.setTime(questionTimer);

                /* Set colors to default */
                quiz.cleanAnswerProposal();
                /* Clean colors for additional answer */
                quiz.cleanAdditionalAnswerProposal();

                /* Set color by category; Since quiz just started, first category is one so set it as blue */
                quiz.changeColorByCategory(1);

                /* Set timer value */
                quiz.resetTimer(data['timer']);
            }
            if(subCode === '50001' || subCode === "50009"){
                /* Answer is incorrect */

                if(subCode === "50001"){
                    /* Mark it as red then show line open gui */
                    quiz.answerTheQuestion(correctAnsLetter, data['chosen_letter']);
                }else{
                    /* Mark it as incorrect and go with it finally :) */
                    quiz.additionalAnswer("incorrect");
                }

                /* Set timer counter as inactive */
                counterActive = false;

                setTimeout(function (){
                    /* Set colors to default */
                    quiz.cleanAnswerProposal();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();
                    /* Show total score - BAM */
                    quiz.totalScore(data['total_money']);
                    /* Remove level stars */
                    quiz.resetStars();
                    currentLevel = 0;
                    quiz.resetLevelQuestionStars();

                    /* Set timer value */
                    quiz.resetTimer(data['timer']);
                    /*
                     *  Since answer is incorrect; next user can use joker and it becomes available; Also hence it will open
                     *  new question, it also becomes disabled
                     * */
                    jokerAvailable = true; quiz.jokerAvailable(); quiz.jokerDisabled();

                    /* Reset to default question number | Set next category to default - first one */
                    currentQuestionNo = 1; currentCategory = 1; nextCategory = 1;
                }, waitPeriod);
            }
            else if(subCode === '50002' || subCode === '50003'){
                /* Answer is correct! */

                /* Now, we have info about current category */
                currentCategory = data['current_category'];

                if(data['next_question_type'] === "normal"){
                    /* Show correct answer */
                    quiz.answerTheQuestion(correctAnsLetter);
                }else{
                    /* Mark answer as correct */
                    quiz.additionalAnswer("correct");

                    /* Increase number of stars */
                    if(data['answered_question_no'] === "3+"){
                        quiz.setStars("first");
                        /* Rise flag for first level */
                        currentLevel = 1;
                    }else if(data['answered_question_no'] === "6+"){
                        quiz.setStars("second");
                        /* Rise flag for second level */
                        currentLevel = 2;
                    }
                }

                /* Set timer counter as inactive */
                counterActive = false;

                answeredQuestionNo = data['answered_question_no'];
            }
            else if(subCode === '50004'){
                /* Joker used */
                /* Disable further joker usage; Joker now becomes enabled to show joker is not available anymore */
                jokerAvailable = false; quiz.jokerUsed(); quiz.jokerEnabled();

                /* Set current category from question */
                currentCategory = data['current_category'];

                // We should not reveal question here

                /* Set correct answer letter */
                correctAnsLetter = data['question']['correct_answer'];
                quiz.announceCategory("reveal", 0);

                /* Set timer counter as inactive */
                counterActive = false;
                /* Set default timer value to 5 */
                // questionTimer = 5;

                const jokerMusic = new Audio("/sounds/joker.wav");
                jokerMusic.play().then(r => function () {});

                /* Set timer value */
                quiz.resetTimer(data['timer']);
            }
            else if(subCode === '50007'){
                /* Mark answer as correct; User just won 200 BAM! */
                quiz.additionalAnswer("correct");
                quiz.setStars("third");
                /* Rise flag for third level */
                currentLevel = 3;

                /* Set timer counter as inactive */
                counterActive = false;

                setTimeout(function (){
                    /* Set colors to default */
                    quiz.cleanAnswerProposal();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();

                    /* Show total score of 200 BAM */
                    quiz.totalScore(200);

                    /* Remove level stars */
                    quiz.resetStars();
                    currentLevel = 0;

                    nextCategory = 1;

                    quiz.resetLevelQuestionStars();
                }, waitPeriod);
            }
            else if(subCode === '50010'){
                /* Reveal the question form is called here */
                currentQuestionNo = data['current_question'];
                nextQuestionNo    = data['next_question'];

                /* Reset counter to 5 seconds */
                // questionTimer = 5;

                /* Set GUI */
                // quiz.setTime(questionTimer);

                /* Hide line open GUI */
                quiz.openLine("hide");

                /* Set current and next question categories */
                currentCategory = data['current_category'];

                if(parseInt(data['current_question']) < 7) nextCategory = data['next_question']['category'];
                else nextCategory = 1;

                /* Detect question type: normal or additional */
                questionType = (parseInt(data['question']['additional']) === 1) ? "additional" : "normal";

                if(questionType === "normal"){
                    /* Now, we should set normal question  */
                    quiz.revealTheQuestion(subCode, response['data']['question']['question'], currentCategory);
                }else{
                    /* Additional (direct) question and last question, timer should last 10 seconds */
                    // questionTimer = 10;

                    /* Set additional (direct) question */
                    if(currentQuestionNo === 7){
                        quiz.announceCategory("reveal", lastCategory);

                        const nobelMusic = new Audio("/sounds/nobel_opened.wav");
                        nobelMusic.play().then(r => function () {});

                        setTimeout(function (){
                            quiz.setDirectQuestion(subCode, response['data']['question']['question'], currentCategory);
                        }, waitPeriod);
                    }else{
                        quiz.setDirectQuestion(subCode, response['data']['question']['question'], currentCategory);
                    }
                }

                /* Set correct answer letter */
                correctAnsLetter = data['question']['question']['correct_answer'];
            }
            else if(subCode === '50011'){
                /* Reveal middle screen - Category or Level question screen */
                console.log("Data", data);

                /* Hide line open GUI */
                quiz.openLine("hide");

                let currentQuestionNo = parseInt(data['current_question']);
                let additional = parseInt(data['question']['additional']);
                currentCategory = data['current_category'];

                /* Added in V2.0 */
                currentCategoryImage = data['current_category_image'];
                currentCategorySound = data['current_category_sound'];
                currentCategoryCustomTitle = data['current_category_custom_title'];

                /* Set timer value */
                quiz.resetTimer(data['timer']);

                if(additional){
                    /* If joker is not used; I has to be disabled on this part */
                    if(jokerAvailable) quiz.jokerDisabled();

                    if(currentQuestionNo === 3){
                        quiz.announceLevelQuestion("reveal", "first");
                    }else if(currentQuestionNo === 6){
                        quiz.announceLevelQuestion("reveal", "second");
                    }else if(currentQuestionNo === 7){
                        quiz.announceLevelQuestion("reveal", "third");
                    }
                }else{
                    quiz.jokerEnabled();
                    quiz.announceCategory("reveal", currentCategory, currentCategoryCustomTitle, currentCategoryImage, currentCategorySound);
                }


                /* Set colors to default */
                quiz.cleanAnswerProposal();
                /* Set colors for additional (direct) answer to default */
                quiz.cleanAdditionalAnswerProposal();

                /* Send message back to browser; Inform that message has been received and screen has been changed */
                client.publish(mqttInit.liveFeedTVScreenTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50100" }}), { qos: 0, retain: false }, function (error) {
                    if (error) {
                        console.log(error);
                    }
                });
            }
            else if(subCode === '50014'){
                /* User is created; Show first category */
                // quiz.announceCategory("reveal", data['category']);

                /* Set timer counter as inactive */
                // counterActive = false;
            }
            else if(subCode === '50015'){
                /* Force quiz finnish; Operator action */
                /* Answer is incorrect */

                /* Make joker available for next round; Also make joker disabled since it's first question */
                jokerAvailable = true; quiz.jokerAvailable(); quiz.jokerDisabled();

                /* Set colors to default */
                quiz.cleanAnswerProposal();
                /* Set colors for additional (direct) answer to default */
                quiz.cleanAdditionalAnswerProposal();

                /* Show total score - BAM */
                quiz.totalScore(data['total_money']);

                /* Remove level stars */
                quiz.resetStars();
                currentLevel = 0;
                quiz.resetLevelQuestionStars();

                nextCategory = 1;

                /* Set timer counter as inactive */
                counterActive = false;
            }
            else if(subCode === '50020'){
                /* Show open line GUI */
                // quiz.lineOpen();
            }

            /* Frontend messages */
            /* Start time counter; Number of seconds to answer */
            else if(subCode === '50101'){
                quiz.setTime(data['questionTimer'], data['timerDuration']);
                const audio = new Audio("/sounds/beep.wav");

                if(data['timerDuration'] === 10){
                    if(data['questionTimer'] !== 10) audio.play().then(r => function () {});
                }
                else if(data['timerDuration'] === 5){
                    if(data['questionTimer'] !== 5) audio.play().then(r => function () {});
                }


            }else if(subCode === '50102'){
                counterActive = false;
            }

            /* Open Lines */
            else if(subCode === '50103'){
                let status = data['status'];
                let type   = data['type'];
                let sdID   = data['id'];

                // console.log("Type: " + type, " ID: " + sdID, " Status: " + status);

                if(status === 'open'){
                    openLine = true;
                    quiz.openLine("reveal", type, sdID);

                    if(type === 'sponsor-data'){
                        /* Play sound */
                        let sound = data['sound'];

                        if(typeof sound === 'string'){
                            const jokerMusic = new Audio("/sounds/sponsors/" + sound);
                            jokerMusic.play().then(r => function () {});
                        }
                    }
                }else{
                    openLine = false;
                    quiz.openLine("hide", type, sdID);
                }

                /* Set as default */
                openLineCounter = 0;
                for(let i=1; i<=7; i++){ $(".lbg-ol-" + i).addClass('d-none'); }
            }

            /**
             *  Custom script calls for sponsors
             */
            else if(subCode === '51200'){
                $("#" + data['elem_id']).removeClass('d-none');
                // console.log();
            }

            else{
                console.log("Nothing here ...");

            }

            /* If info about total earned money is sent */
            if(typeof response['data']['total_money'] !== 'undefined' && response['data']['total_money'] !== null){
                // setTotalMoney(response['data']['total_money']);
            }
        }else{
            console.log("Error: " + response);
        }

    });
    client.on('unubscribe', (topic, message, packet) => { console.log("Unsubscribed ..."); });

    /* -------------------------------------------------------------------------------------------------------------- */
    /* On screen load, show Open Lines; Create HTTP and notify all users for this screen */

    helper.createHTTP("reveal-open-line", "/system/quiz-play/live/open-line", "POST", {source: "tv", action: "init"});
});
