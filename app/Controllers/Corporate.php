<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Corporate extends BaseController
{
    public function index()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('PrincipalRequestDetails');

        $builder->select('*');
        $builder->join('RequestInformation', 'PrincipalRequestDetails.id = RequestInformation.principalrequestdetailsid');

        $requestInformation = $builder->get()->getResult();

        return view('corporate/requestlist',[
           'requestInformation' => $requestInformation
        ]);
    }

    public function show($id) 
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('RequestInformation');
        $requestInformation = $builder->getWhere(['id' => $id])->getResult();
        
        return view("corporate/show", [
            'requestInformation' => $requestInformation
        ]);        
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
