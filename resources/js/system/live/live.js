/* This script is used for MQTT messaging system */
window.mqttInit = require('../../layout/mqtt-init');

/* Is mid screen revealed to users */
import { vars } from './snippets/variables';

/* Include MQTT scripts */
require('./mqtt-scripts/tv-screen');

$(document).ready(function () {
    /*
     *  Joker info; Joker cannot be used on questions:
     *  - 3+
     *  - 6+
     *  - 7
     */
    let quizID;
    let jokerAvailable = true, jokerUsed = false;
    let questionClicked = "", correctAnswer = "";
    let finishTheQuizFlag = false;
    // let questionRevealed = false;

    /* Total seconds left */
    let questionTimer = 5;

    // let screenRevealed = im_screenRevealed;

    /* Number of current question */
    let currentQuestionNo = 1;

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
    let setCurrentQuestion = function(question_no){ currentQuestionNo = question_no; $("#lf-current-question").text(question_no); };
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

                    if(subCode === '50000'){
                        /* Quiz is just started, reveal the question */
                        $(".reveal-the-question").fadeOut(0);

                        parseQuestion(response['data']['question']);
                    }else if(subCode === '50002' || subCode === '50003'){
                        /* Correct answer */

                        if(subCode === '50002'){
                            parseQuestion(response['data']['question']);
                        }else{
                            /* Level question */
                            parseAdditionalQuestion(response['data']['question']);
                        }

                        /* Increase current question */
                        setCurrentQuestion(response['data']['current_question']);

                        /* Fade In shade */
                        $(".reveal-the-question").fadeIn(0);

                        /* Set screen revealed as false */
                        vars.screenRevealed = "not";

                        $(".fa-eye-slash").removeClass('d-none');
                        $(".fa-spinner").addClass('d-none');
                        $(".fa-eye").addClass('d-none');

                        vars.questionRevealed = false;
                    }else if(subCode === '50004'){
                        /* Joker used */
                        parseQuestion(response['data']['question']);
                        /* Disable further joker usage */
                        jokerAvailable = false;
                        jokerUsed = true;

                        /* Mark as red */
                        $(".joker-wrapper").addClass('joker-used');

                        /* Fade In shade */
                        $(".reveal-the-question").fadeIn(0);
                        vars.questionRevealed = false;
                    }else if(subCode === '50010'){
                        /* Reveal question for operator */
                        $(".reveal-the-question").fadeOut();

                        questionTimer = 5;
                        $(".question-timer").text(questionTimer);
                    }else if(subCode === '50011'){
                        /* Reveal mid screen */

                    }else{
                        /* Answer is not correct */
                    }

                    /* If info about total earned money is sent */
                    if(typeof response['data']['total_money'] !== 'undefined' && response['data']['total_money'] !== null){
                        setTotalMoney(response['data']['total_money']);
                    }

                    setTimeout(function (){
                        if(typeof response['data']['uri'] !== 'undefined' && response['data']['uri'] !== null) window.location = response['data']['uri'];
                        // else console.log("Do not redirect! " + response['message']);
                    }, 2000);
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    };

    /* -------------------------------------------------------------------------------------------------------------- */
    /* User action functions */

    let revealMidScreen = function(){
        let questionNo = parseInt($("#lf-current-question").text());

        if(vars.questionRevealed){
            notify.Me(["Pitanje već otvoreno!", "warn"]);
            return;
        }
        if(vars.screenRevealed === "not" || (questionNo === 1 && jokerUsed === false)){

            $(".fa-eye").addClass('d-none');
            $(".fa-eye-slash").addClass('d-none');
            $(".fa-spinner").removeClass('d-none');

            liveHTTP("reveal-screen", '/system/quiz-play/live/reveal-screen', 'POST', {
                'id' : $("#quiz_id").val()
            });

            vars.screenRevealed = "pending";
        }else if(vars.screenRevealed === "pending"){
            notify.Me(["Molimo pričekajte ...", "warn"]);
        }else if(vars.screenRevealed === "yes"){
            notify.Me(["Mid screen je već prikazan na TV-u!", "warn"]);
        }
    };

    /*
     *  This action is used for two different purposes:
     *
     *      1. When current question is 1, then start the quiz and show the question
     *      2. When current question is greater than 1, hide category screen and show the question
     */
    let revealTheQuestion = function(){
        let questionNo = parseInt($("#lf-current-question").text());
        /* Set quiz ID */
        quizID = parseInt($("#quiz_id").val());

        /* Create HTTP request and send WS message */
        if(questionNo === 1 && jokerUsed === false){
            /* Start the quiz and show first question */
            liveHTTP("start-a-quiz", '/system/quiz-play/live/start-a-quiz', 'POST', {"id" : quizID});
        }else{
            if(vars.screenRevealed === "not"){
                notify.Me(["Molimo da prikažete najavu pitanja (Mid screen) !", "warn"]);
                return;
            }else if(vars.screenRevealed === "pending"){
                notify.Me(["Najava pitanja (Mid screen) nije prikazana na TV-u!", "warn"]);
                return;
            }

            /* Show current question to the screen */
            liveHTTP("reveal-question", '/system/quiz-play/live/reveal-question', 'POST', {"id" : quizID});
        }

        vars.questionRevealed = true;
    };

    let showAnswerPopUp = function(letter){
        $(".live-pop-up-message").html('Da li ste sigurni da želite odgovor <b>"' + letter + '"</b> označiti kao konačan odgovor?');
        $(".live-pop-up").fadeIn();
    };
    let answerTheQuestion = function(){
        if(questionClicked !== ""){
            /* That means, it is A, B, C or D answer */

            liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
                'quiz_id' : $("#quiz_id").val(),
                'question_id' : $("#question_id").val(),
                'letter' : questionClicked,
                'additional' : 0
            });
            questionClicked = "";
        }else if(correctAnswer !== ""){
            /* That means, it is additional question */

            liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
                'quiz_id' : $("#quiz_id").val(),
                'question_id' : $("#question_id").val(),
                'correct' : correctAnswer,
                'additional' : 1
            });
            correctAnswer = "";
        }

        $(".live-pop-up").fadeOut();


        /* Reset question timer */
        questionTimer = 5;
        /* Display to user */
        $(".question-timer").text(questionTimer);
        /* Remove classes */
        $(".question-timer-wrapper").removeClass('lh-e-time-expired').removeClass('animated').removeClass('shake');
    };

    let showAdditionalAnswerPopUp = function(what){
        $(".live-pop-up-message").html('Da li ste sigurni da želite kliknuti <b>"' + what + '"</b> kao tačan odgovor na pitanje?');
        $(".live-pop-up").fadeIn();
    };

    let useJoker = function(){
        jokerUsed = true;

        /* When Joker is used, send WS message to TV Screen with proposed category */
        liveHTTP("answer-the-question", '/system/quiz-play/live/answer-the-question', 'POST', {
            'quiz_id' : $("#quiz_id").val(),
            'question_id' : $("#question_id").val(),
            'joker' : true
        });
    };

    /* -------------------------------------------------------------------------------------------------------------- */
    /* Mouse actions */

    $(".reveal-the-question").click(function () { revealTheQuestion(); });
    /* Reveal mid screen to TV screen */
    $(".reveal-mid-screen").click(function () { revealMidScreen(); });


    /* Answer a question */
    $(".answer-it").click(function () {
        showAnswerPopUp($(this).attr('letter'));
        questionClicked = $(this).attr('letter');
    });

    $(".answer-additional").click(function () {
        showAdditionalAnswerPopUp($(this).attr('correct'));
        correctAnswer = $(this).attr('correct');
    });
    /* Use joker */
    $(".joker-wrapper").click(function () { useJoker(); });
    /* Finnish quiz */
    $(".finnish-quiz-btn").click(function () {
        finishTheQuizFlag = true;

        $(".live-pop-up-message").html('Da li ste sigurni da želite <b> završiti kviz </b> ?');
        $(".live-pop-up").fadeIn();
    });


    /* Close live pop-up */
    $(".live-pop-up-close").click(function () { finishTheQuizFlag = false; $(".live-pop-up").fadeOut(); });
    /* Well, if operator is sure that is final answer, then proceed with it */
    $(".live-pop-up-continue").click(function () {
        if(finishTheQuizFlag){
            finishTheQuizFlag = false;
            liveHTTP("finnish-the-quiz", '/system/quiz-play/live/finnish-the-quiz', 'POST', {'id' : $("#quiz_id").val(), 'time' : parseInt($(".question-timer").text()) });

            $(".live-pop-up").fadeOut();
        }else{
            answerTheQuestion();
        }
    });



    /* Open line; ToDo - Check for status later ... */
    $(".open-line-btn").click(function () {
        liveHTTP("open-line", '/system/quiz-play/live/open-line', 'POST', {
            'id' : $("#quiz_id").val()
        });
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  On key press, trigger different actions:
     */

    $('body').keypress((event) => {
        let char = String.fromCharCode(event.which);

        if(char === "a"){
            showAnswerPopUp("A");
            questionClicked = "A";
        }else if(char === "b"){
            showAnswerPopUp("B");
            questionClicked = "B";
        }else if(char === "c"){
            showAnswerPopUp("C");
            questionClicked = "C";
        }else if(char === "d"){
            showAnswerPopUp("D");
            questionClicked = "D";
        }
        else if(char === "m"){ revealMidScreen(); }
        else if(char === "n"){ revealTheQuestion(); }
        /* Close popup */
        else if(char === "h"){
            if(finishTheQuizFlag){
                finishTheQuizFlag = false;
                liveHTTP("finnish-the-quiz", '/system/quiz-play/live/finnish-the-quiz', 'POST', {'id' : $("#quiz_id").val(), 'time' : parseInt($(".question-timer").text()) });

                $(".live-pop-up").fadeOut();
            }else{
                answerTheQuestion();
            }
        }
        /* Continue => Answer the question */
        else if(char === "f"){ $(".live-pop-up").fadeOut(); }
        /* Not correct additional answer */
        else if(char === "k"){
            showAdditionalAnswerPopUp("No");
            correctAnswer = "No";
        }
        else if(char === "g"){
            showAdditionalAnswerPopUp("Yes");
            correctAnswer = "Yes";
        }
        else if(char === "r"){ useJoker(); }
        else if(char === "x"){
            finishTheQuizFlag = true;

            $(".live-pop-up-message").html('Da li ste sigurni da želite <b> završiti kviz </b> ?');
            $(".live-pop-up").fadeIn();
        }
        else if(char === "o"){
            liveHTTP("change-open-line-status", "/system/quiz-play/live/open-line", "POST", {source: "global-screen", action: "toggle"});
        }
    });
});
