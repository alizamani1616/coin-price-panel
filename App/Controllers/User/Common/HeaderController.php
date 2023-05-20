<?php

namespace App\Controllers\User\Common;

use System\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        $data['title'] = $this->html->getTitle();
        $data['user'] = $this->load->model('Login')->user();

        $data["lang"] = $this->load->model('Lang')->loadAll();
        $data["lang_list"] = $this->load->model('Languages')->all();

        $settingsModel = $this->load->model('Settings');
        $settingsModel->loadAll();
        $data['site_logo'] = $this->url->link('public/images/' .  $settingsModel->get('logo'));
        return $this->view->render('user/common/header', $data);
    }
}
