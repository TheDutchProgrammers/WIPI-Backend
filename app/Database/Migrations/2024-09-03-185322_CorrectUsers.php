<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CorrectUsers extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('users', ['name', 'email', 'password']);
        $this->forge->addColumn('users', [
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'id'
            ],
            'unique_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'user_name'
            ]
        ]);
        $this->forge->addUniqueKey('unique_name');
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['user_name', 'unique_name']);
        $this->forge->addColumn('users', [
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
    }
}
