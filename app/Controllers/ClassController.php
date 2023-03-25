<?php
namespace App\Controllers;

use App\Models\ClassModel;
use Framework\Controller;
use Framework\Request;

class ClassController extends Controller
{
    public function index(Request $request){
        return $this->view('classes.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg'], 'classes' => ClassModel::all()]);

    }


}