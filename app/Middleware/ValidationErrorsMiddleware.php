<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 00:25
 */
namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if(isset($_SESSION['errors'])){
            $this->container->view->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
        }
        unset($_SESSION['errors']);
        $response= $next($request,$response);
        return $response;
    }
}