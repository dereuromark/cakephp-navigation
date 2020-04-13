<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $navigationItem
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Navigation Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Navigation Trees'), ['controller' => 'NavigationTrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navigation Tree'), ['controller' => 'NavigationTrees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parent Navigation Items'), ['controller' => 'NavigationItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Navigation Item'), ['controller' => 'NavigationItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="content action-form form large-9 medium-8 columns col-sm-8 col-xs-12">
    <?= $this->Form->create($navigationItem) ?>
    <fieldset>
        <legend><?= __('Add Navigation Item') ?></legend>
        <?php
            echo $this->Form->control('navigation_tree_id', ['options' => $navigationTrees]);
            echo $this->Form->control('parent_id', ['options' => $parentNavigationItems, 'empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('prefix');
            echo $this->Form->control('plugin');
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
            echo $this->Form->control('pass');
            echo $this->Form->control('query');
            echo $this->Form->control('named');
            echo $this->Form->control('icon');
            echo $this->Form->control('params');
            echo $this->Form->control('rel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
