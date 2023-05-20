<?php

namespace App\Controllers\User;

use System\Controller;

class UsersGroupsController extends Controller
{
    /**
    * Display Users Groups List
    *
    * @return mixed
    */
    public function index()
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->html->setTitle($data["lang"]["users_groups"]);
        $settingsModel = $this->load->model('Settings');

        $data['users_groups'] = $this->load->model('UsersGroups')->all();

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $view = $this->view->render('user/users-groups/list', $data);

        return $this->userLayout->render($view);
    }

    /**
    * Open Users Groups Form
    *
    * @return string
    */
    public function add()
    {
        return $this->form();
    }

    /**
    * Submit for creating new users group
    *
    * @return string | json
    */
    public function submit()
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('UsersGroups')->create();

            $json['success'] =$data["lang"]["submit_success"];

            $json['redirectTo'] = $this->url->link('user/users-groups');
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
        $usersGroupsModel = $this->load->model('UsersGroups');

        if (! $usersGroupsModel->exists($id)) {
            return $this->url->redirectTo('404');
        }

        $usersGroup = $usersGroupsModel->get($id);

        return $this->form($usersGroup);
    }

     /**
     * Display Form
     *
     * @param \stdClass $usersGroup
     */
    private function form($usersGroup = null)
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($usersGroup) {
            // editing form
            $data['target'] = 'edit-users-group-' . $usersGroup->id;

            $data['action'] = $this->url->link('user/users-groups/save/' . $usersGroup->id);

            $data['heading'] = $data["lang"]["edit"] . $usersGroup->name;
        } else {
            // adding form
            $data['target'] = 'add-users-group-form';

            $data['action'] = $this->url->link('user/users-groups/submit');

            $data['heading'] = $data["lang"]["add_users_group"];
        }

        $data['name'] = $usersGroup ? $usersGroup->name : null;

        $data['users_group_pages'] = $usersGroup ? $usersGroup->pages : [];

        //$data['status'] = $usersGroup ? $usersGroup->status : 'enabled';

        $data['pages'] = $this->getPermissionPages();

        return $this->view->render('user/users-groups/form', $data);
    }

     /**
     * Get All Permission Pages
     *
     * @return array
     */
     private function getPermissionPages()
     {
         $permissions = [];

         foreach ($this->route->routes() AS $route) {
             if (strpos($route['url'], 'user') === 0) {
                 $permissions[] = $route['url'];
             }
         }

         return $permissions;
     }

    /**
    * Submit for creating new users group
    *
    * @return string | json
    */
    public function save($id)
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('UsersGroups')->update($id);

            $json['success'] = $data["lang"]["edit_success"];

            $json['redirectTo'] = $this->url->link('user/users-groups');
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
      $data["lang"] = $this->load->model('Lang')->loadAll();

        $usersGroupsModel = $this->load->model('UsersGroups');

        if (! $usersGroupsModel->exists($id) OR $id == 1) {
            return $this->url->redirectTo('404');
        }

        $usersGroupsModel->delete($id);

        $json['success'] = $data["lang"]["delete_success"];

        return $this->json($json);
    }

     /**
     * Validate the form
     *
     * @return bool
     */
    private function isValid()
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->validator->required('name',$data["lang"]["name_required"]);

        return $this->validator->passes();
    }
}
