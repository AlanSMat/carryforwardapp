<?php

namespace App\Models;

class CorporateDetailsModel extends \CodeIgniter\Model
{
    protected $table = 'corporate_information';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['corporatename',
                                'corporateemail'];
}