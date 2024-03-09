$(document).ready(function () {
    let createHTTP = function (action, uri, method, data = {}) {
        $.ajax({
            url: uri,
            method: method,
            dataType: "json",
            data: data,
            success: function success(response) {
                console.log(response);

                let code = response['code'];

                if(code === '0000'){
                    let responseData = response['data'];
                    let subCode      = responseData['sub_code'];


                }else{ notify.Me([response['message'], "warn"]); }
            }
        });
    };

    /* On user click - Global open line button */
    $(".open-line-g-btn").click(function () {
        createHTTP("change-open-line-status", "/system/quiz-play/live/open-line", "POST", {source: "global-screen", action: "toggle", "type": $(this).attr('type'), "id": $(this).attr('id')});
    });
});
