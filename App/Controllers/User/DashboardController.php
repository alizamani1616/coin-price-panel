<?php

namespace App\Controllers\User;
use System\Controller;

class DashboardController extends Controller
{
     /**
     * Display Dashboard Page
     *
     * @return mixed
     */
    public function index()
    {
        $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->html->setTitle($data["lang"]["dashboard"]);
        $data["user"] = $this->load->model('Login')->user();

        $data["lang_list"] = $this->load->model('Languages')->all();
        $view = $this->view->render('user/main/dashboard',$data);
       return $this->userLayout->render($view);
    }


    public function set_lang($id)
    {
      $this->load->model('Lang')->Setlang($id);
      $data["lang"] = $this->load->model('Lang')->loadAll();
      $this->html->setTitle($data["lang"]["dashboard"]);
      $data["user"] = $this->load->model('Login')->user();
      $data["lang_list"] = $this->load->model('Languages')->all();
      $view = $this->view->render('user/main/dashboard',$data);
      return $this->userLayout->render($view);
    }




}
