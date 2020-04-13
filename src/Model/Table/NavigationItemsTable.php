<?php

namespace Navigation\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Navigation\Dto\ItemDto;
use Navigation\Model\Entity\NavigationItem;
use Navigation\Model\Entity\NavigationTree;

/**
 * NavigationItems Model
 *
 * @property \Navigation\Model\Table\NavigationTreesTable&\Cake\ORM\Association\BelongsTo $NavigationTrees
 * @property \Navigation\Model\Table\NavigationItemsTable&\Cake\ORM\Association\BelongsTo $ParentNavigationItems
 * @property \Navigation\Model\Table\NavigationItemsTable&\Cake\ORM\Association\HasMany $ChildNavigationItems
 *
 * @method \Navigation\Model\Entity\NavigationItem newEmptyEntity()
 * @method \Navigation\Model\Entity\NavigationItem newEntity($data = null, array $options = [])
 * @method \Navigation\Model\Entity\NavigationItem[] newEntities(array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationItem findOrCreate($search, callable $callback = null, $options = [])
 * @method \Navigation\Model\Entity\NavigationItem get($primaryKey, $options = [])
 * @method \Navigation\Model\Entity\NavigationItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationItem[] patchEntities($entities, array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Navigation\Model\Entity\NavigationItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Navigation\Model\Entity\NavigationItem[]|\Cake\Datasource\ResultSetInterface|false saveMany($entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class NavigationItemsTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('navigation_items');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');
		$this->addBehavior('Tree');
		$this->addBehavior('CounterCache', [
			'Navigation.NavigationTrees' => ['item_count'],
		]);

		$this->belongsTo('NavigationTrees', [
			'foreignKey' => 'navigation_tree_id',
			'joinType' => 'INNER',
			'className' => 'Navigation.NavigationTrees',
		]);
		$this->belongsTo('ParentNavigationItems', [
			'className' => 'Navigation.NavigationItems',
			'foreignKey' => 'parent_id',
		]);
		$this->hasMany('ChildNavigationItems', [
			'className' => 'Navigation.NavigationItems',
			'foreignKey' => 'parent_id',
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator
			->integer('id')
			->allowEmptyString('id', null, 'create');

		$validator
			->scalar('title')
			->maxLength('title', 100)
			->allowEmptyString('title');

		$validator
			->scalar('prefix')
			->maxLength('prefix', 100)
			->allowEmptyString('prefix');

		$validator
			->scalar('plugin')
			->maxLength('plugin', 100)
			->allowEmptyString('plugin');

		$validator
			->scalar('controller')
			->maxLength('controller', 100)
			->allowEmptyString('controller');

		$validator
			->scalar('action')
			->maxLength('action', 100)
			->allowEmptyString('action');

		$validator
			->scalar('pass')
			->maxLength('pass', 190)
			->allowEmptyString('pass');

		$validator
			->scalar('query')
			->maxLength('query', 190)
			->allowEmptyString('query');

		$validator
			->scalar('named')
			->maxLength('named', 190)
			->allowEmptyString('named');

		$validator
			->scalar('icon')
			->maxLength('icon', 100)
			->allowEmptyString('icon');

		$validator
			->scalar('params')
			->allowEmptyString('params');

		$validator
			->scalar('rel')
			->maxLength('rel', 100)
			->allowEmptyString('rel');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules) {
		//$rules->add($rules->existsIn(['navigation_tree_id'], 'NavigationTrees'));
		//$rules->add($rules->existsIn(['parent_id'], 'ParentNavigationItems'));
		return $rules;
	}

	/**
	 * @param \Navigation\Dto\ItemDto $item
	 * @param \Navigation\Model\Entity\NavigationTree $navigationTree
	 * @param \Navigation\Model\Entity\NavigationItem|null $parentItem
	 *
	 * @return \Navigation\Model\Entity\NavigationItem
	 */
	public function create(ItemDto $item, NavigationTree $navigationTree, ?NavigationItem $parentItem): NavigationItem {
		$data = [
			'plugin' => $item->getController()->getPlugin(),
			'prefix' => $item->getController()->getPrefix(),
			'controller' => $item->getController()->getName(),
			'action' => $item->getName(),
			'navigation_tree_id' => $navigationTree->id,
		];
		if ($parentItem) {
			$data['parent_id'] = $parentItem->id;
		}

		$navigationItem = $this->newEntity($data);

		return $this->saveOrFail($navigationItem);
	}

}
