<?php

namespace App\Libraries;

class Authentication 
{
    public function login($email, $password) 
    {

    }

    private function isPrincipal() 
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
    }
}