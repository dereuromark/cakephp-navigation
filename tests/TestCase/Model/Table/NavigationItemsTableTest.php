<?php

namespace Navigation\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Navigation\Model\Entity\NavigationItem;
use Navigation\Model\Table\NavigationItemsTable;

class NavigationItemsTableTest extends TestCase {

	/**
	 * @var string[]
	 */
	public $fixtures = [
		'plugin.Navigation.NavigationItems',
		'plugin.Navigation.NavigationTrees',
	];

	/**
	 * @var \Navigation\Model\Table\NavigationItemsTable
	 */
	protected $NavigationItems;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::getTableLocator()->exists('NavigationItems') ? [] : ['className' => NavigationItemsTable::class];
		$this->NavigationItems = TableRegistry::getTableLocator()->get('NavigationItems', $config);
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		unset($this->NavigationItems);

		parent::tearDown();
	}

	/**
	 * @return void
	 */
	public function testFind() {
		$result = $this->NavigationItems->find()->first();
		$this->assertTrue(!empty($result));
		$this->assertInstanceOf(NavigationItem::class, $result);
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
