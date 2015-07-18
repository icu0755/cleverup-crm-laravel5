<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', 'DashboardController@show');

    /**
     * Customer routes
     */

    Route::get('/customers', ['as' => 'customers.showCustomers', 'uses' => 'CustomerController@showCustomers']);
    Route::get('/customers/add/{groupId?}', ['as' => 'customers.addForm', 'uses' => 'CustomerController@showCustomerForm']);
    Route::post('/customers/add', 'CustomerController@createCustomer');
    Route::get('/customers/edit/{customerId}', ['as' => 'customers.edit', 'uses' => 'CustomerController@editCustomer']);
    Route::post('/customers/edit/{customerId}', 'CustomerController@saveCustomer');
    Route::get('/customers/of/{groupId}', ['as' => 'customers.showCustomersOf', 'uses' => 'CustomerController@showCustomersOf']);
    Route::get('/customers/show/{customerId}', ['as' => 'customers.show', 'uses' => 'CustomerController@showCustomer']);
    Route::get('/customers/remove/{customerId}', ['as' => 'customers.remove', 'uses' => 'CustomerController@removeCustomer']);
    Route::post('/customers/table', 'CustomerController@table');

    /**
     * Customer group routes
     */

    Route::get('/customer-groups', ['as' => 'customer-groups.showGroups', 'uses' => 'CustomerGroupController@showGroups']);
    Route::get('/customer-groups/add', ['as' => 'customer-groups.addForm', 'uses' => 'CustomerGroupController@showGroup']);
    Route::post('/customer-groups/add', 'CustomerGroupController@createGroup');
    Route::get('/customer-groups/edit/{groupId}', ['as' => 'customer-groups.edit', 'uses' => 'CustomerGroupController@editGroup']);
    Route::post('/customer-groups/edit/{groupId}', 'CustomerGroupController@saveGroup');
    Route::get('/customer-groups/remove/{groupId}', ['as' => 'customer-groups.remove', 'uses' => 'CustomerGroupController@removeGroup']);
    Route::get('/customer-groups/members/{groupId}', [
        'as'   => 'customer-groups.members',
        'uses' => 'CustomerGroupController@showMembers',
    ]);
    Route::post('/customer-groups/table', 'CustomerGroupController@table');

    /**
     * Customer comment routes
     */

    Route::post('/customer-comments/add/{customerId}', 'CustomerCommentController@addComment');


    /**
     * Customer group comment routes
     */
    Route::post('/customer-group-comments/add/{groupId}', array(
        'as' => 'customer-groups.comments.add',
        'uses' => 'CustomerGroupCommentController@addComment',
    ));

    /**
     * Event routes
     */
    Route::get('/events', ['as' => 'events', 'uses' => 'EventController@index']);
    Route::get('/events/add/{start?}/{end?}', ['as' => 'events.add', 'uses' => 'EventController@add']);
    Route::post('/events/add', ['as' => 'events.create', 'uses' => 'EventController@create']);
    Route::get('/events/edit/{eventId}', ['as' => 'events.edit', 'uses' => 'EventController@edit']);
    Route::post('/events/edit/{eventId}', ['as' => 'events.save', 'uses' => 'EventController@save']);
    Route::get('/events/remove/{eventId}', ['as' => 'events.remove', 'uses' => 'EventController@remove']);
    Route::post('/api/events', 'EventController@events');

    /**
     * SmsController routes
     */
    Route::post('/sms/customer/{customerId}', ['as' => 'sms.customer', 'uses' => 'SmsController@sendToCustomer']);

    /**
     * UsersController
     */
    Route::resource('users', 'UsersController');

    /**
     * LessonController
     */
    Route::any('/lessons', ['as' => 'lessons.index', 'uses' => 'LessonController@index']);
    Route::post('/lessons/store', ['as' => 'lessons.store', 'uses' => 'LessonController@store']);

    /**
     * PaymentsController
     */
    Route::resource('customers.payments', 'PaymentsController');
});