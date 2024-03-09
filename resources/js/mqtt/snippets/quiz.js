module.exports = {
    primaryColors: ["#77CEF4", "#8AC988", "#fbc111", "#6d6768", "#f8a46c", "#f06b6c", "#d4a75f"],
    secondaryColors: ["#5899B5", "#4C7F49", "#BA912E", "#585658", "#b97b50", "#b15050", "#937542"],

     isNumeric : function(value) {
        return /^-?\d+$/.test(value);
    },

    breakSentence : function(sentence, chunkSize = 55){
        return sentence.match(new RegExp(String.raw`\S.{1,${chunkSize - 2}}\S(?= |$)`, 'g'));
    },

    /******************************************************************************************************************/
    /* Show line open GUI and hide it*/
    screenAction: function(element, action = 'reveal'){
        if(action === 'reveal') $(element).removeClass('d-none');
        else $(element).addClass('d-none');
    },
    hideAllScreens: function(){
        /* Hide line open screen */
        this.openLine("hide");
        /* Hide questions group */
        this.screenAction(".questions-group", 'hide');
        /* Hide mid screens */
        this.screenAction(".mid-screen", 'hide');

        /* Hide timers and loaders */
        this.screenAction(".timer-group", "hide");
        this.screenAction(".loader-group-first-category", "hide");
    },
    showElement: function(selector){ $(selector).removeClass('d-none'); },
    hideElement: function(selector){ $(selector).addClass('d-none'); },

    /******************************************************************************************************************/
    /* Change category name and icon, depending on question */
    changeCategory : function(category){
        $(".category-wrapper").addClass('d-none');
        $(".category-wrapper-" + category).removeClass('d-none');
    },

    changeColorByCategory: function(category){
        d3.select("#InterfaceCategoryPrimaryColor").style("fill", this.primaryColors[category - 1]);

        d3.select("#QuestionBackgroundSecondary").style("fill", this.secondaryColors[category - 1]);
        d3.select("#BacgroundCategoryNamesGroup").style("fill", this.secondaryColors[category - 1]);
        d3.select("#TopLableBackground").style("fill", this.secondaryColors[category - 1]);

        d3.select("#AnswerSecondaryColorA").style("fill", this.secondaryColors[category - 1]);
        d3.select("#AnswerSecondaryColorB").style("fill", this.secondaryColors[category - 1]);
        d3.select("#AnswerSecondaryColorC").style("fill", this.secondaryColors[category - 1]);
        d3.select("#AnswerSecondaryColorD").style("fill", this.secondaryColors[category - 1]);

        d3.select("#DirektnoPitanjGroupBarazSecondary").style("fill", this.secondaryColors[category - 1]);
        d3.select(".additional-correct-answer").style("fill", this.secondaryColors[category - 1]);
        d3.select(".additional-incorrect-answer").style("fill", this.secondaryColors[category - 1]);
        d3.select(".check-additional-bcg").style("fill", this.secondaryColors[category - 1]);
        d3.select(".times-additional-bcg").style("fill", this.secondaryColors[category - 1]);
        d3.select("#TimerNumber").style("fill", this.secondaryColors[category - 1]);
        // d3.select("#TimerNumber-2").style("fill", this.secondaryColors[category - 1]);
        // d3.select("#TimerCategoryColor").style("fill", this.secondaryColors[category - 1]);
        d3.select("#TimerCategoryColor-2").style("fill", this.secondaryColors[category - 1]);

        /* Stars with background */
        d3.select(".stars-bcg-1").style("fill", this.secondaryColors[category - 1]);
        d3.select(".stars-bcg-2").style("fill", this.secondaryColors[category - 1]);
        d3.select(".stars-bcg-3").style("fill", this.secondaryColors[category - 1]);

        /* Right part */
        d3.select("#_x37_").style("fill", this.secondaryColors[category - 1]);
        d3.select("#_x35_").style("fill", this.secondaryColors[category - 1]);
        d3.select("#_x33_").style("fill", this.secondaryColors[category - 1]);
        d3.select("#_x31_").style("fill", this.secondaryColors[category - 1]);
        d3.select("#loaderBcgWrapper").style("fill", this.secondaryColors[category - 1]);
    },

    displayQuestion : function(ID, question, chunkSize = 44){
        let sentence = this.breakSentence(question, chunkSize);
        $(ID).empty();

        for(let i=0; i<sentence.length; i++){
            d3.select(ID).append("tspan")
                .attr("x", "0")
                .attr("y", (i * 36))
                .text(sentence[i]);
        }
    },

    /************************************** Reveal answer and Answer the question *************************************/
    /* Display to users question and possible answers */
    revealTheQuestion : function (subCode, question, category = 1) {
        /* Set colors to default */
        this.cleanAnswerProposal();

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

        /* First, hide all timers and loaders */
        this.screenAction(".timer-group", "hide");
        this.screenAction(".loader-group-first-category", "hide");

        if(category === 1){
            /* Hide timer; Show loading on right side */
            this.screenAction(".loader-group-first-category", "reveal");
        }else{
            this.screenAction(".timer-10", "reveal");
        }

        console.log("Category: " + category);
    },
    /*
     *  Regular answers:
     *      - mark as correct
     *      - mark as incorrect
     *      - remove proposed answers (only letter and border )
     */
    /* Display to users selected answer and show if it is correct or not */
    cleanAnswerProposal: function(){
        /* First, set default colors for all answers and letters */
        d3.select(".nq-A-border").style("fill", "#2F2C2F");
        d3.select(".nq-B-border").style("fill", "#2F2C2F");
        d3.select(".nq-C-border").style("fill", "#2F2C2F");
        d3.select(".nq-D-border").style("fill", "#2F2C2F");

        d3.select(".nq-A-letter").style("fill", "#2F2C2F");
        d3.select(".nq-B-letter").style("fill", "#2F2C2F");
        d3.select(".nq-C-letter").style("fill", "#2F2C2F");
        d3.select(".nq-D-letter").style("fill", "#2F2C2F");

        // d3.select(".answer-A-wrapper").style("fill", "#5899B5");
        // d3.select(".answer-B-wrapper").style("fill", "#5899B5");
        // d3.select(".answer-C-wrapper").style("fill", "#5899B5");
        // d3.select(".answer-D-wrapper").style("fill", "#5899B5");
    },
    answerTheQuestion: function(letter, incorrect = false){
        this.cleanAnswerProposal();

        /* Set letter color to white */
        d3.select(".nq-" + letter + "-letter").style("fill", "#F5F6F7");

        let audio = new Audio("/sounds/correct-answer.wav");

        if(!incorrect){
            /* Answer is correct */
            d3.select(".nq-" + letter + "-border").style("fill", "#F5F6F7");
            d3.select(".answer-" + letter + "-wrapper").style("fill", "#8BCA89");
        }else{
            /* Answer is incorrect */
            d3.select(".nq-" + letter + "-border").style("fill", "#F5F6F7");
            d3.select(".answer-" + letter + "-wrapper").style("fill", "#8BCA89");

            d3.select(".nq-" + incorrect + "-letter").style("fill", "#F5F6F7");
            d3.select(".nq-" + incorrect + "-border").style("fill", "#F5F6F7");
            d3.select(".answer-" + incorrect + "-wrapper").style("fill", "#F06B6C");

            audio = new Audio("/sounds/incorrect-answer.wav");
        }

        audio.play().then(r => function () {});
    },

    /*********************************************** ADDITIONAL ANSWER ************************************************/
    cleanAdditionalAnswerProposal: function(){
        $("#BarazCorrect").addClass('d-none');
        $("#BarazInCorrect").addClass('d-none');
    },
    additionalAnswer : function (action) {
        this.cleanAdditionalAnswerProposal();
        let audio = new Audio("/sounds/correct_level.wav");

        if(action === 'correct'){
            $("#BarazCorrect").removeClass('d-none');
        }else{
            $("#BarazInCorrect").removeClass('d-none');
            audio = new Audio("/sounds/incorrect-answer.wav");
        }
        audio.play().then(r => function () {});
    },

    /****************************************** REVEAL ADDITIONAL QUESTION ********************************************/
    setDirectQuestion : function (subCode, question, category) {
        /* Show default colors */
        this.cleanAdditionalAnswerProposal();

        /* Show and hide elements */
        this.screenAction(".questions-group", "reveal");
        this.screenAction(".normal-question", "hide");
        this.screenAction(".direct-question", "reveal");
        this.screenAction(".mid-screen", "hide");
        this.screenAction(".open-line", "hide");
        this.screenAction(".timer-10", "reveal");

        /* First change GUI design / category */
        this.changeCategory(question['category']);
        this.changeColorByCategory(category);

        /* Set default colors  */
        d3.select("#InterfaceCategoryPrimaryColor").style("fill", this.primaryColors[category - 1]);

        /* Question text */
        this.displayQuestion("#directQuestionText", question['additional_questions']);
    },

    /************************************************** STARS *********************************************************/
    /* Set stars depending on current question number */
    resetStars: function(){
        $(".star-1").addClass('d-none');
        $(".star-2").addClass('d-none');
        $(".star-3").addClass('d-none');
    },
    setStars: function (level) {
        if(level === "first"){
            $(".star-1").removeClass('d-none');
            // d3.select(".star-1").style("fill", "#ffc107");
        }else if(level === "second"){
            $(".star-2").removeClass('d-none');
            // d3.select(".star-2").style("fill", "#ffc107");
        }else if(level === "third"){
            /* Quiz is finished */
            $(".star-3").removeClass('d-none');
            // d3.select(".star-3").style("fill", "#ffc107");
        }
    },

    /********************************************* ANNOUNCE NEW CATEGORY **********************************************/
    /**
     *  In V2.0 Added support to sponsor category, which includes:
     *      1. Title of category
     *      2. Special image of category
     *      3. Play sound effect
     *
     *  Implemented in screenCategoryFromQuestion() & announceCategory
     */
    screenCategoryFromQuestion: function(action, category = 1, categoryTitle = null, categoryImage = null, categorySound = null){
        /* Hide all names of categories */
        $(".qfc-general").addClass('d-none');
        /* Hide all categories icons */
        $(".qfc-i").addClass('d-none');
        /* Hide all text */
        $(".tlg-text").addClass('d-none');

        if(action === 'reveal'){
            $(".question-from-category").removeClass('d-none');

            if(category === 0){
                /* It is joker flag */
                $(".qfc-joker").removeClass('d-none');
                $(".qfc-i-joker").removeClass('d-none');
                $("#tlg_joker_used").removeClass('d-none');
            }else{
                /* Hide Joker used title */
                $("#tlg_joker_used").addClass('d-none');

                $(".qfc-" + category).removeClass('d-none');
                if(categoryImage){
                    if(this.isNumeric(categoryImage)){
                        $(".qfc-i-" + category).removeClass('d-none');
                        $("#tlg_category_heading").removeClass('d-none');
                        $("#tlg_sponsor_category").addClass('d-none');
                    }else{
                        $("#" + categoryImage).removeClass('d-none');
                        /* Show element and change title */
                        $("#tlg_sponsor_category").removeClass('d-none').text(categoryTitle);
                        $("#tlg_category_heading").addClass('d-none');

                        /* Play sound */
                        const jokerMusic = new Audio("/sounds/sponsors/" + categorySound);
                        jokerMusic.play().then(r => function () {});
                    }
                }else{
                    $(".qfc-i-" + category).removeClass('d-none');
                }
                /* ToDo - Header of category */


                this.changeColorByCategory(category);
            }
        }else{
            $(".question-from-category").addClass('d-none');
        }
    },
    announceCategory: function(action, category, categoryTitle = null, categoryImage = null, categorySound = null){
        this.hideAllScreens();
        /* Show category */
        this.screenCategoryFromQuestion(action, category, categoryTitle, categoryImage, categorySound);
    },


    /******************************************* ANNOUNCE LEVEL QUESTION **********************************************/
    resetLevelQuestionStars: function (){
        d3.select(".lqs-first-star").style("fill", "#5899B5");
        d3.select(".lqs-second-star").style("fill", "#5899B5");
        d3.select(".lqs-third-star").style("fill", "#5899B5");
    },

    announceLevelQuestion: function (action, level) {
        this.hideAllScreens();

        /* Show correct opened level */
        this.screenAction(".lqc-value", 'hide');
        this.screenAction(".level-question-screen", 'reveal');

        if(action === "reveal"){
            this.screenAction(".lqc-" + level, 'reveal');

            d3.select(".lqs-" + level + "-star").style("fill", "#FBC111");
            /* Set background as blue */
            d3.select("#InterfaceCategoryPrimaryColor").style("fill", "#77CEF4");
        }
    },

    /************************************************** JOKER *********************************************************/
    jokerAvailable : function () { $("#jokerUsed").addClass('d-none'); },
    jokerUsed : function () { $("#jokerUsed").removeClass('d-none'); },
    jokerDisabled : function () { $("#jokerDisabled").removeClass('d-none'); },
    jokerEnabled  : function () { $("#jokerDisabled").addClass('d-none'); },

    /************************************************** TOTAL SCORE ***************************************************/
    totalScoreDefaultValue: function(){
        this.screenAction(".em-money", 'hide');
    },
    totalScore: function (money) {
        this.hideAllScreens();
        this.totalScoreDefaultValue();

        /* Set background as blue */
        d3.select("#InterfaceCategoryPrimaryColor").style("fill", "#77CEF4");

        this.screenAction(".earned-money", 'reveal');
        this.screenAction(".em-" + money, 'reveal');
    },

    /***************************************************** TIMER ******************************************************/
    setTimeFont: function (time){
        if(time === 10){
            d3.select("#TimerNumber").attr("transform", "matrix(1 0 0 1 1168.5962 788.5771)");
        }else{
            d3.select("#TimerNumber").attr("transform", "matrix(1 0 0 1 1181.8262 788.5771)");
        }
    },
    setTime: function (time, duration) {
        if(duration === 5){
            for(let i=10; i>time * 2; i--){ $(".t-sc-" + i).addClass('d-none'); }
        }else{
            for(let i=10; i>time; i--){
                $(".t-sc-" + i).addClass('d-none');

                console.log("Hiding: " + ".t-sc-" + i);
            }
        }

        /* Set digits */
        this.setTimeFont(time);
        d3.select("#TimerNumber").text(time);
    },
    resetTimer: function (time){
        for(let i= 10; i>0; i--){ $(".t-sc-" + i).removeClass('d-none'); }
        this.setTimeFont(time);
        d3.select("#TimerNumber").text(time);

        console.log("Timer reset! Time left: " + time);
    },

    /*********************************************** Open line actions ************************************************/
    openLine: function (action = "reveal", type = "default", id = null) {
        if(action === "reveal"){
            this.showElement("#Interface-StrokeOpenLine");
            this.showElement("#InterfaceCategoryPrimaryColorOpenLine");
            this.showElement("#OpenLineGroup");

            if(type === "default"){
                this.showElement("#open-lines-default-logo");
                this.hideElement(".sponsor-open-lines");
            }else{
                this.hideElement("#open-lines-default-logo");
                this.hideElement(".sponsor-open-lines");

                /* Show only specific */
                this.showElement("#" + id);
            }
        }else{
            this.hideElement("#Interface-StrokeOpenLine");
            this.hideElement("#InterfaceCategoryPrimaryColorOpenLine");
            this.hideElement("#OpenLineGroup");
        }
    }
};
