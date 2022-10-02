<?php
namespace App\Controllers;

class Director extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        //$this->builder = $this->db->table('principal_request');
    }

    public function index()
    {
        $schoolsInformationQuery = $this->db->table('director_information');
        $schoolsInformationQuery->select('schools_information.school_name, schools_information.phone1, schools_information.phone2, principal_request.*');
        $schoolsInformationQuery->join('schools_information', 'director_information.principal_network_code = schools_information.principal_network_code');
        $schoolsInformationQuery->join('principal_request', 'principal_request.schools_information_id = schools_information.id');
        $schoolsInformationQuery->where('director_information.director_email',$_SESSION['userDetails'][0]['director_email']);
        $schoolsInformationQuery->where('is_completed','1');
        $schoolsInformationQuery->where('del_sign_off','0');

        $schoolsInformation = $schoolsInformationQuery->get()->getResult();

        $requestInformationQuery = $this->db->table('request_information');
                
        for($i = 0; $i < count($schoolsInformation); $i++) 
        {
            $showFinalApprovalButton = true;
            $requestInformationQuery->select('*');
            $requestInformationQuery->where('schools_information_id',$schoolsInformation[$i]->schools_information_id);
            $requestInformationQuery->where('principal_request_id',$schoolsInformation[$i]->id);
            $requestInformationQuery->where('director_processed','0');
            $requestInformation = $requestInformationQuery->get()->getResult();
            for($j = 0; $j < count($requestInformation); $j++) 
            {
                $schoolsInformation[$i]->{'requestInformation'}[$j] = $requestInformation[$j];
                if($requestInformation[$j]->status === 'pending') {
                    $showFinalApprovalButton = false;
                }
            }
            $schoolsInformation[$i]->{'showFinalApprovalButton'} = $showFinalApprovalButton;
        }
        // loop through the request details
        return view('director/index', [
            'schoolsInformation' => $schoolsInformation
        ]);
    }

    public function delSignOff($principal_request_id) 
    {
        $builder = $this->db->table('principal_request');
        $builder->set('del_sign_off','1');
        $builder->where('id',$principal_request_id);
        $builder->update();
        
        $builder = $this->db->table('request_information');
        $builder->set('director_processed','1');
        $builder->where('principal_request_id', $principal_request_id);
        $builder->update();  

        return redirect()->to('director/index');
    }

    public function show($id) 
    {
        $builder = $this->db->table('schools_information');
        $builder->select('*');
        $builder->join('request_information', 'schools_information.id = request_information.schools_information_id');
        $requestInformation = $builder->getWhere(['request_information.id' => $id])->getResult();
        
        return view("director/show", [
            'requestInformation' => $requestInformation
        ]);        
    }

    public function getDirectorInformationByEmail( $emailAddress ) {

        $model = new \App\Models\DirectorInformationModel;

        return $model->where('director_email', $emailAddress)->findAll();
    }

    public function processRequest($id) 
    {
        $model = new \App\Models\RequestInformationModel;

        $data = [
            'status' => $_POST['status'],
            'director_response' => $_POST['director_response']
        ];
        
        $model->update($id, $data);

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
        $requestInformation = $this->builder->getWhere(['principal_request_id' => $id])->getResult();
        
        return view("request/list", [
            'requestInformation' => $requestInformation]
        );
    }

}