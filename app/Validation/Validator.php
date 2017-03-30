<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/03/2017
 * Time: 23:39
 */
namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{

    protected $errors;

    public function validate($request,array $rules)
    {
        foreach ($rules as $field => $rule ){
            try{
                $rule->setName(ucfirst($field))->assert($request->getParam($field));

            }catch (NestedValidationException $e){
                $this->errors[$field]= $e->getMessages();
            }
        }

        $_SESSION['errors']= $this->errors;
       return $this;
    }
    public function falied(){
        return !empty($this->errors);
    }
}