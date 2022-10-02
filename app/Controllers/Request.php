<?php
namespace App\Controllers;

use App\Models;
use App\Models\RequestInformationModel;
use App\Models\CustomModel;

class Request extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('request_information');
    }

    public function index() 
    {
        return view('/request/index');
    }

    public function add() {
        return view("request/add");
    }

    public function list($id) 
    {
        // $requestInformation = $this->builder->getWhere(['principal_request_id' => $id])
        //                                     ->orderBy('request_rank', 'ASC')
        //                                     ->getResult();
        
        $requestInformation = $this->builder->orderBy('request_rank', 'ASC')
                                            ->getWhere(['principal_request_id' => $id])
                                            ->getResult();;

        return view("request/list", [
            'request_information' => $requestInformation]
        );
    }

    public function submitrequest($id) {
        $requestInformation = $this->builder->getWhere(['principal_request_id' => $id])->getResult();



        //$this->db->get('request_information');

        // $data = array('is_completed' => 1);
        // $this->db-where("id = $id");
        // $this->db->update('principal_request', $data);
    }

    public function show($id) 
    {
        $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();
        
        return view("request/show", [
            'request_information' => $requestInformation
        ]);
    }

    public function edit($id) 
    {
        $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();

        return view("request/edit", [
            'request_information' => $requestInformation]
        );
    }

    public function update($id) 
    {
        $data = [
            'request_rank'         => $this->request->getPost("request_rank"),
            'request_title'        => $this->request->getPost("request_title"),
            'fund_source'          => $this->request->getPost("fund_source"),
            'expenditure_category' => $this->request->getPost("expenditure_category"),
            'request_amount'       => $this->request->getPost("request_amount"),
            'request_reason'       => $this->request->getPost("request_reason")
        ];

        $this->builder->where('id', $id);
        $this->builder->update($data);
       
        return redirect()->to("request/list/" . $_SESSION['principal_request_id'] ."")
                         ->with('info-message','Request updated successfully');
    }

    public function submitted() {
        return view("request/submitted");
    }

    public function create() 
    {
        $requestInformationModel = new RequestInformationModel;
        
        $requestInformationModel->insert([
            'principal_request_id'   => $this->request->getPost('principal_request_id'),
            'schools_information_id' => $this->request->getPost('schools_information_id'),
            'principal_network_code' => $_SESSION['userDetails'][0]['principal_network_code'],
            'request_rank'           => $this->request->getPost("request_rank"),
            'request_title'          => $this->request->getPost("request_title"),
            'fund_source'            => $this->request->getPost("fund_source"),
            'expenditure_category'   => $this->request->getPost("expenditure_category"),
            'request_amount'         => $this->request->getPost("request_amount"),
            'request_reason'         => $this->request->getPost("request_reason")
        ]);
        
        return redirect()->to("request/list/" . $_SESSION['principal_request_id'] ."")
                         ->with('info-message', 'Request created successfully');;
    }


}