<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'user_id'     => ['type' => 'INT'],
            'title'       => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description' => ['type' => 'TEXT'],
            'status'      => ['type' => 'INT'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
