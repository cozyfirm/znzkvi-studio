module.exports = {
    breakSentence : function(sentence, chunkSize = 68){
        return sentence.match(new RegExp(String.raw`\S.{1,${chunkSize - 2}}\S(?= |$)`, 'g'));
    },

    /* Change category name and icon, depending on question */
    changeCategory : function(category){
        $(".category-wrapper").addClass('d-none');
        $(".category-wrapper-" + category).removeClass('d-none');
    },
    showElement: function(selector){ $(selector).removeClass('d-none'); },
    hideElement: function(selector){ $(selector).addClass('d-none'); },

    displayQuestion : function(ID, question, chunkSize = 68){
        let sentence = this.breakSentence(question, chunkSize);
        $(ID).empty();

        for(let i=0; i<sentence.length; i++){
            d3.select(ID).append("tspan")
                .attr("x", "0")
                .attr("y", (i * 30))
                .text(sentence[i]);
        }
    },

    /* Display to users question and possible answers */
    setQuestion : function (subCode, question) {
        /* Show default colors */
        this.cleanProposals();

        /* Show and hide elements */
        this.hideElement(".direct-question");
        this.showElement(".normal-question");

        /* First change GUI design / category */
        this.changeCategory(question['category']);

        /* Question text */
        this.displayQuestion("#questionText", question['question']);

        /* Answers text */
        $("#AnswerTextA").text(question['answer_a_rel']['answer']);
        $("#AnswerTextB").text(question['answer_b_rel']['answer']);
        $("#AnswerTextC").text(question['answer_c_rel']['answer']);
        $("#AnswerTextD").text(question['answer_d_rel']['answer']);
    },

    setDirectQuestion : function (subCode, question) {
        /* Show default colors */
        this.cleanAdditionalAnswerProposal();

        /* Show and hide elements */
        this.hideElement(".normal-question");
        this.showElement(".direct-question");

        /* First change GUI design / category */
        this.changeCategory(question['category']);

        /* Question text */
        this.displayQuestion("#directQuestionText", question['additional_questions']);
    },

    /* Joker interactions */
    jokerAvailable : function () {
        $("#jokerUsed").addClass('d-none');
    },
    jokerUsed : function () {
        $("#jokerUsed").removeClass('d-none');
    },

    /* Set stars depending on current question number */
    setStars: function (questionNo) {
        if(questionNo === 4){
            d3.select(".star-1").style("fill", "#ffc107");
        }else if(questionNo === 7){
            d3.select(".star-2").style("fill", "#ffc107");
        }else if(questionNo === 8){
            /* Quiz is finished */
            d3.select(".star-3").style("fill", "#ffc107");
        }
    },

    /* Show line open GUI and hide it*/
    lineOpen: function () {
        $(".questions-group").addClass('d-none');
        $(".open-line").removeClass('d-none');
    },
    lineOpenHide : function () {
        $(".questions-group").removeClass('d-none');
        $(".open-line").addClass('d-none');
    },

    /* Propose answer; Change color of suggested answer before final decision */
    cleanProposals: function(){
        d3.select(".answer-A-wrapper").style("fill", "#5899B5");
        d3.select(".answer-B-wrapper").style("fill", "#5899B5");
        d3.select(".answer-C-wrapper").style("fill", "#5899B5");
        d3.select(".answer-D-wrapper").style("fill", "#5899B5");
    },
    proposeAnswer: function (letter) {
        this.cleanProposals();

        d3.select(".answer-" + letter + "-wrapper").style("fill", "#ffc107");
    },
    /* Final answer colors for A, B, C, D response */
    finalAnswer: function (proposedAnswer, finalAnswer) {
        this.cleanProposals();
        if(proposedAnswer !== finalAnswer){
            d3.select(".answer-" + proposedAnswer + "-wrapper").style("fill", "#bb2d3b");
            d3.select(".answer-" + finalAnswer + "-wrapper").style("fill", "#20c997");
        }else{
            d3.select(".answer-" + finalAnswer + "-wrapper").style("fill", "#20c997");
        }
    },
    cleanAdditionalAnswerProposal: function(){
        d3.select(".additional-correct-answer").style("fill", "#5899B5");
        d3.select(".additional-incorrect-answer").style("fill", "#5899B5");
    },
    additionalAnswer : function (action) {
        this.cleanAdditionalAnswerProposal();

        if(action === 'correct'){
            d3.select(".additional-correct-answer").style("fill", "#20c997");
        }else{
            d3.select(".additional-incorrect-answer").style("fill", "#bb2d3b");
        }
    }
};
