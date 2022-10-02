<?php

namespace App\Models;

class CorporateDetailsModel extends \CodeIgniter\Model
{
    protected $table = 'corporatedetails';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['corporatename',
                                'corporateemail'];
}