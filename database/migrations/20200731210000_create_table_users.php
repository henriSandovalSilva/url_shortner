<?php

use Phinx\Migration\AbstractMigration;

class CreateTableUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('id', 'integer')
              ->addColumn('name', 'string')
              ->create();
    }
}