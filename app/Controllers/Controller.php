<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/03/2017
 * Time: 16:58
 */
namespace App\Controllers;

class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->container= $container;
    }

    public function __get($property)
    {
        if($this->container->{$property}){
            return $this->container->{$property};
        }
    }
}