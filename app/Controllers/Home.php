<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('PrincipalRequestDetails');
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