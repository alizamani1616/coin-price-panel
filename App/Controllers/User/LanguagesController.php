<?php

namespace App\Controllers\User;

use System\Controller;

class LanguagesController extends Controller
{
    /**
    * Display Languages List
    *
    * @return mixed
    */
    public function index()
    {
        $data['languages'] = $this->load->model('Languages')->all();
        $data["lang"] = $this->load->model('Lang')->loadAll();

        $this->html->setTitle($data["lang"]["languages"]);

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $data["lang"] = $this->load->model('Lang')->loadAll();
        $view = $this->view->render('user/languages/list', $data);

        return $this->userLayout->render($view);
    }

    /**
    * Open Languages Form
    *
    * @return string
    */
    public function add()
    {
        return $this->form();
    }
    public function addWord()
    {
        return $this->formWord();
    }

    /**
    * Submit for creating new language
    *
    * @return string | json
    */
    public function submit()
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Languages')->create();

            $json['success'] =   $data["lang"]["submit_success"];

            $json['redirectTo'] = $this->url->link('user/languages');
        } else {
            // it means there are errors in form validation
            $json['errors'] = $this->validator->flattenMessages();
        }

        return $this->json($json);
    }
    public function submitWord()
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

            $this->load->model('Languages')->createWord();

            $json['success'] =   $data["lang"]["submit_success"];

            $json['redirectTo'] = $this->url->link('user/languages');


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
        $languagesModel = $this->load->model('Languages');

        if (! $languagesModel->exists($id)) {
            return $this->url->redirectTo('404');
        }

        $language = $languagesModel->get($id);

        return $this->form($language);
    }

     /**
     * Display Form
     *
     * @param \stdClass $language
     */
    private function form($language = null)
    {

      $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($language) {
            // editing form
            $data['target'] = 'edit-language-' . $language->id;

            $data['action'] = $this->url->link('user/languages/save/' . $language->id);

            $data['heading'] =  $data["lang"]["edit"]. $language->name;
        } else {
            // adding form
            $data['target'] = 'add-language-form';

            $data['action'] = $this->url->link('user/languages/submit');

            $data['heading'] = $data["lang"]["add_language"];
        }

        $data['id'] = $language ? $language->id : null;
        $data['is_sort'] = $language ? $language->is_sort : null;
        $data['name_l'] = $language ? $language->name : null;
        $data['flag_l'] = $language ? $language->flag : null;
        $data['short_name_l'] = $language ? $language->short_name : null;
        $data['status_l'] = $language ? $language->status : 'enabled';
        $data["language_content"] = $this->load->model('Languages')->selectLanguage();
        $data["lang"] = $this->load->model('Lang')->loadAll();
        if($language)
        {
          return $this->view->render('user/languages/form-edit', $data);

        }
        else {

          return $this->view->render('user/languages/form', $data);

        }
    }

     /**
     * Display Form
     *
     * @param \stdClass $language
     */
    private function formWord()
    {

      $data["lang"] = $this->load->model('Lang')->loadAll();
            $data['target'] = 'add-language-form-word';
            $data['action'] = $this->url->link('user/languages/submit-word');
            $data['heading'] = $data["lang"]["add_word"];
          return $this->view->render('user/languages/form-word', $data);

    }



        public function list($id)
        {
          $data['languages'] = $this->load->model('Languages')->list($id);
          $data["lang"] = $this->load->model('Lang')->loadAll();
          $view = $this->view->render('user/languages/list-content',$data);
          return $this->userLayout->render($view);
        }




    /**
    * Submit for creating new language
    *
    * @return string | json
    */
    public function save($id)
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Languages')->update($id);

            $json['success'] = $data["lang"]["edit_success"];

            $json['redirectTo'] = $this->url->link('user/languages');
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
        $languagesModel = $this->load->model('Languages');
        $data["lang"] = $this->load->model('Lang')->loadAll();

        if (! $languagesModel->exists($id)) {
            return $this->url->redirectTo('404');
        }

        $languagesModel->delete($id);

        $json['success'] = $data["lang"]["delete_success"];

        return $this->json($json);
    }


     /**
     * Delete Record
     *
     * @param int $id
     * @return mixed
     */
    public function list_delete($id)
    {
      $data["lang"] = $this->load->model('Lang')->loadAll();

        $languagesModel = $this->load->model('Languages');

        $languagesModel->list_delete($id);

        $json['success'] = $data["lang"]["delete_success"];

        return $this->json($json);
    }






    public function save_content($id)
    {
        $json = [];
        $data["lang"] = $this->load->model('Lang')->loadAll();


            // it means there are no errors in form validation
            $this->load->model('Languages')->update_content($id);

            $json['success'] = $data["lang"]["edit_success"];


        return $this->json($json);
    }




    public function edit_content($id)
    {
        $languagesModel = $this->load->model('Languages');

        $language = $languagesModel->get_content($id);

        return $this->form_content($language);
    }



      private function form_content($language)
      {
        $data["lang"] = $this->load->model('Lang')->loadAll();

          if ($language) {
              // editing form
              $data['target'] = 'edit-language-' . $language->id;

              $data['action'] = $this->url->link('user/languages/save-content/' . $language->id);

              $data['heading'] =   $data["lang"]["edit"] . $language->name;
          }

          $data['name'] = $language ? $language->name : null;
          $data['language_name'] = $language ? $language->language_name : null;

          $data["lang"] = $this->load->model('Lang')->loadAll();
          return $this->view->render('user/languages/form-content', $data);
      }




      public function default($id)
      {
          $json = [];

          $data["lang"] = $this->load->model('Lang')->loadAll();

              $languageModel = $this->load->model('Languages');
              if (! $languageModel->exists($id)) {
                  return $this->url->redirectTo('404');
              }

              $language = $languageModel->get($id);


                $this->load->model('Languages')->is_default($id);
                $json['success'] = $language;
                $json['success'] = $data["lang"]["submit_success"];




          return $this->json($json);
      }


      public function addExcel($id)
      {
          $languageModel = $this->load->model('Languages');

          $languageModel->addExcel($id);

          $data["lang"] = $this->load->model('Lang')->loadAll();
          $json['success'] = $data["lang"]["submit_success"];

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

        $this->validator->required('name_l', $data["lang"]["name_required"]);

        return $this->validator->passes();
    }
}
