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
	public function up() {
		if ($this->hasTable('navigation_items')) {
			return;
		}

		$this->table('navigation_items')
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
			->addColumn('name', 'string', [
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
			->create();
	}

	/**
	 * @return void
	 */
	public function down() {
		$this->dropTable('database_logs');
	}

}
