<?php

namespace Navigation\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NavigationTrees Model
 *
 * @property \Navigation\Model\Table\NavigationItemsTable&\Cake\ORM\Association\HasMany $NavigationItems
 *
 * @method \Navigation\Model\Entity\NavigationTree newEmptyEntity()
 * @method \Navigation\Model\Entity\NavigationTree newEntity($data = null, array $options = [])
 * @method \Navigation\Model\Entity\NavigationTree[] newEntities(array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationTree findOrCreate($search, callable $callback = null, $options = [])
 * @method \Navigation\Model\Entity\NavigationTree get($primaryKey, $options = [])
 * @method \Navigation\Model\Entity\NavigationTree patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationTree[] patchEntities($entities, array $data, array $options = [])
 * @method \Navigation\Model\Entity\NavigationTree|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Navigation\Model\Entity\NavigationTree saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Navigation\Model\Entity\NavigationTree[]|\Cake\Datasource\ResultSetInterface|false saveMany($entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NavigationTreesTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->setTable('navigation_trees');
		$this->setDisplayField('title');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->hasMany('NavigationItems', [
			'foreignKey' => 'navigation_tree_id',
			'className' => 'Navigation.NavigationItems',
			'dependent' => true,
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
			->maxLength('title', 190)
			->requirePresence('title', 'create')
			->notEmptyString('title');

		$validator
			->scalar('key')
			->maxLength('key', 100)
			->requirePresence('key', 'create')
			->notEmptyString('key')
			->add('key', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
			->scalar('class')
			->maxLength('class', 100)
			->allowEmptyString('class');

		$validator
			->scalar('params')
			->allowEmptyString('params');

		$validator
			->nonNegativeInteger('item_count')
			->notEmptyString('item_count');

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
		//$rules->add($rules->isUnique(['key']));
		return $rules;
	}

	/**
	 * @param string $key
	 * @param string|null $title
	 *
	 * @return \Navigation\Model\Entity\NavigationTree
	 */
	public function create(string $key, ?string $title) {
		$navigationTree = $this->newEntity(
			[
				'key' => $key,
				'title' => $title,
			]
		);

		return $this->saveOrFail($navigationTree);
	}

}
