<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $navigationItem
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Navigation Item'), ['action' => 'edit', $navigationItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Navigation Item'), ['action' => 'delete', $navigationItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navigationItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Navigation Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Navigation Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Navigation Trees'), ['controller' => 'NavigationTrees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Navigation Tree'), ['controller' => 'NavigationTrees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Navigation Items'), ['controller' => 'NavigationItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Navigation Item'), ['controller' => 'NavigationItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="content action-view view large-9 medium-8 columns col-sm-8 col-xs-12">
    <h2><?= h($navigationItem->title) ?></h2>
    <table class="table vertical-table">
        <tr>
            <th><?= __('Navigation Tree') ?></th>
            <td><?= $navigationItem->has('navigation_tree') ? $this->Html->link($navigationItem->navigation_tree->title, ['controller' => 'NavigationTrees', 'action' => 'view', $navigationItem->navigation_tree->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Navigation Item') ?></th>
            <td><?= $navigationItem->has('parent_navigation_item') ? $this->Html->link($navigationItem->parent_navigation_item->title, ['controller' => 'NavigationItems', 'action' => 'view', $navigationItem->parent_navigation_item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($navigationItem->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($navigationItem->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Prefix') ?></th>
            <td><?= h($navigationItem->prefix) ?></td>
        </tr>
        <tr>
            <th><?= __('Plugin') ?></th>
            <td><?= h($navigationItem->plugin) ?></td>
        </tr>
        <tr>
            <th><?= __('Controller') ?></th>
            <td><?= h($navigationItem->controller) ?></td>
        </tr>
        <tr>
            <th><?= __('Action') ?></th>
            <td><?= h($navigationItem->action) ?></td>
        </tr>
        <tr>
            <th><?= __('Pass') ?></th>
            <td><?= h($navigationItem->pass) ?></td>
        </tr>
        <tr>
            <th><?= __('Query') ?></th>
            <td><?= h($navigationItem->query) ?></td>
        </tr>
        <tr>
            <th><?= __('Named') ?></th>
            <td><?= h($navigationItem->named) ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($navigationItem->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Rel') ?></th>
            <td><?= h($navigationItem->rel) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= $this->Time->nice($navigationItem->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= $this->Time->nice($navigationItem->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h3><?= __('Params') ?></h3>
        <?= $this->Text->autoParagraph(h($navigationItem->params)); ?>
    </div>

    <div class="related">
        <h3><?= __('Related Navigation Items') ?></h3>
        <?php if (!empty($navigationItem->child_navigation_items)): ?>
        <table class="table table-striped">
            <tr>
                                        <th><?= __('Navigation Tree Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Lft') ?></th>
                            <th><?= __('Rght') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Prefix') ?></th>
                            <th><?= __('Plugin') ?></th>
                            <th><?= __('Controller') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Pass') ?></th>
                            <th><?= __('Query') ?></th>
                            <th><?= __('Named') ?></th>
                            <th><?= __('Icon') ?></th>
                            <th><?= __('Params') ?></th>
                            <th><?= __('Rel') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($navigationItem->child_navigation_items as $childNavigationItems): ?>
            <tr>
                                                <td><?= h($childNavigationItems->navigation_tree_id) ?></td>
                                <td><?= h($childNavigationItems->parent_id) ?></td>
                                <td><?= h($childNavigationItems->lft) ?></td>
                                <td><?= h($childNavigationItems->rght) ?></td>
                                <td><?= h($childNavigationItems->title) ?></td>
                                <td><?= h($childNavigationItems->prefix) ?></td>
                                <td><?= h($childNavigationItems->plugin) ?></td>
                                <td><?= h($childNavigationItems->controller) ?></td>
                                <td><?= h($childNavigationItems->action) ?></td>
                                <td><?= h($childNavigationItems->pass) ?></td>
                                <td><?= h($childNavigationItems->query) ?></td>
                                <td><?= h($childNavigationItems->named) ?></td>
                                <td><?= h($childNavigationItems->icon) ?></td>
                                <td><?= h($childNavigationItems->params) ?></td>
                                <td><?= h($childNavigationItems->rel) ?></td>
                                <td><?= h($childNavigationItems->created) ?></td>
                                <td><?= h($childNavigationItems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Format->icon('view'), ['controller' => 'NavigationItems', 'action' => 'view', $childNavigationItems->id], ['escapeTitle' => false]); ?>
                    <?= $this->Html->link($this->Format->icon('edit'), ['controller' => 'NavigationItems', 'action' => 'edit', $childNavigationItems->id], ['escapeTitle' => false]); ?>
                    <?= $this->Form->postLink($this->Format->icon('delete'), ['controller' => 'NavigationItems', 'action' => 'delete', $childNavigationItems->id], ['escapeTitle' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $childNavigationItems->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
