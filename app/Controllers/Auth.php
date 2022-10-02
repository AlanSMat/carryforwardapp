<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct() 
    {
        
    }

    public function index()
    {
        return view('index');
    }

    public function edit($id) 
    {
        // $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();

        // return view("request/edit", [
        //     'requestInformation' => $requestInformation]
        // );
    }
}