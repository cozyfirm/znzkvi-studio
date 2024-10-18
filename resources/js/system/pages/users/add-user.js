$(document).ready(function (){
    let uri = '/system/quiz-play/users/check-for-existence';
    let fetchUri = '/system/quiz-play/users/fetch-user-data';
    let checkUri = '/system/quiz-play/users/check-for-attr';

    let changeColor = function (found, value){
        if(found){
            $("#selected_user").val(value);
            $(".page-menu-icon-w").addClass("bg-green")
                .find("img").attr('src', '/images/font-awesome/users-solid-white.svg');
        }else{
            $("#selected_user").val(value);
            $(".page-menu-icon-w").removeClass("bg-green")
                .find("img").attr('src', '/images/font-awesome/users-solid.svg');
        }
    }

    $("#search-by-lastname").keyup(function (){
        let value = $(this).val();
        let usersCard = $(".users-card");

        changeColor(false, "");

        if(value.length < 2){
            usersCard.addClass('d-none');
            return;
        }

        $.ajax({
            url: uri,
            method: 'POST',
            data: {
                first_name : $("#first_name").val(),
                last_name : value
            },
            success: function success(response) {
                response = JSON.parse(response);

                if(response['code'] === '0000'){
                    let users = response['data']['users'];

                    if(users.length){
                        usersCard.removeClass('d-none');
                        $(".users__invisible__wrapper").empty();

                        for(let i=0; i<users.length; i++){
                            let wrapperClas = (users[i]['allowed_to_play'] === true) ? "user__wrapper" : "user__wrapper not_allowed";
                            $(".users__invisible__wrapper").append(function (){
                                return $("<div>").attr('class', wrapperClas)
                                    .append(function (){
                                        return $("<div>").attr('class', 'user__info')
                                            .append(function (){
                                                return $("<p>").text(users[i]['name'])
                                                    .attr('class', 'non-select')
                                            })
                                            .append(function (){
                                                return $("<img>").attr('src', '/images/font-awesome/chevron-down-solid.svg')
                                                    .attr('class', 'arrow')
                                            });
                                    })
                                    .append(function (){
                                        return $("<div>").attr('class', 'users__rest__data hidden')
                                            .append(function (){
                                                return $("<ul>")
                                                    .append(function (){
                                                        return $("<li>").text(users[i]['email'])
                                                    })
                                                    .append(function (){
                                                        return $("<li>").text(users[i]['prefix'] + users[i]['phone'])
                                                    })
                                                    .append(function (){
                                                        return $("<li>").text(users[i]['address'])
                                                    })
                                                    .append(function (){
                                                        return $("<li>").text(users[i]['city'] + ',' + users[i]['country_rel']['name_ba'])
                                                    })
                                            })
                                            .append(function (){
                                                if(users[i]['hasScore'] === true){
                                                    return $("<small>").text(users[i]['score_exp']);
                                                }
                                            })
                                            .append(function (){
                                                return $("<small>").text(users[i]['additional_info']);
                                            })
                                            .append(function (){
                                                return $("<div>").attr('class', 'use__it').attr('user-id', users[i]['id'])
                                                    .append(function (){
                                                        return $("<p>").text('Preuzmi podatke')
                                                    });
                                            });
                                    });
                            });
                        }
                    }else{
                        usersCard.addClass('d-none');
                    }
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /**
     *  Show hide files
     */

    let previousTarget = null;

    $("body").on('click', '.user__info', function (){
        if($(this).parent().hasClass('clicked')){
            $(this).parent().find('.arrow').removeClass('rotated');
            $(this).parent().find('.users__rest__data').addClass('hidden');
            $(this).parent().removeClass('clicked');
        }else{
            $(this).parent().find('.arrow').addClass('rotated');
            $(this).parent().find('.users__rest__data').removeClass('hidden');
            $(this).parent().addClass('clicked');
        }
    });

    $("body").on('click', '.use__it', function (){
        let id = $(this).attr('user-id');
        $.ajax({
            url: fetchUri,
            method: 'POST',
            data: {id : id},
            success: function success(response) {
                response = JSON.parse(response);
                if(response['code'] === '0000'){
                    let user = response['data']['user'];

                    $(".first_name").val(user['first_name']);
                    $(".last_name").val(user['last_name']);
                    $(".email").val(user['email']);
                    $(".username").val(user['username']);
                    $(".prefix").val(user['prefix']);
                    $(".phone").val(user['phone']);
                    $(".address").val(user['address']);
                    $(".city").val(user['city']);
                    $(".country").val(user['country']);

                    changeColor(true, user['id']);
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Live checks such as:
     *  - email
     *  - username
     */

    let checkForAttr = function (object, key, value, sucMsg, errMsg){
        $.ajax({
            url: checkUri,
            method: 'POST',
            data: {
                key : key,
                value : value
            },
            success: function success(response) {
                response = JSON.parse(response);
                if(response['code'] === '0000'){
                    console.log(response['data']['exists']);
                    if(response['data']['exists'] !== 0){
                        /* Attribute is not unique */
                        $("#" + key + "Help").removeClass('txt-green').addClass('txt-red').text(errMsg);
                    }else{
                        /* Unique attribute */
                        $("#" + key + "Help").removeClass('txt-red').addClass('txt-green').text(sucMsg);
                    }
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    };

    $(".email").keyup(function (){
        if($(this).val().length > 2){
            if(validator.email($(this).val())){
                checkForAttr($(this), 'email', $(this).val(), "Email je validan!", "Odabrani email se već koristi!");
            }else{
                $("#emailHelp").removeClass('txt-green').addClass('txt-red').text("Email nije validan! ");
            }
        }
    });
    $(".username").keyup(function (){
        if($(this).val().length > 2){
            checkForAttr($(this), 'username', $(this).val(), "Korisničko ime je validno!", "Odabrano korisničko ime se već koristi!");
        }
    });
});
