<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->getPostParams()['login'];
        $password = $request->getPostParams()['password'];
        if (isset($login) and $login != '') {
            $user = UserModel::getWhere('login', '=', $login)[0];
            if ($user){
                if ($password == $user->md5password){
                    $_SESSION['user'] = $user;
                    $_SESSION['login'] = $user->login;
                    $_SESSION['firstname'] = $user->first_name;
                    $_SESSION['lastname'] = $user->last_name;
                    $_SESSION['id'] = $user->id;
                    $_SESSION['msg'] = "Вы успешно вошли в систему";

                }
                else $_SESSION['msg'] = "Неправильный пароль";

            }
            else $_SESSION['msg'] = "Неправильный логин";
        }
        return $this->view('header.php');

    }
    public function logout(Request $request){
        $_SESSION = null;
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        return $this->view('header.php');
    }
}