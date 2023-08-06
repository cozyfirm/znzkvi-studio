/* This script is used for MQTT messaging system */
window.mqttInit = require('../layout/mqtt-init');

/* Include functions for handling GUI */
window.quiz = require('./snippets/quiz');

$(document).ready(function () {
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

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

            if(subCode === '50000'){
                /* Quiz just started, show screen for questions */
                quiz.setQuestion(subCode, response['data']['question']);
            }
            else if(subCode === '50002'){
                /* Correct answer */
                quiz.setQuestion(subCode, response['data']['question']);
            }else if(subCode === '50003'){
                /* Correct answer, open level question */
                parseAdditionalQuestion(response['data']['question']);
            }else if(subCode === '50004'){
                /* Joker used */
                parseQuestion(response['data']['question']);
                /* Disable further joker usage */
                jokerActive = false;
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

        return;

        /* Change question */
        $("#questionText").text(msg['question']);
        $("#AnswerTextA").text(msg['answerA']);
        $("#AnswerTextB").text(msg['answerB']);
        $("#AnswerTextC").text(msg['answerC']);
        $("#AnswerTextD").text(msg['answerD']);

    });
    client.on('unubscribe', (topic, message, packet) => {
        console.log("Unsubscribed ...");
    });
});
