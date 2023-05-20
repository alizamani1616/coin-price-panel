<?php

namespace App\Controllers\User;

use System\Controller;

class LoginController extends Controller
{
    /**
    * Display Login Form
    *
    * @return mixed
    */
    public function index()
    {
        $loginModel = $this->load->model('login');

        if ($loginModel->isLogged()) {
            return $this->url->redirectTo('user/dashboard');
        }

        $data['errors'] = $this->errors;
        $data["lang"] = $this->load->model('Lang')->loadAll();
        return $this->view->render('user/users/login', $data);
    }

    /**
    * Submit Login form
    *
    * @return mixed
    */
    public function submit()
    {

      $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            $loginModel = $this->load->model('Login');

            $loggedInUser = $loginModel->user();

            if ($this->request->post('remember')) {
                // save login data in cookie
                $this->cookie->set('login', $loggedInUser->code);
            } else {
                // save login data in session
                $this->session->set('login', $loggedInUser->code);
            }

            $json = [];

            $json['success']  =  $loggedInUser->first_name ." ". $data["lang"]["welcome"];

            $json['redirect'] = $this->url->link('user');

            return $this->json($json);
        } else {
            $json = [];

            $json['errors'] = implode('<br>', $this->errors);

            return $this->json($json);
        }
    }

    /**
    * Validate Login Form
    *
    * @return bool
    */
    private function isValid()
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

        $email = $this->request->post('email');
        $password = $this->request->post('password');

        if (! $email) {
            $this->errors[] = $data["lang"]["email_wrong"];
        }
        if (! $password) {
            $this->errors[] = $data["lang"]["password_wrong"];
        }

        if (! $this->errors) {
            $loginModel = $this->load->model('Login');

            if (! $loginModel->isValidLogin($email, $password)) {
                $this->errors[] = $data["lang"]["input_wrong"];
            }
        }

        return empty($this->errors);
    }
}
