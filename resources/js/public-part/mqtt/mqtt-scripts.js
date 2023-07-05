$(document).ready(function () {
    const clientID = mqttInit.clientID();

    const client = mqtt.connect(mqttInit.host(), mqttInit.options(clientID));

    client.on('error', (err) => {
        console.log('Connection error: ', err)
        client.end()
    });

    client.on('reconnect', () => {
        console.log('Reconnecting...')
    });

    client.on('connect', () => {
        console.log('Client connected:' + clientID);
        // Subscribe
        client.subscribe(mqttInit.mainTopic(), { qos: 0 })
    });

    client.on('disconnect', () => {
        console.log('Client disconnected:' + clientID);

        alert("Disconnecting ..");
    });

    client.on('message', (topic, message, packet) => {
        let msg = JSON.parse(message.toString());

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
