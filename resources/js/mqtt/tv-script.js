/* This script is used for MQTT messaging system */
window.d3 = require('../libraries/d3');
window.mqttInit = require('../layout/mqtt-init');

/* Include functions for handling GUI */
window.quiz = require('./snippets/quiz');

$(document).ready(function () {
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));
    let jokerAvailable = true;
    /* Letter of correct answer */
    let correctAnsLetter = "", proposedAnswer = "";

    /* For switching between High Score, Open Line and questions */
    let openLine = false, questionType = "normal";

    /* Waiting time between correct answer and new questions */
    let waitPeriod = 3000;

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

            /* First, clean all proposals */
            quiz.cleanProposals();

            if(subCode === '50000'){
                /* Quiz just started, show screen for questions */
                jokerAvailable = true;
                quiz.jokerAvailable();

                /* Show questions GUI */
                quiz.lineOpenHide();

                /* Set questions value */
                quiz.setQuestion(subCode, response['data']['question']);

                /* Set question type */
                questionType = "normal";

                /* Set correct answer letter */
                correctAnsLetter = response['data']['question']['correct_answer'];
            }
            if(subCode === '50001'){
                /* Answer is incorrect */
                jokerAvailable = true;
                quiz.jokerAvailable();

                /* Mark it as red then show line open gui */
                quiz.finalAnswer(response['data']['chosen_letter'], correctAnsLetter);

                setTimeout(function (){
                    /* Show line open GUI */
                    quiz.lineOpen();
                }, waitPeriod);
            }
            else if(subCode === '50002'){
                console.log("Current question, code 5002: " + response['data']['current_question']);

                /* Show if answer is correct or incorrect */
                if(parseInt(response['data']['current_question']) === 4){
                    /* This is for additional questions */
                    quiz.additionalAnswer("correct");
                }else{
                    quiz.finalAnswer(proposedAnswer, correctAnsLetter);
                }

                setTimeout(function (){
                    /* Correct answer */
                    quiz.setQuestion(subCode, response['data']['question']);

                    /* Level stars */
                    quiz.setStars(parseInt(response['data']['current_question']));
                }, waitPeriod);

                /* Set question type */
                questionType = "normal";

                /* Set correct answer letter */
                correctAnsLetter = response['data']['question']['correct_answer'];
            }else if(subCode === '50003'){
                /*
                *   Here will come following questions
                *       - 3
                *       - 6
                *       - 7
                * */
                if(parseInt(response['data']['current_question']) === 3 || parseInt(response['data']['current_question']) === 6){
                    quiz.finalAnswer(proposedAnswer, correctAnsLetter);
                }
                else if(parseInt(response['data']['current_question']) === 7){
                    /* This is for additional questions */
                    quiz.additionalAnswer("correct");
                }

                setTimeout(function (){
                    /* Correct answer, open level question */
                    quiz.setDirectQuestion(subCode, response['data']['question']);

                    /* Level stars */
                    quiz.setStars(parseInt(response['data']['current_question']));
                }, waitPeriod);

                /* Set question type */
                questionType = "direct";
            }else if(subCode === '50004'){
                /* Joker used */

                /* Disable further joker usage */
                jokerAvailable = false;
                quiz.jokerUsed();

                quiz.setQuestion(subCode, response['data']['question']);

                /* Set correct answer letter */
                correctAnsLetter = response['data']['question']['correct_answer'];
            }else if(subCode === '50007'){
                /* Quiz is finished; All 7 questions answered correctly */
                /* This is for additional questions */
                quiz.additionalAnswer("correct");

                quiz.setStars(8);
            }else if(subCode === '50020'){
                /* Show open line GUI */
                quiz.lineOpen();
            }else if(subCode === '50030'){
                /* Propose answer and propose joker used ? */
                proposedAnswer = response['data']['letter'];
                quiz.proposeAnswer(response['data']['letter']);
            }else{
                /* Answer is not correct */
            }


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

    // quiz.lineOpenHide();
    // quiz.displayQuestion("#directQuestionText", "Bosanac, kada se osjeća neugodno na nekom radnom mjestu. Reći će da se osjeća kao koja životinja u kojem  gradu? Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius purus libero, ut tristique risus luctus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius.");
});
