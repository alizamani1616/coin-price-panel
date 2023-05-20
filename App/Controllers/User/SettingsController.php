<?php

namespace App\Controllers\User;

use System\Controller;

class SettingsController extends Controller
{
    /**
    * Display Settings Form
    *
    * @return mixed
    */
    public function index()
    {
        $this->html->setTitle('تنظیمات');

        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
        $data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;

        $settingsModel = $this->load->model('Settings');

        $settingsModel->loadAll();

        $data['action'] = $this->url->link('user/settings/save');


        $data['logo'] = '';
        if (!empty($settingsModel->get('logo'))) {
            $data['logo'] = $this->url->link('public/images/' . $settingsModel->get('logo'));
        }


        $data['site_name'] = $this->request->post('site_name') ?: $settingsModel->get('site_name');
        $data['site_title'] = $this->request->post('site_title') ?: $settingsModel->get('site_title');
        $data['site_email'] = $this->request->post('site_email') ?: $settingsModel->get('site_email');

        $data["lang"] = $this->load->model('Lang')->loadAll();



        $view = $this->view->render('user/settings/form', $data);

        return $this->userLayout->render($view);
    }

    /**
    * Submit for creating new ad
    *
    * @return string | json
    */
    public function save()
    {
        if ($this->isValid()) {
            // it means there are no errors in form validation
            $this->load->model('Settings')->updateSettings();

            $this->session->set('success', 'تنظیمات با موفقیت ذخیره شد');

            $this->url->redirectTo('user/settings');
        } else {
            // it means there are errors in form validation
            $this->session->set('errors', $this->validator->flattenMessages());
            return $this->index();
        }
    }

     /**
     * Validate the form
     *
     * @param int $id
     * @return bool
     */
    private function isValid($id = null)
    {
        $this->validator->required('site_name', 'نام سایت الزامی است');
        $this->validator->required('site_email', 'ایمیل سایت الزامی است');
        return $this->validator->passes();
    }
}
