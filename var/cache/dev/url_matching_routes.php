<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/allergens' => [[['_route' => 'app_allergens_index', '_controller' => 'App\\Controller\\Public\\AllergensController::index'], null, ['GET' => 0], null, true, false, null]],
        '/allergens/new' => [[['_route' => 'app_allergens_new', '_controller' => 'App\\Controller\\Public\\AllergensController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\Public\\HomeController::index'], null, null, null, false, false, null]],
        '/ingredients' => [[['_route' => 'app_ingredients_index', '_controller' => 'App\\Controller\\Public\\IngredientsController::index'], null, ['GET' => 0], null, true, false, null]],
        '/ingredients/new' => [[['_route' => 'app_ingredients_new', '_controller' => 'App\\Controller\\Public\\IngredientsController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/nutritional/values' => [[['_route' => 'app_nutritional_values_index', '_controller' => 'App\\Controller\\Public\\NutritionalValuesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/nutritional/values/new' => [[['_route' => 'app_nutritional_values_new', '_controller' => 'App\\Controller\\Public\\NutritionalValuesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/recipes' => [[['_route' => 'app_recipes_index', '_controller' => 'App\\Controller\\Public\\RecipesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/recipes/new' => [[['_route' => 'app_recipes_new', '_controller' => 'App\\Controller\\Public\\RecipesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/steps' => [[['_route' => 'app_steps_index', '_controller' => 'App\\Controller\\Public\\StepsController::index'], null, ['GET' => 0], null, true, false, null]],
        '/steps/new' => [[['_route' => 'app_steps_new', '_controller' => 'App\\Controller\\Public\\StepsController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/profile/delete' => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|components/([^/]++)(?:/([^/]++))?(*:78)'
                    .'|wdt/([^/]++)(*:97)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:138)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:175)'
                                .'|router(*:189)'
                                .'|exception(?'
                                    .'|(*:209)'
                                    .'|\\.css(*:222)'
                                .')'
                            .')'
                            .'|(*:232)'
                        .')'
                    .')'
                .')'
                .'|/allergens/([^/]++)(?'
                    .'|(*:265)'
                    .'|/edit(*:278)'
                    .'|(*:286)'
                .')'
                .'|/ingredients/([^/]++)(?'
                    .'|(*:319)'
                    .'|/edit(*:332)'
                    .'|(*:340)'
                .')'
                .'|/nutritional/values/([^/]++)(?'
                    .'|(*:380)'
                    .'|/edit(*:393)'
                    .'|(*:401)'
                .')'
                .'|/re(?'
                    .'|cipes/([^/]++)(?'
                        .'|(*:433)'
                        .'|/edit(*:446)'
                        .'|(*:454)'
                    .')'
                    .'|set\\-password/reset(?:/([^/]++))?(*:496)'
                .')'
                .'|/steps/([^/]++)(?'
                    .'|(*:523)'
                    .'|/edit(*:536)'
                    .'|(*:544)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        78 => [[['_route' => 'ux_live_component', '_live_action' => 'get'], ['_live_component', '_live_action'], null, null, false, true, null]],
        97 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        138 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        175 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        189 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        209 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        222 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        232 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        265 => [[['_route' => 'app_allergens_show', '_controller' => 'App\\Controller\\Public\\AllergensController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        278 => [[['_route' => 'app_allergens_edit', '_controller' => 'App\\Controller\\Public\\AllergensController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        286 => [[['_route' => 'app_allergens_delete', '_controller' => 'App\\Controller\\Public\\AllergensController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        319 => [[['_route' => 'app_ingredients_show', '_controller' => 'App\\Controller\\Public\\IngredientsController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        332 => [[['_route' => 'app_ingredients_edit', '_controller' => 'App\\Controller\\Public\\IngredientsController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        340 => [[['_route' => 'app_ingredients_delete', '_controller' => 'App\\Controller\\Public\\IngredientsController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        380 => [[['_route' => 'app_nutritional_values_show', '_controller' => 'App\\Controller\\Public\\NutritionalValuesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        393 => [[['_route' => 'app_nutritional_values_edit', '_controller' => 'App\\Controller\\Public\\NutritionalValuesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        401 => [[['_route' => 'app_nutritional_values_delete', '_controller' => 'App\\Controller\\Public\\NutritionalValuesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        433 => [[['_route' => 'app_recipes_show', '_controller' => 'App\\Controller\\Public\\RecipesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        446 => [[['_route' => 'app_recipes_edit', '_controller' => 'App\\Controller\\Public\\RecipesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        454 => [[['_route' => 'app_recipes_delete', '_controller' => 'App\\Controller\\Public\\RecipesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        496 => [[['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null]],
        523 => [[['_route' => 'app_steps_show', '_controller' => 'App\\Controller\\Public\\StepsController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        536 => [[['_route' => 'app_steps_edit', '_controller' => 'App\\Controller\\Public\\StepsController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        544 => [
            [['_route' => 'app_steps_delete', '_controller' => 'App\\Controller\\Public\\StepsController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
