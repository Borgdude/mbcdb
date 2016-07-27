<?php

// importing the routers
use App\Http\Routers\CounselorsRouter;
use App\Http\Routers\PagesRouter;
use App\Http\Routers\AdminRouter;
use App\Http\Routers\SandboxRouter;
use App\Http\Routers\AuthRouter;

// setting the routes
CounselorsRouter::setRoutes();
PagesRouter::setRoutes();
AdminRouter::setRoutes();
SandboxRouter::setRoutes();
AuthRouter::setRoutes();

Route::post('/search', 'SearchController@search');
