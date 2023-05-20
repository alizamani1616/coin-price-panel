<?php

namespace App\Controllers\User;

use System\Controller;

class UsersController extends Controller
{
    /**
    * Display Users  List
    *
    * @return mixed
    */
    public function index()
    {
        $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->html->setTitle($data["lang"]["users"]);

        $data['users'] = $this->load->model('Users')->all();
        $data['allOnline'] = $this->load->model('Users')->allOnline();

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $view = $this->view->render('user/users/list', $data);

        return $this->userLayout->render($view);
    }

    /**
    * Open Users  Form
    *
    * @return string
    */
    public function add()
    {
        return $this->form();
    }

    /**
    * Open Users  Form
    *
    * @return string
    */
    public function news()
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

      $data['target'] = 'news-user-form';

      $data['action'] = $this->url->link('user/users/send-news');

      $data['heading'] = $data["lang"]["send_email"];

      return $this->view->render('user/users/news', $data);


    }
    public function send_news()
    {

      $this->load->model('Users')->send_email();
      $data["lang"] = $this->load->model('Lang')->loadAll();


      $json['success'] =  $data["lang"]["submit_success"];



      return $this->json($json);
    }

    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function submit()
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Users')->create();

            $json['success'] =  $data["lang"]["submit_success"];

            $json['redirectTo'] = $this->url->link('user/users');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

     /**
     * Display Edit Form
     *
     * @param int $id
     * @return string
     */
    public function edit($id)
    {
        $usersModel = $this->load->model('Users');

        if (! $usersModel->exists($id)) {
            return $this->url->redirectTo('404');
        }

        $user = $usersModel->get($id);

        return $this->form($user);
    }

     /**
     * Display Form
     *
     * @param \stdClass $user
     */
    private function form($user = null)
    {
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($user) {
            // editing form
            $data['target'] = 'edit-user-' . $user->id;

            $data['action'] = $this->url->link('user/users/save/' . $user->id);

            $data['heading'] = $data["lang"]["edit"] . $user->first_name . ' ' . $user->last_name;

            $data['id'] =$user->id;


        } else {
            // adding form
            $data['target'] = 'add-user-form';

            $data['action'] = $this->url->link('user/users/submit');

            $data['heading'] = $data["lang"]["add_user"];
        }

        $user = (array) $user;

        $data['first_name'] = array_get($user, 'first_name');
        $data['last_name'] = array_get($user, 'last_name');
        $data['status'] = array_get($user, 'status', 'enabled');
        $data['users_group_id'] = array_get($user, 'users_group_id');
        $data['email'] = array_get($user, 'email');
        $data['gender'] = array_get($user, 'gender');

        $data['birthday'] = '';
        $data['image'] = '';

        if (! empty($user['birthday'])) {
            $data['birthday'] = date('d-m-Y', $user['birthday']);
        }

        if (! empty($user['image'])) {
            // default path to upload user image : public/images
            $data['image'] = $this->url->link('public/images/' . $user['image']);
        }

        $data['users_groups'] = $this->load->model('UsersGroups')->all();
        $data["lang"] = $this->load->model('Lang')->loadAll();
        return $this->view->render('user/users/form', $data);
    }

    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function save($id)
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid($id)) {
            // it means there are no errors in form validation
            $this->load->model('Users')->update($id);

            $json['success'] = $data["lang"]["edit_success"];

            $json['redirectTo'] = $this->url->link('user/users');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }

     /**
     * Delete Record
     *
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $usersModel = $this->load->model('Users');
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if (! $usersModel->exists($id) OR $id == 1) {
            return $this->url->redirectTo('404');
        }

        $usersModel->delete($id);

        $json['success'] = $data["lang"]["delete_success"];

        return $this->json($json);
    }

     /**
     * Validate the form
     *
     * @param int $id
     * @return bool
     */
    private function isValid($id = null)
    {
        $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->validator->required('first_name', $data["lang"]["name_required"]);
        $this->validator->required('last_name', $data["lang"]["family_required"]);
        $this->validator->required('email', $data["lang"]["email_required"])->email('email');
        $this->validator->unique('email', ['users', 'email', 'id', $id]);

        if (is_null($id)) {
            // if the id is null
            // then this method is called to create new user
            // so we will validate the password as it should be required
            // and the image as well
            $this->validator->required('password', $data["lang"]["password_required"])->minLen('password', 8)->match('password', 'confirm_password', $data["lang"]["password_not_match"]);
        } else {
            $this->validator->image('image');
        }

        return $this->validator->passes();
    }




}
