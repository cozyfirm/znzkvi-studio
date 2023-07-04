$(document).ready(function () {
    /* If category 7 (Last category) has been chosen, set weight to 7  */
    $(".question-category").change(function () {
        let val = parseInt($(this).val());

        if(val === 7){
            $(".question-weight").val(7);
            // $(".direct-question").addClass('d-none');
        }else{
            // $(".direct-question").removeClass('d-none');
            // $(".question-weight").val(val);
            // $(".question-additional-question").val("");
        }
    });

    $(".question-question").keyup(function(){
        if(parseInt($(".question-category").val()) === 7){
            $(".question-additional-question").val($(this).val());
        }else{
            // $(".question-additional-question").val("");
        }
    });

    $(".question-correct-answer").keyup(function(){
        if(parseInt($(".question-category").val()) === 7){
            $(".question-additional-answer").val($(this).val());
        }else{
            // $(".question-additional-answer").val("");
        }
    });
});
