$(document).ready(function () {
    let deleteUrl = '';

    $(".delete-item, .go-to-with-prevent").click(function (e) {
        deleteUrl = $(this).attr('href');
        let dTitle = $(this).attr('d-title');
        let cTitle = $(this).attr('custom-title');

        if(cTitle !== undefined){
            $(".pop-up-message").text(cTitle);
        }else{
            if(dTitle !== undefined){
                $(".pop-up-message").text('Da li ste sigurni da želite izbrisati "' + dTitle + '"?');
            }else{
                $(".pop-up-message").text('Da li ste sigurni da želite izbrisati ovaj uzorak?');
            }
        }

        $(".pop-up-title").text('OBAVJEŠTENJE');

        $(".pop-up-wrapper").fadeIn();
        e.preventDefault();
    });
    $(".pop-up-close").click(function () {
        $(".pop-up-wrapper").fadeOut();
    });
    $(".pop-up-continue").click(function () {
        window.location = deleteUrl;
    });
});
