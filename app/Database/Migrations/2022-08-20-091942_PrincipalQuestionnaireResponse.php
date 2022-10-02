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
            'principal_request_id' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '10'
            ],
            'sortorder' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '2',
                'default' => 0
            ],
            'question_id' => [
                'type' => 'INT',
                'null' => false,
                'constraint' => '2',
                'default' => 0
            ],
            'responseYN' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => '3'
            ],
            'principal_comments' => [
                'type' => 'text',
                'null' => true
            ],
            'director_comments' => [
                'type' => 'text',
                'null' => true
            ]
            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('principal_questionnaire_response');
    }

    public function down() {
        $this->forge->dropTable('principal_questionnaire_response');
    }
}