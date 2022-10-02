<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestInformation extends Migration 
{
    public function up() 
    {
        $this->forge->addField([

            'id' => [
                'type' => 'int',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],            
            'principal_request_id' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'schools_information_id' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'principal_network_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'request_rank' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '2'
            ],
            'request_title' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '80'
            ],
            'fund_source' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'expenditure_category' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'request_reason' => [
                'type' => 'text',
                'null' => false
            ],
            'request_amount' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'status' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '10',
                'default' => 'pending'
            ],
            'director_response' => [
                'type' => 'text',
                'null' => true
            ],
            'director_processed' => [
                'type' => 'int',
                'null' => false,
                'default' => 0,
                'constraint' => '1',
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('request_information');
    }

    public function down() {
        $this->forge->dropTable('request_information');
    }
}
