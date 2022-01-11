<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    // Get all campaigns
    $router->get('campaigns',  ['uses' => 'CampaignController@showAllCampaigns']);
    // Get specific campaign
    $router->get('campaigns/{id}', ['uses' => 'CampaignController@showOneCampaign']);
    // Insert new campaign
    $router->post('campaigns', ['uses' => 'CampaignController@create']);
    // Delete campaign
    $router->delete('campaigns/{id}', ['uses' => 'CampaignController@delete']);
    // Update campaign
    $router->put('campaigns/{id}', ['uses' => 'CampaignController@update']);

    // Get all users finance
    $router->get('finance',  ['uses' => 'FinanceController@showAll']);
    // Get specific user finance
    $router->get('finance/{id}', ['uses' => 'FinanceController@showOne']);
    // Create finance record for the first time
    $router->post('finance', ['uses' => 'FinanceController@create']);
    // Update finance record
    $router->put('finance/{id}', ['uses' => 'FinanceController@update']);
});
