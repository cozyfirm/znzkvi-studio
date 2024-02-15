$(document).ready(function (){
    let changeStatusUri = "/system/sponsors/change-element-status";

    $(".change-sponsor-element-status").click(function (){
        let elem_id = $(this).attr('elem-id');
        let real_id = $(this).attr('real-id');
        let status  = $(this).attr('status');

        $.ajax({
            url: changeStatusUri,
            method: "POST",
            dataType: "json",
            data: {
                elem_id: elem_id,
                real_id: real_id,
                status: status
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){

                }else{
                   notify.Me([response['message'], "warn"]);
                }
           }
       });
   });
});
