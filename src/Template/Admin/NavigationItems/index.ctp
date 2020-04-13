<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $navigationItems
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Navigation Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Navigation Trees'), ['controller' => 'NavigationTrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navigation Tree'), ['controller' => 'NavigationTrees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="content action-index index large-9 medium-8 columns col-sm-8 col-xs-12">
    <h2><?= __('Navigation Items') ?></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('navigation_tree_id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('prefix') ?></th>
                <th><?= $this->Paginator->sort('plugin') ?></th>
                <th><?= $this->Paginator->sort('controller') ?></th>
                <th><?= $this->Paginator->sort('action') ?></th>
                <th><?= $this->Paginator->sort('pass') ?></th>
                <th><?= $this->Paginator->sort('query') ?></th>
                <th><?= $this->Paginator->sort('named') ?></th>
                <th><?= $this->Paginator->sort('icon') ?></th>
                <th><?= $this->Paginator->sort('rel') ?></th>
                <th><?= $this->Paginator->sort('created', null, ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('modified', null, ['direction' => 'desc']) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($navigationItems as $navigationItem): ?>
            <tr>
                <td><?= $navigationItem->has('navigation_tree') ? $this->Html->link($navigationItem->navigation_tree->title, ['controller' => 'NavigationTrees', 'action' => 'view', $navigationItem->navigation_tree->id]) : '' ?></td>
                <td><?= $navigationItem->has('parent_navigation_item') ? $this->Html->link($navigationItem->parent_navigation_item->title, ['controller' => 'NavigationItems', 'action' => 'view', $navigationItem->parent_navigation_item->id]) : '' ?></td>
                <td><?= h($navigationItem->title) ?></td>
                <td><?= h($navigationItem->prefix) ?></td>
                <td><?= h($navigationItem->plugin) ?></td>
                <td><?= h($navigationItem->controller) ?></td>
                <td><?= h($navigationItem->action) ?></td>
                <td><?= h($navigationItem->pass) ?></td>
                <td><?= h($navigationItem->query) ?></td>
                <td><?= h($navigationItem->named) ?></td>
                <td><?= h($navigationItem->icon) ?></td>
                <td><?= h($navigationItem->rel) ?></td>
                <td><?= $this->Time->nice($navigationItem->created) ?></td>
                <td><?= $this->Time->nice($navigationItem->modified) ?></td>
                <td class="actions">
                <?= $this->Html->link($this->Format->icon('view'), ['action' => 'view', $navigationItem->id], ['escapeTitle' => false]); ?>
                <?= $this->Html->link($this->Format->icon('edit'), ['action' => 'edit', $navigationItem->id], ['escapeTitle' => false]); ?>
                <?= $this->Form->postLink($this->Format->icon('delete'), ['action' => 'delete', $navigationItem->id], ['escapeTitle' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $navigationItem->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $this->element('Tools.pagination'); ?>
</div>
