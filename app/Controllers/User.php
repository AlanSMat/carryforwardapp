<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        //
    }

    private function isPrincipal() 
    {

    }

    // determines whether the user is an administrator, corporate, director or principal
    public function getUserDetails( $emailAddress ) 
    {
        $principalInformationModel = new \App\Controllers\Principal;

        $principalInformation = $principalInformationModel->getSchoolInformationByPrincipalEmail( $emailAddress );

        if( $principalInformation ) 
        {   
            $principalRequestModel = new \App\Models\PrincipalRequestModel;

            // is there an existing request that hasn't been completed yet?
            $existingRequest = $principalRequestModel->where('principal_email', $emailAddress)
                                                     ->orderBy('updatedat','desc')
                                                     ->find();
            
            $schoolsInformationModel = new \App\Models\SchoolsInformationModel;
            $schoolsInformationId = $schoolsInformationModel->where('principal_email', $emailAddress)->find()[0]['id'];

            if(!$existingRequest) 
            { 
                $existingRequest[0]['id'] = 0;
                $existingRequest[0]['is_questionnaire_completed'] = 0;
            }
                                                                                                                        
            $userDetails = $principalInformation;

            $this->session->set('principal_request_id',$existingRequest[0]['id']);
            
            $userDetails[0]['principal_request_id'] = $existingRequest[0]['id'];
            $userDetails[0]['userRole'] = 'principal';
            $userDetails[0]['principal_network_code'] = $principalInformation[0]['principal_network_code'];
            $userDetails[0]['is_questionnaire_completed'] = $existingRequest[0]['is_questionnaire_completed'];
            $userDetails[0]['schools_information_id'] = $schoolsInformationId;
            
            $this->session->set('userDetails',$userDetails);
            
            return redirect()->to('principal/index');
        };
        
        $directorInformationModel = new \App\Controllers\Director;
        $directorInformation = $directorInformationModel->getDirectorInformationByEmail( $emailAddress );
        
        if( $directorInformation ) {
            
            $userDetails = $directorInformation;
            $userDetails[0]['userRole'] = 'director';
            
            $this->session->set('userDetails',$userDetails);

            return redirect()->to('director/index');

        };

        $corporateInformationModel = new \App\Controllers\Corporate;
        $corporateInformation = $corporateInformationModel->getCorporateInformationByEmail( $emailAddress );
        
        if( $corporateInformation ) {
            
            $userDetails = $corporateInformation;
            $userDetails[0]['userRole'] = 'corporate';
            
            $this->session->set('userDetails',$userDetails);

            return redirect()->to('corporate/index');

        };
    }
}
