<?php

use Phinx\Migration\AbstractMigration;

class BookmarksMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('bookmarks');
        $table->addColumn('user_id','integer',[
               'null' => false, 
               ])
               ->addColumn('title','string',[
               'null' => false, 
               'limit' => 50, 
               ])
               ->addColumn('description','text')
               ->addColumn('url','text')
               ->addColumn('created','datetime',[
                'null' => true,
                ])
               ->addColumn('modified','datetime',[
                'null' => true,
                ])
               ->addIndex(['user_id'])
               ->addForeignKey('user_id', 'users', 'id');
               
        $table->create();
    }
}
