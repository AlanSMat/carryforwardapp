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
        $query = $this->db->query('SELECT * FROM RequestInformation');
        $this->builder = $this->db->table('RequestInformation');
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
        $requestInformation = $this->builder->getWhere(['principalrequestdetailsid' => $id])->getResult();
        
        return view("request/list", [
            'requestInformation' => $requestInformation]
        );
    }

    public function submitrequest($id) {
        $requestInformation = $this->builder->getWhere(['principalrequestdetailsid' => $id])->getResult();



        //$this->db->get('RequestInformation');

        // $data = array('isCompleted' => 1);
        // $this->db-where("id = $id");
        // $this->db->update('PrincipalRequestDetails', $data);
    }

    public function show($id) 
    {
        $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();
        
        return view("request/show", [
            'requestInformation' => $requestInformation
        ]);
    }

    public function edit($id) 
    {
        $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();

        return view("request/edit", [
            'requestInformation' => $requestInformation]
        );
    }

    public function update($id) 
    {
        $data = [
            'requestrank' => $this->request->getPost("requestrank"),
            'requesttitle' => $this->request->getPost("requesttitle"),
            'fundsource' => $this->request->getPost("fundsource"),
            'expenditurecategory' => $this->request->getPost("expenditurecategory"),
            'requestamount' => $this->request->getPost("requestamount"),
            'requestreason' => $this->request->getPost("requestreason")
        ];

        $this->builder->where('id', $id);
        $this->builder->update($data);
       
        return redirect()->to("request/list/" . $_SESSION['principalrequestdetailsid'] ."");
    }

    public function submitted() {
        return view("request/submitted");
    }

    public function create() 
    {
        $requestInformationModel = new RequestInformationModel;

        $requestInformationModel->insert([
            'principalrequestdetailsid' => $this->request->getPost('principalrequestdetailsid'),
            'requestrank' => $this->request->getPost("requestrank"),
            'requesttitle' => $this->request->getPost("requesttitle"),
            'fundsource' => $this->request->getPost("fundsource"),
            'expenditurecategory' => $this->request->getPost("expenditurecategory"),
            'requestamount' => $this->request->getPost("requestamount"),
            'requestreason' => $this->request->getPost("requestreason")
        ]);

        return redirect()->to("request/list/" . $_SESSION['principalrequestdetailsid'] ."");
    }


}