<?php

namespace App\Controllers\User;

use System\Controller;

class ProfileController extends Controller
{
    /**
    * Submit for creating new user
    *
    * @return string | json
    */
    public function update()
    {
        $json = [];

        $data["lang"] = $this->load->model('Lang')->loadAll();

        $user = $this->load->model('Login')->user();

        if ($this->isValid($user->id)) {
            // it means there are no errors in form validation
            $this->load->model('Users')->update($user->id, $user->users_group_id);

            $json['success'] = $data["lang"]["edit_success"];

            $json['redirectTo'] = $this->request->referer() ?: $this->url->link('user');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

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
        $this->validator->required('last_name',$data["lang"]["family_required"]);
        $this->validator->required('email',$data["lang"]["email_required"])->email('email');

        if ($this->request->post('password')) {
            $this->validator->required('password')->minLen('password', 8)->match('password', 'confirm_password', $data["lang"]["password_not_match"]);
        }

        $this->validator->image('image');

        return $this->validator->passes();
    }
}
