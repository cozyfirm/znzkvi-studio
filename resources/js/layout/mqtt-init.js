module.exports = {
    clientID : function(){
        return 'mqtt-js' + Math.random().toString(16).substr(2, 8);
    },
    host : function(){
        // return 'wss://mqtt-v2.alkaris.com:8083';
        return 'ws://' + $("#env_mqtt_host").val() + ':' + $("#env_mqtt_ws_port").val();
    },
    mainTopic : function(){
        return "quiz/quiz/live-stream";
    },
    liveFeedTVScreenTopic : function(){
        return "quiz/quiz/live-feed-tv-screen";
    },
    globalChannel : function(){ return "quiz/quiz/global-channel"; },
    presenterTopic : function(){ return "quiz/quiz/presenter-topic"; },

    lastWill : function() {
        let date = new Date();
        return {
            topic: 'quiz/connection-lost',
            payload: 'Connection Closed abnormally. Time - ' + date.getHours() + ':' + date.getMinutes() + ".",
            qos: 0,
            retain: false
        };
    },
    options : function (clientID) {
        return {
            keepalive: 5,
            clientId: clientID,
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: module.exports.lastWill(),
        };
    }
};
