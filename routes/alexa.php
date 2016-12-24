<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

AlexaRoute::launch('/skill', function() {
    return (new \Develpr\AlexaApp\Response\AlexaResponse(
        new \Develpr\AlexaApp\Response\Speech('Yes, it is working!'),
        new \Develpr\AlexaApp\Response\Card('Response from laravel app!')
    ))->endSession();
});
//
//AlexaRoute::sessionEnded('/alexa', function() {
//    return '{"version":"1.0","response":{"shouldEndSession":true}}';
//});
//
//AlexaRoute::intent('/alexa', 'GetZodiacHoroscopeIntent', 'App\Http\Controllers\WhatIsMyFavoriteColor@handle');

