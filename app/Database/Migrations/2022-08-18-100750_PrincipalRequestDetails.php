<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrincipalRequestDetails extends Migration 
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
            'schoolcode' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '20'
            ],
            'schoolname' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'principalname' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'principalemail' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'directorate' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '60'
            ],
            'isquestionnairecompleted' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ],
            'isCompleted' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ],
            'isApproved' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '1',
                'default' => 0
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('PrincipalRequestDetails');
    }

    public function down() {
        $this->forge->dropTable('PrincipalRequestDetails');
    }
}