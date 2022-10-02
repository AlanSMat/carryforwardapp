<?php

namespace App\Controllers;

class Principal extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
        //dd($this->db->get('PrincipalRequestDetails'));
        $this->builder = $this->db->table('PrincipalRequestDetails');
    }

    public function index()
    {
        return view('principal/index');
    }

    public function getExistingRequest() 
    {
        $result = $this->builder->where('principalemail', $_SESSION['userDetails'][0]['principalemail'])
                                ->where('iscompleted',0)
                                ->get();

        if($result->getNumRows()) 
        {
            $existingRequestInformation = [
                'id' => $result->getResult()[0]->id,
                'isquestionnarecompleted' => $result->getResult()[0]->isquestionnairecompleted
            ];

            return $principlaRequestId = $existingRequestInformation;    
        };

        return false;
        
    }

    private function _insertRequest() {

        $principalRequestDetailsModel = new \App\Models\PrincipalRequestDetailsModel;

        $principalRequestDetailsModel->insert([
            'schoolcode'     => $_SESSION['userDetails'][0]['schoolcode'],
            'schoolname'     => $_SESSION['userDetails'][0]['schoolname'],
            'principalname'  => $_SESSION['userDetails'][0]['principalname'],
            'principalemail' => $_SESSION['userDetails'][0]['principalemail'],
            'directorate'    => $_SESSION['userDetails'][0]['schoolperformancedirectorate']
        ]);

        $_SESSION['principalrequestdetailsid'] = $principalRequestDetailsModel->insertID;
    }

    public function createRequest()
    {
        // check to see if we have an existing request
        if($requestInformation = $this->getExistingRequest()) 
        {
            $_SESSION['principalrequestdetailsid'] = $requestInformation['id'];    

            // if the questionnaire has already been completed for this request
            if($requestInformation['isquestionnarecompleted']) {    

                // redirect to the request list page
                return redirect()->to("request/list/" . $_SESSION['principalrequestdetailsid'] ."");
            }

            // the questionnaire has not been completed for this request, redirect to the questionnaire index page
            return redirect()->to("/questionnaire/index");

        } else { //its a new request create it
            
            $this->_insertRequest();

            // redirect to the questionnaire index page
            return redirect()->to("/questionnaire/index");
        }

    }

    public function getSchoolInformationByPrincipalEmail($principalEmail) {
        $schoolsModel = new \App\Models\SchoolsModel;

        return $schoolsModel->where('principalEmail', $principalEmail)->findAll();
    }

    public function submitrequest($id) {

        $principalRequestDetailsModel = new \App\Models\PrincipalRequestDetailsModel;

        // set is completed flag
        $principalRequestDetailsModel->update($id, [
            'iscompleted' => '1'
        ]);

        // email to the director

        return redirect()->to("request/submitted")
                         ->with('info','Your request has been submitted successfully');        
    }

    public function submitted() {
        return view("request/submitted");
    }

    public function edit($id) 
    {
        $principalRequestDetailsModel = new \App\Models\PrincipalRequestDetailsModel;
        
        $result = $principalRequestDetailsModel->find($id);

        dd($result);
    }
}