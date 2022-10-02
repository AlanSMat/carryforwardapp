<?php

namespace App\Models;

class PrincipalRequestDetailsModel extends \CodeIgniter\Model
{
    protected $table = 'PrincipalRequestDetails';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['schoolcode',
                                'schoolname',
                                'principalname',
                                'principalemail',
                                'directorate',
                                'isquestionnairecompleted',
                                'iscompleted',
                                'isapproved'];
}