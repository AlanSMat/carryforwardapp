<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Schools extends Migration
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
            'schoolcode' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],            
            'schoolname' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '80'
            ],            
            'schoolshortname' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '80'
            ],            
            'postcode' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '4'
            ],
            'suburb' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '80'
            ],
            'schoolemail' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '120'
            ],
            'region' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'principalname' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'principalemail' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '80'
            ],
            'schoolplanningregion' => [
                'type' => 'varchar',
                'null' => true,
                'constraint' => '80'
            ],
            'schoolperformancedirectorate' => [
                'type' => 'varchar',
                'null' => true,
                'constraint' => '80'
            ],
            'primaryclustercode' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'primaryclusterregion' => [
                'type' => 'varchar',
                'null' => true,
                'constraint' => '80'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('Schools');
    }

    public function down()
    {
        $this->forge->dropTable('Schools');
    }
}
