<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestInformation extends Migration 
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
            'principalrequestdetailsid' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'requestrank' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '2'
            ],
            'requesttitle' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '80'
            ],
            'fundsource' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'expenditurecategory' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '50'
            ],
            'requestreason' => [
                'type' => 'text',
                'null' => false
            ],
            'requestamount' => [
                'type' => 'int',
                'null' => false,
                'constraint' => '10'
            ],
            'status' => [
                'type' => 'varchar',
                'null' => false,
                'constraint' => '10',
                'default' => 'pending'
            ],
            'directorresponse' => [
                'type' => 'text',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('RequestInformation');
    }

    public function down() {
        $this->forge->dropTable('RequestInformation');
    }
}
