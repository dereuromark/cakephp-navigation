<?php

namespace Navigation\Controller\Admin;

use App\Controller\AppController;

/**
 * @property \Navigation\Model\Table\NavigationTreesTable $NavigationTrees
 *
 * @method \Navigation\Model\Entity\NavigationTree[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NavigationController extends AppController {

	public $modelClass = 'Navigation.NavigationTrees';

	/**
	 * Dashboard
	 *
	 * @return \Cake\Http\Response|null|void
	 */
	public function index() {
		$navigationTrees = $this->NavigationTrees->find()
			->all()
			->toArray();

		$this->set(compact('navigationTrees'));
	}

}
