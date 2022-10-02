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
            'directorname' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'directoremail' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '120'
            ],
            'region' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '120'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('DirectorDetails');
    }


    public function down()
    {
        $this->forge->dropTable('DirectorDetails');
    }
}
