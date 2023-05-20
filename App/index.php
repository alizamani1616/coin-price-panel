<?php
// white list routes
use System\Application;

$app = Application::getInstance();

$app->route->callFirst(function ($app) {
    $app->load->action('User/Access', 'index');
});

if (strpos($app->request->url(), 'user') === 0 ) {
    // check if the current url started with /user
    // if so, then call our middlewares
    $app->route->callFirst(function ($app) {
        $app->load->action('User/Access', 'index');
    });

    // share user layout
    $app->share('userLayout', function ($app) {
        return $app->load->controller('User/Common/Layout');
    });

} else {
    // share Blog layout
    $app->share('blogLayout', function ($app) {
        return $app->load->controller('Blog/Common/Layout');
    });

    // share|load settings for each request
    $app->share('settings', function ($app) {
        $settingsModel = $app->load->model('Settings');

        $settingsModel->loadAll();

        return $settingsModel;
    });

}



// User Routes
$app->route->add('user/login', 'User/Login');
$app->route->add('user/login/submit', 'User/Login@submit', 'POST');



// dashboard
$app->route->add('user' , 'User/Dashboard');
$app->route->add('user/dashboard' , 'User/Dashboard');
$app->route->add('user/submit' , 'User/Dashboard@submit', 'POST');

// user => users
$app->route->add('user/users', 'User/Users');
$app->route->add('user/users/add', 'User/Users@add', 'POST');
$app->route->add('user/users/news', 'User/Users@news', 'POST');
$app->route->add('user/users/sned-news', 'User/Users@send_news', 'POST');
$app->route->add('user/users/submit', 'User/Users@submit', 'POST');
$app->route->add('user/users/edit/:id', 'User/Users@edit', 'POST');
$app->route->add('user/users/save/:id', 'User/Users@save' , 'POST');
$app->route->add('user/users/delete/:id', 'User/Users@delete', 'POST');

// user => user profile
$app->route->add('user/profile/update', 'User/Profile@update' , 'POST');

// user => users groups
$app->route->add('user/users-groups', 'User/UsersGroups');
$app->route->add('user/users-groups/add', 'User/UsersGroups@add', 'POST');
$app->route->add('user/users-groups/submit', 'User/UsersGroups@submit', 'POST');
$app->route->add('user/users-groups/edit/:id', 'User/UsersGroups@edit', 'POST');
$app->route->add('user/users-groups/save/:id', 'User/UsersGroups@save' , 'POST');
$app->route->add('user/users-groups/delete/:id', 'User/UsersGroups@delete', 'POST');



// User Languages Routes
$app->route->add('user/languages', 'User/Languages');
$app->route->add('user/languages/add', 'User/Languages@add', 'POST');
$app->route->add('user/languages/add-word', 'User/Languages@addWord', 'POST');
$app->route->add('user/languages/submit-word', 'User/Languages@submitWord', 'POST');
$app->route->add('user/languages/submit', 'User/Languages@submit', 'POST');
$app->route->add('user/languages/edit/:id', 'User/Languages@edit', 'POST');
$app->route->add('user/languages/save/:id', 'User/Languages@save' , 'POST');
$app->route->add('user/languages/delete/:id', 'User/Languages@delete', 'POST');
$app->route->add('user/languages/default/:id', 'User/Languages@default', 'POST');
$app->route->add('user/languages/list-content/excel/:id', 'User/Languages@addExcel', 'POST');
$app->route->add('user/languages/list-content/:id', 'User/Languages@list', 'GET');
$app->route->add('user/language/:id', 'User/Dashboard@set_lang', 'GET');
$app->route->add('user/languages/list/edit/:id', 'User/Languages@edit_content', 'POST');
$app->route->add('user/languages/save-content/:id', 'User/Languages@save_content', 'POST');




$app->route->add('user/coins', 'User/Coins');
$app->route->add('user/coins/get-all', 'User/Coins@getAllCoins');

// User settings
$app->route->add('user/settings', 'User/Settings');
$app->route->add('user/settings/save', 'User/Settings@save', 'POST');


// logout
$app->route->add('user/logout', 'User/Logout');


$app->route->add('/', 'User/Login');

// Not Found Routes
$app->route->add('404', 'User/Login');
$app->route->notFound('404');


