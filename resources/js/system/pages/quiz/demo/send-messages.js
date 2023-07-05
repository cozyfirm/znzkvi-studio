$(document).ready(function () {
    $(".send-demo-questions").click(function () {
        let question = $("#question").val();
        let answerA = $("#answer_a").val();
        let answerB = $("#answer_b").val();
        let answerC = $("#answer_c").val();
        let answerD = $("#answer_d").val();


        $.ajax({
            url: "/system/quizzes/quiz/send-demo-message",
            method: "POST",
            dataType: "json",
            data: {question: question, answerA: answerA, answerB:answerB, answerC:answerC, answerD:answerD},
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    notify.Me([response['message'], "success"]);
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
});
