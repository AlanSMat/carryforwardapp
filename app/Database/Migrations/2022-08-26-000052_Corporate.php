<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Corporate extends Migration
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
            'corporatename' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '50'
            ],
            'corporateemail' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '80'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('corporatedetails');
    }

    public function down()
    {
        //
    }
}
