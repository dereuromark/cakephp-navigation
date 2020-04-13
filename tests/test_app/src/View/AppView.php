<?php

namespace TestApp\View;

use Cake\View\View;

/**
 * @property \Tools\View\Helper\TreeHelper $Tree
 */
class AppView extends View {

	/**
	 * @return void
	 */
	public function initialize() {
		parent::initialize();

		$this->loadHelper('Tools.Format');
		$this->loadHelper('Tools.Tree');
	}

}
