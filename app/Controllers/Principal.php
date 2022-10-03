<?php

namespace App\Controllers;

class Principal extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        //dd($this->db->get('principal_request'));
        $this->builder = $this->db->table('principal_request');
    }

    public function index()
    {
        return view('principal/index');
    }

    public function getExistingRequest() 
    {
        $result = $this->builder->where('principal_email', $_SESSION['userDetails'][0]['principal_email'])
                                ->where('is_completed',0)
                                ->get();
        
        if($result->getNumRows()) 
        {
            $existingRequestInformation = [
                'id' => $result->getResult()[0]->id,
                'isquestionnarecompleted' => $result->getResult()[0]->is_questionnaire_completed
            ];

            return $principlaRequestId = $existingRequestInformation;    
        };

        return false;
        
    }

    private function _insertRequest() {

        $principalRequestModel = new \App\Models\PrincipalRequestModel;

        $principalRequestModel->insert([
            'schools_information_id' => $_SESSION['userDetails'][0]['schools_information_id'],
            'school_code'            => $_SESSION['userDetails'][0]['school_code'],
            'school_name'            => $_SESSION['userDetails'][0]['school_name'],
            'principal_name'         => $_SESSION['userDetails'][0]['principal_name'],
            'principal_email'        => $_SESSION['userDetails'][0]['principal_email'],
            'principal_network_code' => $_SESSION['userDetails'][0]['principal_network_code'],
        ]);

        $_SESSION['principal_request_id'] = $principalRequestModel->insertID;
    }

    public function createRequest()
    {
        // check to see if we have an existing request
        if($requestInformation = $this->getExistingRequest()) 
        {
            $_SESSION['principal_request_id'] = $requestInformation['id'];    

            // if the questionnaire has already been completed for this request
            if($requestInformation['isquestionnarecompleted']) {    

                // redirect to the request list page
                return redirect()->to("request/list/" . $_SESSION['principal_request_id'] ."");
            }

            // the questionnaire has not been completed for this request, redirect to the questionnaire index page
            return redirect()->to("/questionnaire/index");

        } else { //its a new request create it
            
            $this->_insertRequest();

            // redirect to the questionnaire index page
            return redirect()->to("/questionnaire/index")
                             ->with('info-message','Your request has been added successfully');
        }

    }

    public function getSchoolInformationByPrincipalEmail($principal_Email) {
        $schoolsModel = new \App\Models\SchoolsInformationModel;

        return $schoolsModel->where('principal_email', $principal_Email)->findAll();
    }

    public function submitrequest($id) {

        $principalRequestModel = new \App\Models\PrincipalRequestModel;

        // set is completed flag
        $principalRequestModel->update($id, [
            'is_completed' => '1'
        ]);

        // email to the director

        return redirect()->to("request/submitted");        
    }

    public function submitted() {
        return view("request/submitted");
    }
}