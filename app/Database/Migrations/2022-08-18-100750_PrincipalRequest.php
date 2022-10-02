<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrincipalRequest extends Migration 
{
    public function up() 
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'createdat' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'updatedat' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null
            ],
            'schools_information_id' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '8'
            ],
            'school_code' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '20'
            ],
            'school_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'principal_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'principal_email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'principal_network_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'is_questionnaire_completed' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ],
            'is_completed' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ],
            'del_sign_off' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('principal_request');
    }

    public function down() {
        $this->forge->dropTable('principal_request');
    }
}