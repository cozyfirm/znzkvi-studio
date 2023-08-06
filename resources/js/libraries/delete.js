$(document).ready(function () {
    let deleteUrl = '';

    $(".delete-item, .go-to-with-prevent").click(function (e) {
        deleteUrl = $(this).attr('href');
        let dTitle = $(this).attr('d-title');
        let cTitle = $(this).attr('custom-title');

        if(cTitle !== undefined){
            $(".delete-it-pop-up-message").text(cTitle);
        }else{
            if(dTitle !== undefined){
                $(".delete-it-pop-up-message").text('Da li ste sigurni da želite izbrisati "' + dTitle + '"?');
            }else{
                $(".delete-it-pop-up-message").text('Da li ste sigurni da želite izbrisati ovaj uzorak?');
            }
        }

        $(".delete-it-pop-up-title").text('OBAVJEŠTENJE');

        $(".delete-it-pop-up-wrapper").fadeIn();
        e.preventDefault();
    });
    $(".delete-it-pop-up-close").click(function () {
        $(".delete-it-pop-up-wrapper").fadeOut();
    });
    $(".delete-it-pop-up-continue").click(function () {
        window.location = deleteUrl;
    });
});
