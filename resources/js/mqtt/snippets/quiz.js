module.exports = {
    /* Change category name and icon, depending on question */
    changeCategory : function(category){
        $(".category-wrapper").addClass('d-none');
        $(".category-wrapper-" + category).removeClass('d-none');
    },

    /* Display to users question and possible answers */
    setQuestion : function (subCode, question) {
        /* First change GUI design / category */
        this.changeCategory(question['category']);

        /* Question text */
        $("#questionText").text(question['question']);

        /* Answers text */
        $("#AnswerTextA").text(question['answer_a_rel']['answer']);
        $("#AnswerTextB").text(question['answer_b_rel']['answer']);
        $("#AnswerTextC").text(question['answer_c_rel']['answer']);
        $("#AnswerTextD").text(question['answer_d_rel']['answer']);
    }


};
