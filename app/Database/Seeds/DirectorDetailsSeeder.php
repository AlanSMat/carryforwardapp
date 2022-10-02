<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DirectorDetailsSeeder extends Seeder
{
    public function run() 
    {
        $data = [
            [
             'directorname' => 'Joe Smith',
             'directoremail' => 'joe@smith.com',
             'principal_network_code' => '25991',
             'region' => 'Hunter/Central Coast'
            ],
            [
             'directorname' => 'Jennifer Hughes',
             'directoremail' => 'jennifer@hughes.com',
             'principal_network_code' => '26002',
             'region' => 'New England'
            ],
            [
             'directorname' => 'Jason George',
             'directoremail' => 'jason@george.com',
             'principal_network_code' => '25997',
             'region' => 'Sydney'
            ],
            
        ];

        $this->db->table('Questionnaire')->insertBatch($data);
    }
} 