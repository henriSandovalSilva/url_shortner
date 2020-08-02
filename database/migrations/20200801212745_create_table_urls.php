<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableUrls extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('urls');
        $table->addColumn('hits', 'integer', ['default' => 0])
              ->addColumn('url', 'string')
              ->addColumn('short_url', 'string', ['null' => true])
              ->addColumn('user_id', 'integer', ['null' => true])
              ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->create();
    }
}
