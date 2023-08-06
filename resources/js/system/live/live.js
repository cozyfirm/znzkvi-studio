$(document).ready(function () {
    /*
     *  Joker info; Joker cannot be used on questions:
     *  - 3+
     *  - 6+
     *  - 7
     */
    let jokerAvailable = true;
    let questionClicked = "", correctAnswer = "";

    /* Set Ajax headers */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let parseQuestion = function(question){
        /* Set question and answers in fields */
        $("#question").val(question['question']);
        $("#answer_a").val(question['answer_a_rel']['answer']);
        $("#answer_b").val(question['answer_b_rel']['answer']);
        $("#answer_c").val(question['answer_c_rel']['answer']);
        $("#answer_d").val(question['answer_d_rel']['answer']);

        /* Mark correct answer */
        $(".answer_l").removeClass('t-green');
        if(parseInt(question['answer_a_rel']['correct']) === 1) $(".answer_a_l").addClass('t-green');
        if(parseInt(question['answer_b_rel']['correct']) === 1) $(".answer_b_l").addClass('t-green');
        if(parseInt(question['answer_c_rel']['correct']) === 1) $(".answer_c_l").addClass('t-green');
        if(parseInt(question['answer_d_rel']['correct']) === 1) $(".answer_d_l").addClass('t-green');

        /* Set active question ID */
        $("#question_id").val(question['id']);

        /* Set regular question wrapper as visible and irregular as invisible */
        $(".regular-question").removeClass('d-none');
        $(".additional-question").addClass('d-none');
    };
    let parseAdditionalQuestion = function(question){
        $("#additional_questions").val(question['additional_questions']);
        $("#additional_q_answer").val(question['additional_q_answer']);

        /* Set regular question wrapper as invisible and irregular as visible */
        $(".regular-question").addClass('d-none');
        $(".additional-question").removeClass('d-none');

        /* Set active question ID */
        $("#question_id").val(question['id']);
    };

    /* Set current active question in GUI */
    let setCurrentQuestion = function(question_no){ $("#lf-current-question").text(question_no + "."); };
    /* Set total earned money in quiz - GUI */
    /* Set current active question in GUI */
    let setTotalMoney = function(total){ $("#lf-total-money").text(total); };

    let liveHTTP = function (action, uri, method, data = {}) {
        /* ToDo - Full screen loading bar to prevent multiple clicking */
        $.ajax({
            url: uri,
            method: method,
            dataType: "json",
            data: data,
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    /* Message type */
                    let subCode = response['data']['sub_code'];

                    if(typeof response['message'] !== 'undefined' && subCode !== '50004' && subCode !== '50005' && subCode !== '50006') notify.Me([response['message'], "success"]);
                    else notify.Me([response['message'], "warn"]);

                    if(action === "start-a-quiz"){
                        $(".start-quiz").fadeOut(0);
                        parseQuestion(response['data']['question']);
                    }else if(action === 'answer-the-question'){
                        if(subCode === '50002'){
                            /* Correct answer */
                            parseQuestion(response['data']['question']);

                            /* Increase current question */
                            setCurrentQuestion(response['data']['current_question']);
                        }else if(subCode === '50003'){
                            /* Correct answer, open level question */
                            parseAdditionalQuestion(response['data']['question']);

                            /* Increase current question */
                            setCurrentQuestion(response['data']['current_question']);
                        }else if(subCode === '50004'){
                            /* Joker used */
                            parseQuestion(response['data']['question']);
                            /* Disable further joker usage */
                            jokerAvailable = false;

                            /* Mark as red */
                            $(".joker-wrapper").addClass('joker-used');
                        }else{
                            /* Answer is not correct */
                        }

                        /* If info about total earned money is sent */
                        if(typeof response['data']['total_money'] !== 'undefined' && response['data']['total_money'] !== null){
                            setTotalMoney(response['data']['total_money']);
                        }
                    }

                    setTimeout(function (){
                        if(typeof response['data']['uri'] !== 'undefined' && response['data']['uri'] !== null) window.location = response['data']['uri'];
                        else console.log("Do not redirect! " + response['message']);
                    }, 2000);
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    };

    /* Start a quiz */
    $(".start-a-quiz").click(function () {
        liveHTTP("start-a-quiz", '/system/quiz-play/live/start-a-quiz', 'POST', {"id" : $("#quiz_id").val()});
    });

    /* Answer a question */
    $(".answer-it").click(function () {
        $(".live-pop-up-message").html('Da li ste sigurni da želite odgovor <b>"' + $(this).attr('letter') + '"</b> označiti kao konačan odgovor?');
        $(".live-pop-up").fadeIn();

        questionClicked = $(this).attr('letter');

        /* Propose answer */
        liveHTTP("propose-the-answer", '/system/quiz-play/live/propose-the-answer', 'POST', {
            'letter' : $(this).attr('letter')
        });
    });

    $(".answer-additional").click(function () {
        $(".live-pop-up-message").html('Da li ste sigurni da želite kliknuti <b>"' + $(this).attr('correct') + '"</b> kao tačan odgovor na pitanje?');
        $(".live-pop-up").fadeIn();

        correctAnswer = $(this).attr('correct');
    });
    /* Use joker */
    $(".joker-wrapper").click(function () {
        liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
            'quiz_id' : $("#quiz_id").val(),
            'question_id' : $("#question_id").val(),
            'joker' : true
        });
    });
    /* Finnish quiz */
    $(".finnish-quiz-btn").click(function () {
        liveHTTP("answer-the-question", '/system/quiz-play/live/finnish-the-quiz', 'POST', {'id' : $("#quiz_id").val() });
    });


    /* Close live pop-up */
    $(".live-pop-up-close").click(function () {
        $(".live-pop-up").fadeOut();
    });
    /* Well, if operator is sure that is final answer, then proceed with it */
    $(".live-pop-up-continue").click(function () {
        if(questionClicked !== ""){
            /* That means, it is A, B, C or D answer */

            liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
                'quiz_id' : $("#quiz_id").val(),
                'question_id' : $("#question_id").val(),
                'letter' : questionClicked,
                'additional' : 0
            });
            questionClicked = "";
            console.log("Clicked letter");
        }else if(correctAnswer !== ""){
            /* That means, it is additional question */

            liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
                'quiz_id' : $("#quiz_id").val(),
                'question_id' : $("#question_id").val(),
                'correct' : correctAnswer,
                'additional' : 1
            });
            correctAnswer = "";
            console.log("Clicked additional");
        }

        $(".live-pop-up").fadeOut();
    });
});
