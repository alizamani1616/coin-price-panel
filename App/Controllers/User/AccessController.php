<?php

namespace App\Controllers\User;

use System\Controller;

class AccessController extends Controller
{
    /**
    * Check User Permissions to access user pages
    *
    * @return void
    */
    public function index()
    {
        $loginModel = $this->load->model('Login');

        $ignoredPages = ['user/login', 'user/login/submit'];

        $currentRoute = $this->route->getCurrentRouteUrl();

        // First Scenario :
        // User is not logged in and he is not requesting login page
        // then we will redirect him to login page
        if (($isNotLogged =  ! $loginModel->isLogged()) AND ! in_array($currentRoute , $ignoredPages)) {
            return $this->url->redirectTo('user/login');
        }

        // On going to this line
        // it means that there are two possibilities
        // First One the user is not logged in and he is requesting login page
        // Second One the user is logged in successfully and he is requesting
        // an user page

        if ($isNotLogged) {
            return false;
        }

        $user = $loginModel->user();

        $usersGroupsModel = $this->load->model('UsersGroups');


        //update online time
        $userModel = $this->load->model('Users')->onlineTime($user->id);

        $usersGroup = $usersGroupsModel->get($user->users_group_id);



                // If the user doesn't have permissions to access this page
                //  then he will be redirected to 404 page
                if (! in_array($currentRoute, $usersGroup->pages)) {
                    // we may create access-denied page
                    return $this->url->redirectTo('404');
                }

    }
}
