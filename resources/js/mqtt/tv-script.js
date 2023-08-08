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
    let currentCategory, nextCategory;
    /* Current question and next question */
    let currentQuestionNo = 1, nextQuestionNo = 1;
    /* Is additional (direct) question or just normal question */
    let questionType = "normal";

    /* For switching between High Score, Open Line and questions */
    let openLine = false;

    /* Waiting time between correct answer and new questions */
    let waitPeriod = 2000;

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
                currentQuestionNo = data['question_no'];
                nextQuestionNo    = data['next_question'];

                /* Set current and next question categories */
                currentCategory = data['question']['category'];
                nextCategory = data['next_question']['category'];
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

                setTimeout(function (){
                    /* Set colors to default */
                    quiz.defaultAnswersColors();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();

                    /* Show total score of 200 BAM */
                    quiz.totalScore(data['total_money']);

                }, waitPeriod);
            }
            else if(subCode === '50002' || subCode === '50003'){
                if(data['question_type'] === "normal"){
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


                /*
                 *  Wait for waitPeriod and:
                 *      if answered question is 3, then reveal first level screen
                 *      else if current question is 6, then reveal second level screen
                 *      else reveal category screen
                 */

                setTimeout(function (){
                    if(data['answered_question_no'] === 3){
                        quiz.levelQuestion("reveal", "first");
                    }else if(data['answered_question_no'] === 6){
                        quiz.levelQuestion("reveal", "second");
                    }else if(data['answered_question_no'] === "6+"){
                        quiz.levelQuestion("reveal", "third");
                    }else{
                        quiz.questionFromCategory("reveal", nextCategory);
                    }

                    /* Set colors to default */
                    quiz.defaultAnswersColors();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();
                }, waitPeriod);

                console.log("Question type: " + data['question_type']);
            }
            else if(subCode === '50002'){


                return;


                /* Show if answer is correct or incorrect */
                // if(parseInt(response['data']['current_question']) === 4){
                //     /* This is for additional questions */
                //     quiz.additionalAnswer("correct");
                // }else{
                //     quiz.finalAnswer(proposedAnswer, correctAnsLetter);
                // }
                console.log(response['data']);

                setTimeout(function (){
                    /* Correct answer */
                    // quiz.setQuestion(subCode, response['data']['question']);

                    /* Level stars */
                    quiz.setStars(parseInt(response['data']['current_question']));
                }, waitPeriod);

                /* Set question type */
                // questionType = "normal";

                /* Set correct answer letter */
                correctAnsLetter = response['data']['question']['correct_answer'];
            }
            else if(subCode === '50003'){
                /*
                *   Here will come following questions
                *       - 3
                *       - 6
                *       - 7
                * */
                // if(parseInt(response['data']['current_question']) === 3 || parseInt(response['data']['current_question']) === 6){
                //     quiz.finalAnswer(proposedAnswer, correctAnsLetter);
                // }
                // else if(parseInt(response['data']['current_question']) === 7){
                //     /* This is for additional questions */
                //     quiz.additionalAnswer("correct");
                // }

                setTimeout(function (){
                    /* Correct answer, open level question */
                    // quiz.setDirectQuestion(subCode, response['data']['question']);

                    /* Level stars */
                    // quiz.setStars(parseInt(response['data']['current_question']));
                }, waitPeriod);

                /* Set question type */
                // questionType = "direct";
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
            }
            else if(subCode === '50007'){
                /* Mark answer as correct */
                quiz.additionalAnswer("correct");
                quiz.setStars("third");

                setTimeout(function (){
                    /* Set colors to default */
                    quiz.defaultAnswersColors();
                    /* Set colors for additional (direct) answer to default */
                    quiz.cleanAdditionalAnswerProposal();

                    /* Show total score of 200 BAM */
                    quiz.totalScore(200);
                }, waitPeriod);
            }
            else if(subCode === '50010'){
                /* Reveal the question form is called here */
                currentQuestionNo = data['question_no'];
                nextQuestionNo    = data['next_question'];

                /* Set current and next question categories */
                currentCategory = data['question']['question']['category'];
                if(parseInt(data['question_no']) < 7) nextCategory = data['next_question']['category'];
                else nextCategory = null;

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
            }else if(subCode === '50011'){
                /* Force quiz finnish; Operator action */
                /* Answer is incorrect */
                jokerAvailable = true;
                quiz.jokerAvailable();

                /* Set colors to default */
                quiz.defaultAnswersColors();
                /* Set colors for additional (direct) answer to default */
                quiz.cleanAdditionalAnswerProposal();

                /* Show total score of 200 BAM */
                quiz.totalScore(data['total_money']);
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
