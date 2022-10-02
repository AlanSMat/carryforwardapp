<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DirectorDetails extends Migration
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
            'director_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'director_email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '120'
            ],
            'principal_network_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '8'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('director_information');
    }


    public function down()
    {
        $this->forge->dropTable('director_information');
    }
}
