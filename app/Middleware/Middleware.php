<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 00:22
 */
namespace App\Middleware;

class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container=$container;
    }
}