<?php

use Phinx\Migration\AbstractMigration;

class BookmarksTagsMigration extends AbstractMigration
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
        $table = $this->table('bookmarks_tags',[
                'id' => false,
                'primary_key' => ['tag_id','bookmark_id'],
            ]);
        $table->addColumn('tag_id','integer',[
                'null'      => false,
            ])
            ->addColumn('bookmark_id','integer',[
                'null'      => false,
            ])
            ->addIndex(['tag_id'])
            ->addForeignKey('tag_id', 'tags', 'id')
            ->addIndex(['bookmark_id'])
            ->addForeignKey('bookmark_id', 'bookmarks', 'id')
            ;
        
        $table->create();

    }
}
