<?php
    namespace App\Controller;
    use Core\Controller;
    use App\Model;

class App extends \Core\Controller 
{
    
    public function index()
    {
        $postModel = new \App\Model\Episodes();
        $count = $postModel->count();
        
        $results_per_page = 5;
        $pages = ceil($count / $results_per_page); 
        
        if(!isset($_GET['page']) || ($_GET['page'] < 1) || ($_GET['page'] > $pages)) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        
        $episodes = $postModel->list(($page-1) * $results_per_page, $results_per_page*$page);
        
        $this->view->display('index', ['page' => $page, 'pages' => $pages, 'episodes' => $episodes]);       
    }

}
