<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/03/2017
 * Time: 16:31
 */
namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{
    public function index($request,$response)
    {
        return $this->view->render($response,'home.twig');
    }
}
