<?php

namespace App\Controllers\User;

use System\Controller;

class CoinsController extends Controller
{

  public function index()
  {
    $data["lang"] = $this->load->model('Lang')->loadAll();

    $this->html->setTitle($data["lang"]["coins"]);
    $user = $this->load->model('Login')->user();
      $data['url'] = $this->url->link('user/coins/'.'?page=');
      $data['pagination'] = $this->pagination->paginate();


      $view = $this->view->render('user/coins/list', $data);

      return $this->userLayout->render($view);
  }





  public function getAllCoins()
  {
      $coins = $this->load->model('Coins')->all();
      return $coins;
  }









}
