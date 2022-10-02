<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
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
        $principalDetails = new \App\Controllers\Principal;

        $isPrincipal = $principalDetails->getSchoolInformationByPrincipalEmail( $emailAddress );

        if( $isPrincipal ) {
            
            $principalRequestDetailsModel = new \App\Models\PrincipalRequestDetailsModel;

            // is there an existing request that hasn't been completed yet?
            $existingRequest = $principalRequestDetailsModel->where('principalemail', $emailAddress)
                                                            ->where('iscompleted',0)
                                                            ->findAll();

            $userDetails = $isPrincipal;

            $_SESSION['principalrequestdetailsid'] = $existingRequest[0]['id'];

            $userDetails[0]['principalrequestdetailsid'] = $existingRequest[0]['id'];
            $userDetails[0]['userRole'] = 'principal';
            $userDetails[0]['isquestionnairecompleted'] = 0;
            
            if($existingRequest) {
                $userDetails[0]['isquestionnairecompleted'] = $existingRequest[0]['isquestionnairecompleted'];
            }

            return $userDetails;
        };
        
        $directorDetails = new \App\Controllers\Director;
        $isDirector = $directorDetails->getDirectorInformationByEmail( $emailAddress );
        
        if( $isDirector ) {
            
            $userDetails = $isDirector;
            $userDetails[0]['userRole'] = 'director';
                        
            return $userDetails;

        };

        $corporateDetails = new \App\Controllers\Corporate;
        $isCorporate = $corporateDetails->getCorporateInformationByEmail( $emailAddress );
        
        if( $isCorporate ) {
            
            $userDetails = $isCorporate;
            $userDetails[0]['userRole'] = 'corporate';
                        
            return $userDetails;

        };

        //dd($principalModel->where('principalemail',$emailAddress));
    }
}
