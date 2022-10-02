<?php

namespace App\Models;

class DirectorInformationModel extends \CodeIgniter\Model
{
    protected $table = 'director_information';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['director_name',
                                'director_email',
                                'principal_network_code'];
}