<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $navigationTrees
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Navigation Tree'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Navigation Items'), ['controller' => 'NavigationItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navigation Item'), ['controller' => 'NavigationItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="content action-index index large-9 medium-8 columns col-sm-8 col-xs-12">
    <h2><?= __('Navigation Trees') ?></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('key') ?></th>
                <th><?= $this->Paginator->sort('class') ?></th>
                <th><?= $this->Paginator->sort('created', null, ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('modified', null, ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('item_count') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($navigationTrees as $navigationTree): ?>
            <tr>
                <td><?= h($navigationTree->title) ?></td>
                <td><?= h($navigationTree->key) ?></td>
                <td><?= h($navigationTree->class) ?></td>
                <td><?= $this->Time->nice($navigationTree->created) ?></td>
                <td><?= $this->Time->nice($navigationTree->modified) ?></td>
                <td><?= $this->Number->format($navigationTree->item_count) ?></td>
                <td class="actions">
                <?= $this->Html->link($this->Format->icon('view'), ['action' => 'view', $navigationTree->id], ['escapeTitle' => false]); ?>
                <?= $this->Html->link($this->Format->icon('edit'), ['action' => 'edit', $navigationTree->id], ['escapeTitle' => false]); ?>
                <?= $this->Form->postLink($this->Format->icon('delete'), ['action' => 'delete', $navigationTree->id], ['escapeTitle' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $navigationTree->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $this->element('Tools.pagination'); ?>
</div>
