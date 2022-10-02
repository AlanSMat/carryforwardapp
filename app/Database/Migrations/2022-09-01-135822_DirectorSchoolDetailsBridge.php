<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DirectorSchoolDetailsBridge extends Migration 
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
            'director_information_id' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '6'
            ],
            'schools_information_id' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '6'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('director_schools_information_bridge');
    }

    public function down() {
        $this->forge->dropTable('director_schools_information_bridge');
    }
}