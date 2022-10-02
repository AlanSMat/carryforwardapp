<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrincipalQuestionnaireResponse extends Migration 
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
            'principalrequestdetailsid' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '10'
            ],
            'questionid' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '4'
            ],
            'responseYN' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '3'
            ],
            'principalcomments' => [
                'type' => 'text',
                'null' => true
            ],
            'directorcomments' => [
                'type' => 'text',
                'null' => true
            ]
            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('PrincipalQuestionnaireResponse');
    }

    public function down() {
        $this->forge->dropTable('PrincipalQuestionnaireResponse');
    }
}