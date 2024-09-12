<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT', 
                 'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'title' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'description' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'status' => [
                'type' => 'INT'
            ],
            'due_date' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'created_at' => [
                'type' => 'DATETIME', 
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME', 
                'null' => true
            ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('tasks');
    }

    public function down()
    {
        // $this->forge->dropTable('tasks');
    }
}
