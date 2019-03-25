<?php
namespace Core;

class View 
{
    /**
     * @fn	public function display($file, $vars)
     *
     * @brief	Displays this object
     *
     * @author	Roxane Riff
     * @date	15/03/2019
     *
     * @param	file	The file.
     * @param	vars	The variables.
     *
     * @returns	Roxane Riff function.
     */

    public function display($file, $vars) {
        ob_start();
        include_once('../App/View/header.php');
        include_once('../App/View/'.$file.'.php');
        include_once('../App/View/footer.php');
        ob_end_flush();
    }

    /**
     * @fn	public function displayAdmin($file, $vars)
     *
     * @brief	Displays this object in admin
     *
     * @author	Roxane Riff
     * @date	15/03/2019
     *
     * @param	file	The file.
     * @param	vars	The variables.
     *
     * @returns	A function.
     */

    public function displayAdmin($file, $vars) {
        ob_start();
        include_once('../App/View/Admin/header.php');
        include_once('../App/View/Admin/'.$file.'.php');
        include_once('../App/View/Admin/footer.php');
        ob_end_flush();
    }

	public function cleanUrl($url) 
	{
		$url = strip_tags($url);
		$url = preg_replace('# #', '-', $url);
		$url = preg_replace('#\'#', '-', $url);
		return $url;
	}
}