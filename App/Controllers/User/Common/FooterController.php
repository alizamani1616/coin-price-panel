<?php

namespace App\Controllers\User\Common;

use System\Controller;

class FooterController extends Controller
{
    public function index()
    {
        $data['user'] = $this->load->model('Login')->user();
        $data['lang']  = $this->load->model('Lang')->loadAll();
        $data['active_lang_id']  = $this->load->model('Lang')->getActiveLanguage();
        $data["lang_list"] = $this->load->model('Languages')->all();

        return $this->view->render('user/common/footer', $data);
    }
}
