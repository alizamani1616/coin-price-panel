<?php

namespace App\Controllers\User\Common;

use System\Controller;

class SidebarController extends Controller
{
    public function index()
    {

      $user = $this->load->model('Login')->user();
      $usersGroupsModel = $this->load->model('UsersGroups');

      $settingsModel = $this->load->model('Settings');
      $settingsModel->loadAll();
      $data['site_logo'] = $this->url->link('public/images/' .  $settingsModel->get('logo'));
      $data['site_name'] = $settingsModel->get('site_name');
      $data["lang_list"] = $this->load->model('Languages')->all();
      $data['users_group'] = $usersGroupsModel->get($user->users_group_id);
      $data["lang"] = $this->load->model('Lang')->loadAll();

      return $this->view->render('user/common/sidebar',$data);
    }
}
