/* This script is used for MQTT messaging system */
window.mqttInit = require('../../layout/mqtt-init');

$(document).ready(function () {
    let data, subCode;

    /* Connect to MQTT */
    const clientID = mqttInit.clientID();
    const client   = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

    client.on('error', (err) => { notify.Me(['Global channel: Connection error ' + err, "warn"]); client.end(); });
    client.on('reconnect', () => { console.log('Reconnecting to: "Global channel"'); /* notify.Me([, "warn"]); */ });
    client.on('connect', () => { client.subscribe(mqttInit.globalChannel(), { qos: 0 }) });
    client.on('disconnect', () => { notify.Me(['Client disconnected (Global channel):' + clientID, "warn"]); });

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());

        if(response['code'] === '0000'){
            data = response['data']; subCode = data['sub_code'];

            if(subCode === '51010'){
                $(".open-line-g-btn").removeClass('bg-red').addClass('bg-green');
            }
            else if(subCode === '51011'){
                $(".open-line-g-btn").addClass('bg-red').removeClass('bg-green');
            }else if(subCode === '51012'){
                /* Live feed show or hide */
                if(data['status'] === 'show'){
                    $(".live-feed-m-elem").removeClass('d-none');
                    /* Set active quiz id as attribute */
                    $(".lf-m-e-w").attr('active-quiz', data['quiz_id']).attr('href', data['route']);
                }else{
                    $(".live-feed-m-elem").addClass('d-none');
                }
            }
        }else{
            notify.Me(['Desila se greška prilikom čitanja MQTT poruke!', "warn"]);
        }
    });
});
