<?php

namespace App\Controllers\User\Common;

use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{
    /**
    * Render the layout with the given view Object
    *
    * @param \System\View\ViewInterface $view
    */
    public function render(ViewInterface $view)
    {
        $data['content'] = $view;
        $data['header'] = $this->load->controller('User/Common/Header')->index();
        $data['sidebar'] = $this->load->controller('User/Common/Sidebar')->index();
        $data['footer'] = $this->load->controller('User/Common/Footer')->index();
        $data["lang"] = $this->load->model('Lang')->loadAll();


        return $this->view->render('user/common/layout', $data);
    }
}
