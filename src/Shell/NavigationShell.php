<?php

namespace Navigation\Shell;

use Cake\Console\Shell;
use Cake\Utility\Text;
use Navigation\Finder\Finder;

/**
 * @property \Navigation\Model\Table\NavigationTreesTable $NavigationTrees
 */
class NavigationShell extends Shell {

	/**
	 * @var string
	 */
	public $modelClass = 'Navigation.NavigationTrees';

	/**
	 * @param string|null $key
	 *
	 * @return void
	 */
	public function init($key = null) {
		$this->out('Initialize new Tree: ' . $key);
		$title = $key;
		$key = Text::slug($key);
		if ($this->NavigationTrees->find()->where(['key' => $key])->count()) {
			$this->abort('A tree with the key `' . $key . '` already exists.');
		}

		$items = $this->finder()->items($this->params);

		dd($items);
	}

	/**
	 * @return \Navigation\Finder\Finder
	 */
	protected function finder() {
		return new Finder();
	}

	/**
	 * Sync in new controllers/actions
	 *
	 * @return void
	 */
	public function sync() {
	}

	/**
	 * Get option parser method to parse commandline options
	 *
	 * @return \Cake\Console\ConsoleOptionParser
	 */
	public function getOptionParser() {
		$subcommandParser = [
			'options' => [
				'dry-run' => [
					'short' => 'd',
					'help' => 'Dry run the command.',
					'boolean' => true,
				],
				'prefix' => [
					'help' => 'Prefix(es), comma separated, defaults to none.',
					'default' => null,
				],
				'plugin' => [
					'short' => 'p',
					'help' => 'Plugin(s), comma separated, defaults to none. Include `app` if you want to run it along with the plugins, as well.',
					'default' => null,
				],
			],
		];

		$treeSpecificParser = $subcommandParser;
		$treeSpecificParser['arguments']['key'] = [
			'help' => 'Title/Key (unique identifier for this tree)',
			'required' => true,
		];

		return parent::getOptionParser()
			->setDescription('Handling navigation trees')
			->addSubcommand('init', [
				'help' => 'Init a tree',
				'parser' => $treeSpecificParser,
			])
			->addSubcommand('sync', [
				'help' => 'Sync new controllers/actions',
				'parser' => $treeSpecificParser,
			]);
	}

}
