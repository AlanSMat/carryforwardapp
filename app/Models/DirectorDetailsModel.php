<?php

namespace App\Models;

class DirectorDetailsModel extends \CodeIgniter\Model
{
    protected $table = 'DirectorDetails';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['directorname',
                                'directoremail',
                                'region'];
}