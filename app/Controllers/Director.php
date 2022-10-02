<?php
namespace App\Controllers;

class Director extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        //$this->builder = $this->db->table('PrincipalRequestDetails');
    }

    public function index()
    {
        $builder = $this->db->table('PrincipalRequestDetails');
        $builder->select('*');
        $builder->join('RequestInformation', 'PrincipalRequestDetails.id = RequestInformation.principalrequestdetailsid');
        $builder->where('PrincipalRequestDetails.directorate',$_SESSION['userDetails'][0]['schoolperformancedirectorate']);
        $builder->where('iscompleted',1);

        $requestInformation = $builder->get()->getResult();
        
        return view('director/index', [
            'requestInformation' => $requestInformation
        ]);
    }

    public function show($id) 
    {
        $builder = $this->db->table('RequestInformation');
        $requestInformation = $builder->getWhere(['id' => $id])->getResult();
        
        return view("director/show", [
            'requestInformation' => $requestInformation
        ]);        
    }

    public function getDirectorInformationByEmail( $emailAddress ) {

        $model = new \App\Models\DirectorDetailsModel;

        return $model->where('directoremail', $emailAddress)->findAll();
    }

    public function processRequest($id) 
    {
        $model = new \App\Models\RequestInformationModel;

        $data = [
            'status' => $_POST['status'],
            'directorresponse' => $_POST['directorresponse']
        ];
        
        $model->update($id, $data);

        //return to the index page
        $builder = $this->db->table('PrincipalRequestDetails');
        $builder->select('*');
        $builder->join('RequestInformation', 'PrincipalRequestDetails.id = RequestInformation.principalrequestdetailsid');
        $builder->where('PrincipalRequestDetails.directorate',$_SESSION['userDetails'][0]['schoolperformancedirectorate']);
        $builder->where('iscompleted',1);

        $requestInformation = $builder->get()->getResult();
        
        return redirect()->to('director/index');

    }

    public function edit($id) 
    {
        // $requestInformation = $this->builder->getWhere(['id' => $id])->getResult();

        // return view("request/edit", [
        //     'requestInformation' => $requestInformation]
        // );
    }

    public function list($id) 
    {
        $requestInformation = $this->builder->getWhere(['principalrequestdetailsid' => $id])->getResult();
        
        return view("request/list", [
            'requestInformation' => $requestInformation]
        );
    }

}