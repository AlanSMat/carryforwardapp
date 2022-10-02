<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Corporate extends BaseController
{
    public function __construct() 
    {
        $this->db = \Config\Database::connect();
    }

    private function _getPrincipalNetworksWithRequests() 
    {
        $schoolsInformationQuery = $this->db->table('principal_network');
        $schoolsInformationQuery->select('*');
        // $schoolsInformationQuery->join('schools_information', 'principal_network.network_code = schools_information.principal_network_code');
        $schoolsInformationQuery->join('principal_request', 'principal_request.principal_network_code = principal_network.network_code');
        // $schoolsInformationQuery->where('directordetails.directoremail',$_SESSION['userDetails'][0]['directoremail']);
        $schoolsInformationQuery->where('del_sign_off','1');

        return $schoolsInformation = $schoolsInformationQuery->get()->getResult();
    }

    public function index()
    {
        $principalNetworkData = $this->_getPrincipalNetworksWithRequests();
        
        return view('corporate/index',[
           'principalNetworkData' => $principalNetworkData
        ]);
    }

    public function show($id) 
    {
        $builder = $this->db->table('schools_information');
        $builder->select('request_information.*, schools_information.school_name');
        $builder->join('request_information', 'schools_information.id = request_information.schools_information_id');
        $builder->where('request_information.id',$id);
        $request_information = $builder->get()->getResult();
        
        return view("corporate/show", [
            'request_information' => $request_information
        ]);        
    }

    public function requestList( $requestListId ) 
    {
        $builder = $this->db->table('principal_request');
        $builder->select('*');
        $builder->join('request_information', 'request_information.principal_request_id = principal_request.id');
        $request_information = $builder->getWhere([ 'principal_request_id' => $requestListId ])->getResult();

        return view("corporate/requestList", [
            'request_information' => $request_information
        ]);        
    }

    public function getCorporateInformationByEmail( $emailAddress ) 
    {        
        $model = new \App\Models\CorporateDetailsModel;

        return $model->where('corporateemail', $emailAddress)->findAll();
    }

    public function createPDF() {
        $pdf = new APP\Libaries\TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);        
    }
}
