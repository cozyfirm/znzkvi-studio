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
        });
    });

    /*
     *  Admin quiz questions and answers
     */
    Route::group(['namespace' => 'Quiz', 'prefix' => '/quizzes', 'middleware' => 'isRoot'], function(){
        Route::group(['prefix' => '/quiz'], function(){
            Route::get ('/',                                'QuizController@index')->name('system.quiz');
            Route::get ('/preview-quiz/{id}',               'QuizController@preview')->name('system.quiz.preview');
            Route::get ('/sync-quizzes',                    'QuizController@syncQuizzess')->name('system.quiz.sync-quizzes');
            Route::post('/sync-quizzes-from-center',        'QuizController@syncQuizzesFromCenter')->name('system.quiz.sync-quizzes-from-center');

            /* Demo quiz */
            Route::get ('/demo',                            'QuizController@demo')->name('system.quiz.demo');
            Route::post('/send-demo-message',               'QuizController@sendDemoMsg')->name('system.quiz.send-demo-message');
        });

        Route::group(['prefix' => '/questions'], function(){
            Route::get ('/',                            'QuestionsController@index')->name('system.quiz.questions');
            Route::get ('/new-question',                'QuestionsController@newQuestion')->name('system.quiz.questions.new-question');
            Route::post('/save',                        'QuestionsController@save')->name('system.quiz.questions.save-question');
            Route::get ('/preview-question/{id}',       'QuestionsController@previewQuestion')->name('system.quiz.questions.preview-question');
            Route::get ('/edit/{id}',                   'QuestionsController@edit')->name('system.quiz.questions.edit-question');
            Route::put ('/update',                      'QuestionsController@update')->name('system.quiz.questions.update-question');
            Route::get ('/delete/{id}',                 'QuestionsController@delete')->name('system.quiz.questions.delete-question');
        });
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
    });
});
