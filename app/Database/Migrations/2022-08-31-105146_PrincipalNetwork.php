<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrincipalNetwork extends Migration
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
            'network_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'network_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '34'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('principal_network');
    }

    public function down()
    {
        $this->forge->dropTable('principal_network');
    }
}
