<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolsInformation extends Migration

{
    public function up() 
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'school_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '6'
            ],
            'principal_network_code' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '6'
            ],
            'school_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'school_short_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'school_email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'postcode' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'suburb' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'region' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'phone1' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '18'
            ],
            'phone2' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '18'
            ],
            'principal_name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
            'principal_email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('schools_information');
        
    }

    public function down()
    {
        $this->forge->dropTable('schools_information');

    }
}
