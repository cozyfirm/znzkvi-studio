window.mqttInit = require('../layout/mqtt-init');

$(document).ready(function () {
    let currentCategory = 1;

    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

    client.on('reconnect', () => {  });
    client.on('connect', () => { client.subscribe(mqttInit.presenterTopic(), { qos: 0 }); });
    client.on('disconnect', () => { console.log('Client disconnected:' + clientID); });

    let setNormalQuestion = function(question){
        console.log(question);
        $("#question").val(question['question']);
        $(".single-question-answers").removeClass('d-none');
        $(".additional-question-answer").addClass('d-none');

        $("#answer_a").val(question['answer_a_rel']['answer']);
        $("#answer_b").val(question['answer_b_rel']['answer']);
        $("#answer_c").val(question['answer_c_rel']['answer']);
        $("#answer_d").val(question['answer_d_rel']['answer']);

        console.log(question['correct_answer']);

        /* Now, let's mark correct answer */
        $(".a-l-l").removeClass('bg-success').removeClass('text-white');
        $(".answer-" + question['correct_answer'] + "-label").addClass('bg-success').addClass('text-white');
    };
    let announceCategory = function(category){

    };

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());

        if(response['code'] === '0000'){
            /* Message type */
            let subCode = response['data']['sub_code'];
            let data    = response['data'];

            console.log(data);

            if(subCode === '55014'){
                /* User is created; Set user info and announce first category */
                $(".ps-user-name").text(data['user']['name']);
                $(".ps-user-address").text(data['user']['address'] + ', ' + data['user']['city'] + " - " + data['user']['country_rel']['name']);

                /* Now, set the question value */
                setNormalQuestion(data['question']['question']);
                /* Now, let's announce category */
                announceCategory(data['question']['question']['category']);
            }
        }else{
            console.log(response);
            console.log("There has been an error, please do something about that !");
        }

    });
});
