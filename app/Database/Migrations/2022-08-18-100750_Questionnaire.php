<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Questionnaire extends Migration 
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
            'sortorder' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '50'
            ],
            'question' => [
                'type' => 'Text',
                'null' => false
            ]
            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('Questionnaire');
    }

    public function down() {
        $this->forge->dropTable('Questionnaire');
    }
}