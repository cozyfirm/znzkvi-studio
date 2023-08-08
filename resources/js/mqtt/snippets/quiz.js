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
        // this.cleanProposals();

        /* Set colors to default */
        this.defaultAnswersColors();

        /* Show and hide elements */
        this.screenAction(".questions-group", "reveal");
        this.screenAction(".direct-question", "hide");
        this.screenAction(".normal-question", "reveal");
        this.screenAction(".mid-screen", "hide");
        this.screenAction(".open-line", "hide");

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
    /* Display to users selected answer and show if it is correct or not */
    defaultAnswersColors: function(){
        /* First, set default colors for all answers and letters */
        d3.select(".nq-A-border").style("fill", "#2F2C2F");
        d3.select(".nq-B-border").style("fill", "#2F2C2F");
        d3.select(".nq-C-border").style("fill", "#2F2C2F");
        d3.select(".nq-D-border").style("fill", "#2F2C2F");

        d3.select(".nq-A-letter").style("fill", "#2F2C2F");
        d3.select(".nq-B-letter").style("fill", "#2F2C2F");
        d3.select(".nq-C-letter").style("fill", "#2F2C2F");
        d3.select(".nq-D-letter").style("fill", "#2F2C2F");
    },
    answerTheQuestion: function(letter, incorrect = false){
        this.defaultAnswersColors();

        /* Set letter color to white */
        d3.select(".nq-" + letter + "-letter").style("fill", "#F5F6F7");

        if(!incorrect){
            d3.select(".nq-" + letter + "-border").style("fill", "#8AC988");
        }else{
            d3.select(".nq-" + letter + "-border").style("fill", "#8AC988");
            d3.select(".nq-" + incorrect + "-border").style("fill", "#EE6B6C");
        }
    },

    setDirectQuestion : function (subCode, question) {
        /* Show default colors */
        this.cleanAdditionalAnswerProposal();

        /* Show and hide elements */
        this.screenAction(".questions-group", "reveal");
        this.screenAction(".normal-question", "hide");
        this.screenAction(".direct-question", "reveal");
        this.screenAction(".mid-screen", "hide");
        this.screenAction(".open-line", "hide");

        /* First change GUI design / category */
        this.changeCategory(question['category']);

        /* Question text */
        this.displayQuestion("#directQuestionText", question['additional_questions']);
    },

    /* Joker interactions */
    jokerAvailable : function () { $("#jokerUsed").addClass('d-none'); },
    jokerUsed : function () { $("#jokerUsed").removeClass('d-none'); },

    /* Set stars depending on current question number */
    setStars: function (level) {
        if(level === "first"){
            d3.select(".star-1").style("fill", "#ffc107");
        }else if(level === "second"){
            d3.select(".star-2").style("fill", "#ffc107");
        }else if(level === "third"){
            /* Quiz is finished */
            d3.select(".star-3").style("fill", "#ffc107");
        }
    },

    /* Show line open GUI and hide it*/
    screenAction: function(element, action = 'reveal'){
        if(action === 'reveal') $(element).removeClass('d-none');
        else $(element).addClass('d-none');
    },
    hideAllScreens: function(){
        /* Hide line open screen */
        this.screenAction(".open-line", 'hide');
        /* Hide questions group */
        this.screenAction(".questions-group", 'hide');
        /* Hide mid screens */
        this.screenAction(".mid-screen", 'hide');
    },
    /* Category from question show */
    screenCategoryFromQuestion: function(action, category = 1){
        /* Hide all names of categories */
        $(".qfc-general").addClass('d-none');
        /* Hide all categories icons */
        $(".qfc-i").addClass('d-none');

        if(action === 'reveal'){
            $(".question-from-category").removeClass('d-none');

            $(".qfc-" + category).removeClass('d-none');
            $(".qfc-i-" + category).removeClass('d-none');
        }else{
            $(".question-from-category").addClass('d-none');
        }
    },
    lineOpen: function () {
        $(".mid-screen").addClass('d-none');
        $(".questions-group").addClass('d-none');
        this.screenAction(".open-line", 'reveal');
    },
    lineOpenHide : function () {
        $(".questions-group").removeClass('d-none');
        this.screenAction(".open-line", 'hide');
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
        d3.select(".dq-c-a-s-b").style("stroke", "#2F2C2F");
        d3.select(".dq-i-a-s-b").style("stroke", "#2F2C2F");

        d3.select(".additional-correct-answer").style("fill", "#5899B5");
        d3.select(".additional-incorrect-answer").style("fill", "#5899B5");
    },
    additionalAnswer : function (action) {
        this.cleanAdditionalAnswerProposal();

        if(action === 'correct'){
            d3.select(".dq-c-a-s-b").style("stroke", "#8AC988");
            d3.select(".additional-correct-answer").style("fill", "#8AC988");
        }else{
            d3.select(".dq-i-a-s-b").style("stroke", "#EE6B6C");
            d3.select(".additional-incorrect-answer").style("fill", "#EE6B6C");
        }
    },

    /* Screens functions */
    questionFromCategory: function(action, category){
        this.hideAllScreens();

        /* Show category */
        this.screenCategoryFromQuestion(action, category);
    },
    levelQuestion: function (action, level) {
        this.hideAllScreens();

        /* Show correct opened level */
        this.screenAction(".lqc-value", 'hide');
        this.screenAction(".level-question-screen", 'reveal');

        if(action === "reveal"){
            this.screenAction(".lqc-" + level, 'reveal');

            d3.select(".lqs-" + level + "-star").style("fill", "#FBC111");
        }else{
            /* Maybe won't be ever used */
        }
    },
    totalScoreDefaultValue: function(){
        this.screenAction(".em-money", 'hide');
    },
    totalScore: function (money) {
        this.hideAllScreens();

        this.screenAction(".earned-money", 'reveal');
        this.screenAction(".em-" + money, 'reveal');
    }
};
