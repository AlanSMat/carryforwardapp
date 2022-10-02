<?php

namespace App\Models;

class PrincipalNetworkModel extends \CodeIgniter\Model
{
    protected $table = 'principal_network';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    
    protected $allowedFields = ['network_code','network_name'];
}