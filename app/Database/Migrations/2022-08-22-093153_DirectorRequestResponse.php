<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DirectorRequestResponse extends Migration 
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
            'directordetailsid' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],            
            'principalrequestdetailsid' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],            
            'principalrequestid' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],            
            'requestrank' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '2'
            ],
            'endorsement' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '20'
            ],
            'comments' => [
                'type' => 'text',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('DirectorRequestResponse');
    }

    public function down() {
        $this->forge->dropTable('DirectorRequestResponse');
    }
}
