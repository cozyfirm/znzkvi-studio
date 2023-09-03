window.mqttInit = require('../layout/mqtt-init');

$(document).ready(function () {
    let currentCategory = 1, nextCategory = 1, lastCategory = 7;
    let currentQuestionNo = 1, nextQuestionNo = 1, questionType = "normal";
    let correctAnsLetter = "A";

    let waitPeriod = 5000;

    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

    client.on('reconnect', () => {  });
    client.on('connect', () => { client.subscribe(mqttInit.presenterTopic(), { qos: 0 }); });
    client.on('disconnect', () => { console.log('Client disconnected:' + clientID); });

    /* Set header information such as User, quiz no, etc .. */
    let setHeaderInfo = function(headers){
        $(".ps-user-name").text(headers['user']['name']);
        $(".ps-user-address").text(headers['user']['address'] + ', ' + headers['user']['city'] + " - " + headers['user']['country_rel']['name']);

        /* Quiz number */
        $(".qn_c_text").text(headers['currentQuiz']);
    };

    let setTotalScore = function(score){
        $(".all-users-score").empty();

        for(let i=0; i<score.length; i++){
            $(".all-users-score").append(function () {
                return $("<div>").attr('class', 'statistics-row')
                    .append(function () {
                        return $("<div>").attr('class', 'sr-no')
                            .append(function () {
                                return $("<p>").text((i + 1) + ".");
                            })
                    })
                    .append(function () {
                        return $("<div>").attr('class', 'sr-user')
                            .append(function () {
                                return $("<h4>").text(score[i]['user_rel']['name']);
                            })
                            .append(function () {
                                return $("<p>").text(score[i]['user_rel']['address'] + ', ' + score[i]['user_rel']['city'] + " - " + score[i]['user_rel']['country_rel']['name']);
                            })
                    })
                    .append(function () {
                        return $("<div>").attr('class', 'sr-icons')
                            .append(function () {
                                return $("<div>").attr('class', 'icon-wrapper')
                                    .append(function () {
                                        return $("<i>").attr('class', 'fa-solid fa-sack-dollar');
                                    })
                                    .append(function () {
                                        return $("<div>").attr('class', 'iw-t')
                                            .append(function () {
                                                return $("<p>").text(score[i]['total_money']);
                                            })
                                    })
                            })
                    })
            });
        }
    };

    let setNormalQuestion = function(question){
        $(".announce-category-screen").addClass('d-none');
        $(".announce-level-question").addClass('d-none');

        $("#question").val(question['question']);
        $(".single-question-answers").removeClass('d-none');
        $(".additional-question-answer").addClass('d-none');

        $("#answer_a").val(question['answer_a_rel']['answer']);
        $("#answer_b").val(question['answer_b_rel']['answer']);
        $("#answer_c").val(question['answer_c_rel']['answer']);
        $("#answer_d").val(question['answer_d_rel']['answer']);

        /* Now, let's mark correct answer */
        $(".a-l-l").removeClass('bg-success').removeClass('text-white');
        $(".answer-" + question['correct_answer'] + "-label").addClass('bg-success').addClass('text-white');
    };
    let setDirectQuestion = function(question){
        $(".announce-category-screen").addClass('d-none');
        $(".announce-level-question").addClass('d-none');

        $(".single-question-answers").addClass('d-none');
        $(".additional-question-answer").removeClass('d-none');

        $("#question").val(question['additional_questions']);
        $("#aq_answer").val(question['additional_q_answer']);
    };

    let announceCategory = function(action, category){
        /* Hide level screen */
        $(".announce-level-question").addClass('d-none');
        /* Hide all images */
        $(".a-c-s-c").addClass('d-none');
        $(".announce-category-screen").removeClass('d-none');
        $(".cat_" + category).removeClass('d-none');
    };
    let announceLevelQuestion = function(action, level){
        /* Hide Category */
        $(".announce-category-screen").addClass('d-none');
        /* Hide all images */
        $(".a-l-q-l").addClass('d-none');
        /* Reveal level screen */
        $(".announce-level-question").removeClass('d-none');
        $(".level_" + level).removeClass('d-none');
    };

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());

        if(response['code'] === '0000'){
            /* Message type */
            let subCode = response['data']['sub_code'];
            let data    = response['data'];

            console.log(data);

            if(subCode === '50000'){
                /* Quiz just started*/
                setNormalQuestion(data['question']);

                /* Set header info */
                setHeaderInfo(data['headers']);
                /* Set total score */
                setTotalScore(data['score']);
            }
            else if(subCode === '50010'){
                /* Reveal the question form is called here */
                currentQuestionNo = data['current_question'];
                /* Set current and next question categories */
                currentCategory = data['current_category'];
                if(parseInt(data['current_question']) < 7) nextCategory = data['next_question']['category'];
                else nextCategory = 1;

                /* Detect question type: normal or additional */
                questionType = (parseInt(data['question']['additional']) === 1) ? "additional" : "normal";

                if(questionType === "normal"){
                    /* Now, we should set normal question  */
                    setNormalQuestion(response['data']['question']['question']);
                }else{
                    /* Set additional (direct) question */
                    if(currentQuestionNo === 7){
                        announceCategory("reveal", lastCategory);

                        setTimeout(function (){
                            setDirectQuestion(response['data']['question']['question'], currentCategory);
                        }, waitPeriod);
                    }else{
                        setDirectQuestion(response['data']['question']['question'], currentCategory);
                    }
                }

                /* Set correct answer letter */
                correctAnsLetter = data['question']['question']['correct_answer'];
            }
            else if(subCode === '50011'){
                /* Reveal mid screen - Category or Level question screen */

                /* Set header info */
                setHeaderInfo(data['headers']);
                /* Set total score */
                setTotalScore(data['score']);

                let currentQuestionNo = parseInt(data['current_question']);
                let additional = parseInt(data['question']['additional']);
                currentCategory = data['current_category'];

                if(additional){
                    if(currentQuestionNo === 3){
                        announceLevelQuestion("reveal", "first");
                    }else if(currentQuestionNo === 6){
                        announceLevelQuestion("reveal", "second");
                    }else if(currentQuestionNo === 7){
                        announceLevelQuestion("reveal", "third");
                    }
                }else{
                    announceCategory("reveal", currentCategory);
                }
            }
            else if(subCode === '55014'){
                /* User is created; Set user info and announce first category */
                $(".ps-user-name").text(data['user']['name']);
                $(".ps-user-address").text(data['user']['address'] + ', ' + data['user']['city'] + " - " + data['user']['country_rel']['name']);

                /* Now, set the question value */
                setNormalQuestion(data['question']['question']);
                /* Now, let's announce category */
                announceCategory("reveal", data['question']['question']['category']);

                $(".qn_c_text").text(data['current_quiz_no']);
            }
            else if(subCode === '55010'){
                /* Open lines GUI manipulation */
                if(data['value'] === 1){
                    $(".open-lines").removeClass('d-none');
                }else{
                    $(".open-lines").addClass('d-none');
                }
            }

            /* In every other message; hide open lines */
            if(subCode !== '55010') $(".open-lines").addClass('d-none');
        }else{
            console.log(response);
            console.log("There has been an error, please do something about that !");
        }

    });
});
