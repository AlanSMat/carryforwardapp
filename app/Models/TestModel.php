<?php

namespace App\Models;

class TestModel extends \CodeIgniter\Model
{
    protected $table = 'PrincipalRequestDetails';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['school_code','school_name','principalname','principalemail'];
}