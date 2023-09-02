module.exports = {
    createHTTP: function (action, uri, method, data = {}) {
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

                    if(subCode === "51010"){
                        /* Data is sent to all screens in Admin panel; Show Open Lines GUI */
                        quiz.openLine("reveal");
                    }
                }else{
                    // notify.Me([response['message'], "warn"]);
                }
            }
        });
    },

};
