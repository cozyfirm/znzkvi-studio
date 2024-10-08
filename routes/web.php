<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'PublicPart', 'prefix' => '/'], function(){
    Route::get ('/',                                 'HomeController@home')->name('public-part.home');
    Route::get ('/test',                             'HomeController@test')->name('public-part.test');

    /* Quiz */
    Route::get ('/studio-quiz',                      'StudioQuizController@studioQuiz')->name('public-part.quiz.studio-quiz');
    Route::get ('/presenter-view',                   'StudioQuizController@presenterVersion')->name('public-part.quiz.presenter-view');
});


Route::group(['namespace' => 'System', 'prefix' => '/system'], function(){

    /*
     *  Authentication system (without auth APIs)
     */
    Route::group(['prefix' => '/auth'], function(){
        Route::get ('/',                              'AuthController@auth')->name('system.auth');
        Route::post('/authenticate',                  'AuthController@authenticate')->name('system.authenticate');

        Route::get ('/logout',                        'AuthController@logout')->name('system.auth.logout');

        /*
         *  Create new profile
         */
        Route::get ('/create-profile',                'AuthController@createProfile')->name('system.auth.create-profile');
        Route::post('/create-new-profile',            'AuthController@createNewProfile')->name('system.auth.create-new-profile');
    });

    /*
     *  Users route group
     */
    Route::group(['prefix' => '/users', 'middleware' => 'isLogged'], function(){
        Route::get ('/my-profile',                    'UsersController@myProfile')->name('system.users.my-profile');
        Route::post('/update-profile',                'UsersController@updateProfile')->name('system.users.update-profile');

        Route::group(['prefix' => '/', 'middleware' => 'isRoot'], function(){
            Route::get ('/all-users',                 'UsersController@allUsers')->name('system.users.all-users');
            Route::get ('/create-new-user',           'UsersController@createUser')->name('system.users.create-user');
            Route::post('/save-new-user',             'UsersController@saveUser')->name('system.users.save-user');
            Route::get ('/preview-user/{username}',   'UsersController@previewUser')->name('system.users.preview-user');
            Route::get ('/edit-user/{username}',      'UsersController@editUser')->name('system.users.edit-user');
            Route::put ('/update-user-data',          'UsersController@updateUserData')->name('system.users.update-user-data');

            /**
             *  History of users
             */
            // Route::get ('/users-history',             'UsersController@usersHistory')->name('system.users.users-history');
            // Route::get ('/preview-history/{id}',      'UsersController@previewHistory')->name('system.users.users-history.preview');
        });
    });

    /*
     *  Admin quiz questions and answers
     */
    Route::group(['namespace' => 'Quiz', 'prefix' => '/quizzes', 'middleware' => 'isRoot'], function(){
        Route::group(['prefix' => '/quiz'], function(){
            Route::get ('/',                                'QuizController@index')->name('system.quiz');
            Route::get ('/preview-quiz/{id}',               'QuizController@preview')->name('system.quiz.preview');
            Route::get ('/delete-quiz/{id}',                'QuizController@delete')->name('system.quiz.delete');
            Route::get ('/sync-quizzes',                    'QuizController@syncQuizzess')->name('system.quiz.sync-quizzes');
            Route::post('/sync-quizzes-from-center',        'QuizController@syncQuizzesFromCenter')->name('system.quiz.sync-quizzes-from-center');

            /* Update quiz-question image */
            Route::get ('/edit-category-photo/{quiz_id}/{id}',        'QuizController@editCategoryImage')->name('system.quiz.edit-category-image');
            Route::post('/update-category-photo',                     'QuizController@updateCategoryImage')->name('system.quiz.update-category-image');

            /* Demo quiz */
            Route::get ('/demo',                            'QuizController@demo')->name('system.quiz.demo');
            Route::post('/send-demo-message',               'QuizController@sendDemoMsg')->name('system.quiz.send-demo-message');

            /* Push data back to central server */
            Route::get ('/sync-quizzes-to-center',          'QuizController@syncQuizzesToCenter')->name('system.quiz.sync-quizzes-to-center');
        });

        Route::group(['prefix' => '/questions'], function(){
            Route::get ('/',                            'QuestionsController@index')->name('system.quiz.questions');
            Route::get ('/preview-question/{id}',       'QuestionsController@previewQuestion')->name('system.quiz.questions.preview-question');
            Route::get ('/edit/{id}',                   'QuestionsController@edit')->name('system.quiz.questions.edit-question');
            Route::put ('/update',                      'QuestionsController@update')->name('system.quiz.questions.update-question');
        });
    });

    /*
     *  Play a quiz
     */
    Route::group(['namespace' => 'QuizPlay', 'prefix' => '/quiz-play'], function(){
        /*
         * Root routes
         **/
        Route::group(['middleware' => 'isRoot'], function(){
            /*
             *  Work with users
             */
            Route::group(['prefix' => '/users'], function(){
                Route::get ('/create-user',                         'UsersPlayController@create')->name('system.quiz-play.users.create-user');
                Route::post('/save-user',                           'UsersPlayController@save')->name('system.quiz-play.users.save');

                /*
                 *  Check for users existence in database
                 */
                Route::post('/check-for-existence',                 'UsersPlayController@checkForExistence')->name('system.quiz-play.users.check-for-existence');
                Route::post('/fetch-user-data',                     'UsersPlayController@fetchUserData')->name('system.quiz-play.users.fetch-user-data');
                Route::post('/check-for-attr',                      'UsersPlayController@checkForAttr')->name('system.quiz-play.users.check-for-attr');
            });

            /*
             *  Start with quiz
             */
            Route::group(['prefix' => '/live'], function(){
                Route::get ('/live-stream/{quiz_id}',               'QuizPlayController@live')->name('system.quiz-play.live');

                /* Live stream routes and actions */
                Route::post('/start-a-quiz',                        'QuizPlayController@startQuiz')->name('system.quiz-play.live.start-quiz');
                Route::post('/answer-the-question',                 'QuizPlayController@answerTheQuestion')->name('system.quiz-play.live.answer-the-question');
                Route::post('/finnish-the-quiz',                    'QuizPlayController@finnishQuiz')->name('system.quiz-play.live.finnish-quiz');

                Route::post('/propose-the-answer',                  'QuizPlayController@proposeTheAnswer')->name('system.quiz-play.live.propose-the-answer');

                /* This is used to send message to TV screen and show question to operator */
                Route::post('/reveal-question',                     'QuizPlayController@revealQuestion')->name('system.quiz-play.live.reveal-question');
                Route::post('/reveal-screen',                       'QuizPlayController@revealScreen')->name('system.quiz-play.live.reveal-screen');
            });
        });

        /* Open routes */
        Route::group(['prefix' => '/live'], function(){
            /* Open line */
            Route::post('/open-line',                           'QuizPlayController@openLine')->name('system.quiz-play.live.open-line');
        });
    });

    /*
     *  GUI for sponsors
     */
    Route::group(['namespace' => 'Sponsors', 'prefix' => '/sponsors', 'middleware' => 'isRoot'], function(){
        Route::get ('/',                                        'SponsorsController@index')->name('system.sponsors');
        Route::get ('/create',                                  'SponsorsController@create')->name('system.sponsors.create');

        Route::post('/save',                                    'SponsorsController@save')->name('system.sponsors.save');
        Route::get ('/delete/{id}',                             'SponsorsController@delete')->name('system.sponsors.delete');

        /* Change status and send over MQTT */
        Route::post('/change-element-status',                   'SponsorsController@changeStatus')->name('system.sponsors.change-status');
    });

    Route::group(['namespace' => 'Settings', 'prefix' => '/settings', 'middleware' => 'isRoot'], function(){
        /*
         *  Keywords
         */
        Route::group(['prefix' => '/keywords'], function(){
            Route::get ('/',                                    'KeywordsController@index')->name('system.settings.keywords');
            Route::get ('/preview-instances/{key}',             'KeywordsController@previewInstances')->name('system.settings.keywords.preview-instances');

            /*
             *  User action; Sync all keywords on user click !
             */
            Route::get ('/sync-keywords',                       'KeywordsController@syncKeywords')->name('system.settings.keywords.sync');
        });

        /*
         *  Seasons; Sync seasons with users
         */
        Route::group(['prefix' => '/seasons'], function(){
            Route::get ('/',                                    'SeasonsController@index')->name('system.settings.seasons');
            Route::get ('/preview/{id}',                        'SeasonsController@preview')->name('system.settings.seasons.preview');

            Route::get ('/sync',                                'SeasonsController@sync')->name('system.settings.seasons.sync');
        });
    });
});
