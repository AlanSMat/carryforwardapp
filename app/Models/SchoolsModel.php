<?php

namespace App\Models;

class SchoolsModel extends \CodeIgniter\Model
{
    protected $table = 'Schools';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['schoolcode',
                                'schoolname',
                                'schoolshortname',
                                'postcode',
                                'suburb',
                                'region',
                                'schoolemail',
                                'principalname',
                                'principalemail',
                                'schoolplanningregion',
                                'schoolperformancedirectorate',
                                'primaryclustercode',
                                'primaryclustername',
                                'primaryclusterregion'
                               ];
}