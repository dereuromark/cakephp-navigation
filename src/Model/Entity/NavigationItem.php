<?php

namespace Navigation\Model\Entity;

use Cake\ORM\Entity;

/**
 * NavigationItem Entity
 *
 * @property int $id
 * @property int $navigation_tree_id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property string|null $title
 * @property string|null $prefix
 * @property string|null $plugin
 * @property string $controller
 * @property string $action
 * @property string|null $pass
 * @property string|null $query
 * @property string|null $named
 * @property string|null $icon
 * @property string|null $params
 * @property string|null $rel
 * @property bool $invisible
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property-read string $path
 *
 * @property \Navigation\Model\Entity\NavigationTree $navigation_tree
 * @property \Navigation\Model\Entity\NavigationItem $parent_navigation_item
 * @property \Navigation\Model\Entity\NavigationItem[] $child_navigation_items
 */
class NavigationItem extends Entity {

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * Note that when '*' is set to true, this allows all unspecified fields to
	 * be mass assigned. For security purposes, it is advised to set '*' to false
	 * (or remove it), and explicitly make individual fields accessible as needed.
	 *
	 * @var array
	 */
	protected $_accessible = [
		'*' => true,
		'id' => false,
	];

	/**
	 * @return string
	 */
	protected function _getPath(): string {
		$path = $this->controller . '::' . $this->action;
		if ($this->prefix) {
			$prefix = $this->prefix;
			$path = $prefix . '/' . $path;
		}

		if ($this->plugin) {
			$path = $this->plugin . '.' . $path;
		}

		return $path;
	}

}
