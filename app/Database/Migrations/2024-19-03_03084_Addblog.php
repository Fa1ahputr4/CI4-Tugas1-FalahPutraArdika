<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlog extends Migration
{
    protected $DBGroup = 'alternate_db_group';


    public function up()
    {
        
        $this->forge->addField([
            'blog_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_jdl' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'blog_desk' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('blog');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}