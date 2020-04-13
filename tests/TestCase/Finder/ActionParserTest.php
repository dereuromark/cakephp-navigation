<?php

namespace Navigation\Test\TestCase\Finder;

use Cake\TestSuite\TestCase;
use Navigation\Finder\ActionParser;

class ActionParserTest extends TestCase {

	/**
	 * @var \Navigation\Finder\ActionParser
	 */
	protected $actionParser;

	/**
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->actionParser = new ActionParser();
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		unset($this->actionParser);

		parent::tearDown();
	}

	/**
	 * @return void
	 */
	public function testParse() {
		$path = ROOT . DS . 'tests/test_files/Controller/DemoCaseController.php';

		$result = $this->actionParser->parse($path);

		$expected = [
			'run',
			'coverage',
		];
		$this->assertSame($expected, $result);
	}

}
