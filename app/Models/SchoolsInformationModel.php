<?php

namespace App\Models;

class SchoolsInformationModel extends \CodeIgniter\Model
{
    protected $table = 'schools_information';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['school_code',
                                'school_name',
                                'school_short_name',
                                'school_email',
                                'postcode',
                                'suburb',
                                'region',
                                'phone1',
                                'phone2',
                                'principal_name',
                                'principal_email',
                                'principal_network_code'
                               ];
}