<?php

namespace Navigation\Controller\Admin;

use App\Controller\AppController;

/**
 * @property \Navigation\Model\Table\NavigationTreesTable $NavigationTrees
 *
 * @method \Navigation\Model\Entity\NavigationTree[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NavigationTreesController extends AppController {

	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void
	 */
	public function index() {
		$navigationTrees = $this->paginate();

		$this->set(compact('navigationTrees'));
	}

	/**
	 * View method
	 *
	 * @param int|string|null $id Navigation Tree id.
	 * @return \Cake\Http\Response|null|void
	 */
	public function view($id = null) {
		$navigationTree = $this->NavigationTrees->get($id, [
		]);
		$navigationItems = $this->NavigationTrees->NavigationItems->find('threaded')->toArray();

		$this->set(compact('navigationTree', 'navigationItems'));
		$this->viewBuilder()->setHelpers(['Tools.Tree']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$navigationTree = $this->NavigationTrees->newEntity();
		if ($this->request->is('post')) {
			$navigationTree = $this->NavigationTrees->patchEntity($navigationTree, $this->request->getData());
			if ($this->NavigationTrees->save($navigationTree)) {
				$this->Flash->success(__('The navigation tree has been saved.'));

				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('The navigation tree could not be saved. Please, try again.'));
		}

		$this->set(compact('navigationTree'));
	}

	/**
	 * Edit method
	 *
	 * @param int|string|null $id Navigation Tree id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 */
	public function edit($id = null) {
		$navigationTree = $this->NavigationTrees->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$navigationTree = $this->NavigationTrees->patchEntity($navigationTree, $this->request->getData());
			if ($this->NavigationTrees->save($navigationTree)) {
				$this->Flash->success(__('The navigation tree has been saved.'));

				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('The navigation tree could not be saved. Please, try again.'));
		}

		$this->set(compact('navigationTree'));
	}

	/**
	 * Delete method
	 *
	 * @param int|string|null $id Navigation Tree id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$navigationTree = $this->NavigationTrees->get($id);
		if ($this->NavigationTrees->delete($navigationTree)) {
			$this->Flash->success(__('The navigation tree has been deleted.'));
		} else {
			$this->Flash->error(__('The navigation tree could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}
