<?php

// Skill route
AlexaRoute::launch('/studiesalg', 'App\Http\Controllers\Alexa\Studiesalg\StatusSkillController@statusToday');

// Flash briefing route
Route::get('/studiesalg/flash', 'App\Http\Controllers\Alexa\Studiesalg\FlashBriefingController@index');



//AlexaRoute::intent('/alexa', 'GetZodiacHoroscopeIntent', 'App\Http\Controllers\WhatIsMyFavoriteColor@handle');

