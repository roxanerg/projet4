<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;


class Bio extends \Core\Controller
{
    /**
     * @fn	public function view()
     *
     * @brief	Gets the view
     *
     * @author	Roxane Riff
     * @date	25/03/2019
     *
     * @returns	Roxane Riff function.
     */

    public function view()
    {
        $bioModel = new \App\Model\Bio();
        $bio = $bioModel->get(1);
        $this->view->display('biography', ['biography' => $bio]);
    }
}    
