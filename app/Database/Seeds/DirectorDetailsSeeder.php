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
             'schoolperformancedirectorate' => 'Rural North',
             'region' => 'Hunter/Central Coast'
            ],
            [
             'directorname' => 'Jennifer Hughes',
             'directoremail' => 'jennifer@hughes.com',
             'schoolperformancedirectorate' => 'Regional North',
             'region' => 'New England'
            ],
            [
             'directorname' => 'Jason George',
             'directoremail' => 'jason@george.com',
             'schoolperformancedirectorate' => 'Metropolitan South',
             'region' => 'Sydney'
            ],
            
        ];

        $this->db->table('Questionnaire')->insertBatch($data);
    }
} 