<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 02:24
 */
namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException
{
    public static $defaultTemplates=[
        self::MODE_DEFAULT => [
            self::STANDARD => 'Senha nao é igual.',
        ],
    ];
}