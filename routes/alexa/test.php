<?php


AlexaRoute::launch('/skill', function() {
    return (new \Develpr\AlexaApp\Response\AlexaResponse(
        new \Develpr\AlexaApp\Response\Speech('Yes, it is working!'),
        new \Develpr\AlexaApp\Response\Card('Response from laravel app!')
    ))->endSession();
});

//AlexaRoute::intent('/alexa', 'GetZodiacHoroscopeIntent', 'App\Http\Controllers\WhatIsMyFavoriteColor@handle');

