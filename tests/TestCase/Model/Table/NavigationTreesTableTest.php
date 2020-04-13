<?php

namespace Navigation\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Navigation\Model\Entity\NavigationTree;
use Navigation\Model\Table\NavigationTreesTable;

class NavigationTreesTableTest extends TestCase {

	/**
	 * @var string[]
	 */
	public $fixtures = [
		'plugin.Navigation.NavigationTrees',
		'plugin.Navigation.NavigationItems',
	];

	/**
	 * @var \Navigation\Model\Table\NavigationTreesTable
	 */
	protected $NavigationTrees;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::getTableLocator()->exists('NavigationTrees') ? [] : ['className' => NavigationTreesTable::class];
		$this->NavigationTrees = TableRegistry::getTableLocator()->get('NavigationTrees', $config);
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		unset($this->NavigationTrees);

		parent::tearDown();
	}

	/**
	 * @return void
	 */
	public function testFind() {
		$result = $this->NavigationTrees->find()->first();
		$this->assertTrue(!empty($result));
		$this->assertInstanceOf(NavigationTree::class, $result);
	}

	/**
	 * @return void
	 */
	public function testInitialize() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * @return void
	 */
	public function testValidationDefault() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * @return void
	 */
	public function testBuildRules() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
