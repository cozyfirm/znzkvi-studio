/* This script is used for MQTT messaging system */
window.d3 = require('../libraries/d3');
window.mqttInit = require('../layout/mqtt-init');

/* Include functions for handling GUI */
window.quiz = require('./snippets/quiz');

$(document).ready(function () {
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));
    /* Last question category index */
    let lastCategory = 7;

    let jokerAvailable = true;
    /* Letter of correct answer */
    let correctAnsLetter = "", proposedAnswer = "";
    /* Current question category and next question category for category screens */
    let currentCategory, nextCategory = 1;
    /* Current question and next question */
    let currentQuestionNo = 1, nextQuestionNo = 1;
    /* Is additional (direct) question or just normal question */
    let questionType = "normal";

    /* For switching between High Score, Open Line and questions */
    let openLine = false;

    /* Question timer */
    let questionTimer = 5, counterActive = false;

    const interval = setInterval(function() {
        if(counterActive){
            client.publish(mqttInit.liveFeedTVScreenTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50101", "time" : questionTimer }}), { qos: 0, retain: false }, function (error) {
                if (error) {
                    console.log(error);
                }
            });

            if(questionTimer > 0) questionTimer -= 1;
            else{
                /* Done ! We should finnish quiz ! */
                client.publish(mqttInit.liveFeedTVScreenTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50102", "time" : questionTimer }}), { qos: 0, retain: false }, function (error) {
                    if (error) {
                        console.log(error);
                    }
                });

                counterActive = false;
                questionTimer = 5;
            }
        }
    }, 1000);

    /* Waiting time between correct answer and new questions */
    let waitPeriod = 2000;

    /* Last answered question number */
    let answeredQuestionNo = 1;

    client.on('error', (err) => {
        console.log('Connection error: ', err);
        client.end()
    });

    client.on('reconnect', () => { console.log('Reconnecting...'); });

    client.on('connect', () => {
        console.log('Client connected:' + clientID);
        // Subscribe to topic
        client.subscribe(mqttInit.mainTopic(), { qos: 0 })
    });

    client.on('disconnect', () => { console.log('Client disconnected:' + clientID); });

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());

        if(response['code'] === '0000'){
            /* Message type */
            let subCode = response['data']['sub_code'];
            let data    = response['data'];

            /* First, clean all proposals */
            // quiz.cleanProposals();

            if(subCode === '50000'){
                /* Quiz just started, show screen for questions */
                jokerAvailable = true;
                quiz.jokerAvailable();

                /* Show questions GUI */
                quiz.lineOpenHide();

                /* Set questions value */
                quiz.setQuestion(subCode, response['data']['question']);

                /* Set question type */
                // questionType = "normal";

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
            }
            if(subCode === '50001' || subCode === "50009"){
                /* Answer is incorrect */
                jokerAvailable = true;
                quiz.jokerAvailable();

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
                    quiz.defaultAnswersColors();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();

                    /* Show total score - BAM */
                    quiz.totalScore(data['total_money']);

                    /* Set next category to default - first one */
                    nextCategory = 1;

                    /* Remove level stars */
                    quiz.resetStars();
                }, waitPeriod);
            }
            else if(subCode === '50002' || subCode === '50003'){
                if(data['next_question_type'] === "normal"){
                    /* Show correct answer */
                    quiz.answerTheQuestion(correctAnsLetter);
                }else{
                    /* Mark answer as correct */
                    quiz.additionalAnswer("correct");

                    /* Increase number of stars */
                    if(data['answered_question_no'] === "3+"){
                        quiz.setStars("first");
                    }else if(data['answered_question_no'] === "6+"){
                        quiz.setStars("second");
                    }
                }

                /* Set timer counter as inactive */
                counterActive = false;

                answeredQuestionNo = data['answered_question_no'];
            }
            else if(subCode === '50004'){
                /* Joker used */
                /* Disable further joker usage */
                jokerAvailable = false;
                quiz.jokerUsed();

                quiz.setQuestion(subCode, response['data']['question']);

                /* Set correct answer letter */
                correctAnsLetter = response['data']['question']['correct_answer'];
                quiz.questionFromCategory("reveal", currentCategory);

                /* Set timer counter as inactive */
                counterActive = false;
            }
            else if(subCode === '50007'){
                /* Mark answer as correct */
                quiz.additionalAnswer("correct");
                quiz.setStars("third");

                /* Set timer counter as inactive */
                counterActive = false;

                setTimeout(function (){
                    /* Set colors to default */
                    quiz.defaultAnswersColors();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();

                    /* Show total score of 200 BAM */
                    quiz.totalScore(200);

                    /* Remove level stars */
                    quiz.resetStars();

                    nextCategory = 1;
                }, waitPeriod);
            }
            else if(subCode === '50010'){
                /* Reveal the question form is called here */
                currentQuestionNo = data['current_question'];
                nextQuestionNo    = data['next_question'];

                /* Reset counter to 5 seconds */
                questionTimer = 5;

                /* Set current and next question categories */
                currentCategory = data['question']['question']['category'];
                if(parseInt(data['current_question']) < 7) nextCategory = data['next_question']['category'];
                else nextCategory = 1;

                /* Detect question type: normal or additional */
                questionType = (parseInt(data['question']['additional']) === 1) ? "additional" : "normal";

                if(questionType === "normal"){
                    /* Now, we should set normal question  */
                    quiz.setQuestion(subCode, response['data']['question']['question']);
                }else{
                    /* Set additional (direct) question */
                    if(currentQuestionNo === 7){
                        quiz.questionFromCategory("reveal", lastCategory);

                        setTimeout(function (){
                            quiz.setDirectQuestion(subCode, response['data']['question']['question']);
                        }, waitPeriod);
                    }else{
                        quiz.setDirectQuestion(subCode, response['data']['question']['question']);
                    }
                }

                /* Set correct answer letter */
                correctAnsLetter = data['question']['question']['correct_answer'];
            }
            else if(subCode === '50011'){
                /* Reveal mid screen - Category or Level question screen */

                let currentQuestionNo = parseInt(data['current_question']);
                let additional = parseInt(data['question']['additional']);

                if(additional){
                    if(currentQuestionNo === 3){
                        quiz.levelQuestion("reveal", "first");
                    }else if(currentQuestionNo === 6){
                        quiz.levelQuestion("reveal", "second");
                    }else if(currentQuestionNo === 7){
                        quiz.levelQuestion("reveal", "third");
                    }
                }else{
                    quiz.questionFromCategory("reveal", nextCategory);
                }


                /* Set colors to default */
                quiz.defaultAnswersColors();
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
                quiz.questionFromCategory("reveal", data['category']);

                /* Set timer counter as inactive */
                counterActive = false;
            }
            else if(subCode === '50015'){
                /* Force quiz finnish; Operator action */
                /* Answer is incorrect */
                jokerAvailable = true;
                quiz.jokerAvailable();

                /* Set colors to default */
                quiz.defaultAnswersColors();
                /* Set colors for additional (direct) answer to default */
                quiz.cleanAdditionalAnswerProposal();

                /* Show total score - BAM */
                quiz.totalScore(data['total_money']);

                /* Remove level stars */
                quiz.resetStars();

                nextCategory = 1;

                /* Set timer counter as inactive */
                counterActive = false;
            }
            else if(subCode === '50020'){
                /* Show open line GUI */
                quiz.lineOpen();
            }
            else if(subCode === '50030'){
                /* Propose answer and propose joker used ? */
                proposedAnswer = response['data']['letter'];
                quiz.proposeAnswer(response['data']['letter']);
            }
            /* Frontend messages */
            /* Start time counter; Number of seconds to answer */
            else if(subCode === '50101'){
                counterActive = true;
            }

            else{
                /* Answer is not correct */
            }

            // Categories: 1, 6, 3, 2, 5, 4, 7

            /* If info about total earned money is sent */
            if(typeof response['data']['total_money'] !== 'undefined' && response['data']['total_money'] !== null){
                // setTotalMoney(response['data']['total_money']);
            }
        }else{
            console.log("There has been an error, please do something about that !");
        }

    });
    client.on('unubscribe', (topic, message, packet) => {
        console.log("Unsubscribed ...");
    });

    // quiz.additionalAnswer("incorrect");
    /* Init screen with first category from questions */
    // quiz.questionFromCategory("reveal", 1);

    // quiz.lineOpen();
    // quiz.lineOpenHide();
    // quiz.displayQuestion("#directQuestionText", "Bosanac, kada se osjeća neugodno na nekom radnom mjestu. Reći će da se osjeća kao koja životinja u kojem  gradu? Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius purus libero, ut tristique risus luctus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius.");
});
