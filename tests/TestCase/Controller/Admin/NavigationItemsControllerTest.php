<?php

namespace Navigation\Test\TestCase\Controller\Admin;

use Cake\TestSuite\IntegrationTestCase;

class NavigationItemsControllerTest extends IntegrationTestCase {

	/**
	 * @var string[]
	 */
	public $fixtures = [
		'plugin.Navigation.NavigationTrees',
		'plugin.Navigation.NavigationItems',
	];

	/**
	 * @return void
	 */
	public function testIndex() {
		$this->disableErrorHandlerMiddleware();

		$this->get(['prefix' => 'admin', 'plugin' => 'Navigation', 'controller' => 'NavigationItems', 'action' => 'index']);
		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}

	/**
	 * @return void
	 */
	public function testView() {
		$this->markTestIncomplete('Not implemented yet.');
	}

	/**
	 * @return void
	 */
	public function testAdd() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
