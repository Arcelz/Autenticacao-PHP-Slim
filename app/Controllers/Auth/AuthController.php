<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/03/2017
 * Time: 16:31
 */
namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    public function getSignOut($request, $response)
    {
        $this->auth->logout();

        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );
        if (!$auth) {
            $this->flash->addMessage('error','Login nao pode ser efetudado,ha algo de errado na combinação');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response)
    {

        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->falied()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 10]),
        ]);
        $this->flash->addMessage('info','Usuario Cadastrado');
        $this->auth->attempt($user->email, $request->getParam('password'));
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
