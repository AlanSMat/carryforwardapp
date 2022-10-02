<?php

namespace App\Models;

class PrincipalRequestModel extends \CodeIgniter\Model
{
    protected $table = 'principal_request';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['schools_information_id',
                                'school_code',
                                'school_name',
                                'principal_name',
                                'principal_email',
                                'principal_network_code',
                                'is_questionnaire_completed',
                                'is_completed',
                                'del_sign_off'];
}