<?php

namespace Navigation\Controller\Admin;

use App\Controller\AppController;

/**
 * @property \Navigation\Model\Table\NavigationItemsTable $NavigationItems
 *
 * @method \Navigation\Model\Entity\NavigationItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NavigationItemsController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void
	 */
	public function index() {
		$this->paginate = [
			'contain' => ['NavigationTrees', 'ParentNavigationItems'],
		];
		$navigationItems = $this->paginate();

		$this->set(compact('navigationItems'));
	}

	/**
	 * View method
	 *
	 * @param int|string|null $id Navigation Item id.
	 * @return \Cake\Http\Response|null|void
	 */
	public function view($id = null) {
		$navigationItem = $this->NavigationItems->get($id, [
			'contain' => ['NavigationTrees', 'ParentNavigationItems', 'ChildNavigationItems'],
		]);

		$this->set(compact('navigationItem'));
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$navigationItem = $this->NavigationItems->newEntity();
		if ($this->request->is('post')) {
			$navigationItem = $this->NavigationItems->patchEntity($navigationItem, $this->request->getData());
			if ($this->NavigationItems->save($navigationItem)) {
				$this->Flash->success(__('The navigation item has been saved.'));

				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('The navigation item could not be saved. Please, try again.'));
		}
		$navigationTrees = $this->NavigationItems->NavigationTrees->find('list', ['limit' => 1000]);
		$parentNavigationItems = $this->NavigationItems->ParentNavigationItems->find('list', ['limit' => 1000]);

		$this->set(compact('navigationItem', 'navigationTrees', 'parentNavigationItems'));
	}

	/**
	 * Edit method
	 *
	 * @param int|string|null $id Navigation Item id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 */
	public function edit($id = null) {
		$navigationItem = $this->NavigationItems->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$navigationItem = $this->NavigationItems->patchEntity($navigationItem, $this->request->getData());
			if ($this->NavigationItems->save($navigationItem)) {
				$this->Flash->success(__('The navigation item has been saved.'));

				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('The navigation item could not be saved. Please, try again.'));
		}
		$navigationTrees = $this->NavigationItems->NavigationTrees->find('list', ['limit' => 1000]);
		$parentNavigationItems = $this->NavigationItems->ParentNavigationItems->find('list', ['limit' => 1000]);

		$this->set(compact('navigationItem', 'navigationTrees', 'parentNavigationItems'));
	}

	/**
	 * Delete method
	 *
	 * @param int|string|null $id Navigation Item id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$navigationItem = $this->NavigationItems->get($id);
		if ($this->NavigationItems->delete($navigationItem)) {
			$this->Flash->success(__('The navigation item has been deleted.'));
		} else {
			$this->Flash->error(__('The navigation item could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}
