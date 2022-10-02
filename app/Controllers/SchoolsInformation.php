<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchoolsInformation extends BaseController
{
    public function index()
    {
        $schoolsModel = new \App\Models\SchoolsInformationModel;

        
    }

    public function show($id) 
    {
        
        
        // return view("corporate/show", [
        //     'requestInformation' => $requestInformation
        // ]);        
    }

    public function list() {
               $model = new \App\Models\RequestInformationModel;
        $requestInformation = $model->findAll();
    }

    public function getCorporateInformationByEmail( $emailAddress ) {

        $model = new \App\Models\CorporateDetailsModel;

        return $model->where('corporateemail', $emailAddress)->findAll();
    }
}
