<?php
use Migrations\AbstractMigration;

/**
 * Add this for PostgreSQL via:
 * bin/cake migrations migrate -p Navigation
 *
 * It uses the default database collation and encoding (utf8 or utf8mb4 etc).
 */
class InitNavigation extends AbstractMigration {

	/**
	 * @return void
	 */
	public function change() {
		if ($this->hasTable('navigation_trees')) {
			return;
		}

		$this->table('navigation_trees')
			->addColumn('title', 'string', [
				'null' => false,
				'limit' => 190,
			])
			->addColumn('key', 'string', [
				'null' => false,
				'limit' => 100,
			])
			->addColumn('class', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('params', 'text', [
				'default' => null,
				'null' => true,
			])
			->addColumn('created', 'datetime', [
				'default' => null,
				'null' => true,
			])
			->addColumn('modified', 'datetime', [
				'default' => null,
				'null' => true,
			])
			->addColumn('item_count', 'integer', [
				'default' => 0,
				'limit' => 10,
				'null' => false,
				'signed' => false,
			])
			->addColumn('params', 'text', [
				'default' => null,
				'null' => true,
			])
			->addIndex([
					'key',
				], [
					'unique' => true,
				]
			)
			->create();

		$this->table('navigation_items')
			->addColumn('navigation_tree_id', 'integer', [
				'default' => null,
				'limit' => 10,
				'null' => false,
				'signed' => false,
			])
			->addColumn('parent_id', 'integer', [
				'default' => null,
				'limit' => 10,
				'null' => true,
				'signed' => false,
			])
			->addColumn('lft', 'integer', [
				'default' => null,
				'limit' => 10,
				'null' => true,
				'signed' => false,
			])
			->addColumn('rght', 'integer', [
				'default' => null,
				'limit' => 10,
				'null' => true,
				'signed' => false,
			])
			->addColumn('rght', 'integer', [
				'default' => null,
				'limit' => 10,
				'null' => true,
				'signed' => false,
			])
			->addColumn('title', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('prefix', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('plugin', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('controller', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('action', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('query', 'string', [
				'default' => null,
				'limit' => 190,
				'null' => true,
			])
			->addColumn('icon', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('params', 'text', [
				'default' => null,
				'null' => true,
			])
			->addColumn('rel', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('created', 'datetime', [
				'default' => null,
				'null' => true,
			])
			->addColumn('modified', 'datetime', [
				'default' => null,
				'null' => true,
			])
			->create();
	}

}
