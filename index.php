<?php
define('PATH_TO_MODELS',$_SERVER['DOCUMENT_ROOT'].'/framework/');

include_once PATH_TO_MODELS.'Request.php';
include_once PATH_TO_MODELS.'Router.php';
include_once PATH_TO_MODELS.'Application.php';

use Framework\Auth;
use Framework\Request;
use Framework\Router;
use Framework\Application;

date_default_timezone_set('Asia/Yekaterinburg');

if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
$url = $_SERVER['REQUEST_URI'];
$request = new Request();

$auth = new Auth(new Request());
Application::init();

echo (new Router($request, $auth))->getContent();

exit();

require "dbconnect.php";
require "auth.php";
require "menu.php";
switch ($_GET['page']){
    case 'children':
        require "children.php";
        break;
    case 'class':
        require "class.php";
        break;
    case 'plan':
        require "plan.php";
        break;
    case 'visit':
        require "visit.php";
        break;
    case 'payment':
        require "payment.php";
        break;
}
require "message.php";
$_SESSION['msg'] = '';
require "footer.php";