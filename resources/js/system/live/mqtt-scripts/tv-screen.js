/* Is mid screen revealed to users */
import { vars } from './../snippets/variables';

$(document).ready(function () {
    let timerStarted = false;

    /* Is screen revealed or not */
    // let screenRevealed = im_screenRevealed;

    /* Connect to MQTT */
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

    client.on('error', (err) => {
        notify.Me(['Connection error: ' + err, "warn"]);

        client.end();
    });

    client.on('reconnect', () => { notify.Me(['Reconnecting to MQTT .. ', "warn"]); });

    client.on('connect', () => {
        // Subscribe to topic
        client.subscribe(mqttInit.liveFeedTVScreenTopic(), { qos: 0 })
    });

    client.on('disconnect', () => { notify.Me(['Client disconnected:' + clientID, "warn"]); });

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());
        let code = response['code'];
        let data = response['data'];

        if(code === '0000'){
            let subCode = data['sub_code'];

            if(subCode === '50100'){
                /* Mid screen revealed on TV screen */
                vars.screenRevealed = "yes";

                $(".fa-eye").removeClass('d-none');
                $(".fa-eye-slash").addClass('d-none');
                $(".fa-spinner").addClass('d-none');
            }
            else if(subCode === '50101'){
                $(".question-timer").text(data['time']);
            }
            else if(subCode === '50102'){
                $(".question-timer-wrapper").addClass('lh-e-time-expired').addClass('animated').addClass('shake');
            }
        }else{
            notify.Me(['Desila se greška prilikom čitanja MQTT poruke!', "warn"]);
        }
    });

    let guiTimer = function(){
        if(!vars.questionRevealed){
            notify.Me(['Niste još otvorili pitanje!', "warn"]);
            return;
        }
        if(parseInt($(".question-timer").text()) === 0){
            notify.Me(['Ne možete restartovati timer !', "warn"]);

            return;
        }

        if(!timerStarted){
            /* Send message back to TV Screen; Start counting down */
            client.publish(mqttInit.mainTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50101" }}), { qos: 0, retain: false }, function (error) {
                if (error) {
                    console.log(error);
                }
            });

            timerStarted = true;
        }else{
            /* Send message back to TV Screen; Start counting down */
            client.publish(mqttInit.mainTopic(), JSON.stringify({"code" : "0000", "data" : { "sub_code" : "50102" }}), { qos: 0, retain: false }, function (error) {
                if (error) {
                    console.log(error);
                }
            });

            timerStarted = false;
        }
    };

    /* Start counting (seconds left to answer) */
    $(".question-timer-wrapper").click(function () {
        guiTimer();
    });

    $('body').keypress((event) => {
        let char = String.fromCharCode(event.which);

        if(char === " "){ guiTimer(); }
    });
});
