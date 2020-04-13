<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $navigationTree
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $navigationTree->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $navigationTree->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Navigation Trees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Navigation Items'), ['controller' => 'NavigationItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navigation Item'), ['controller' => 'NavigationItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="content action-form form large-9 medium-8 columns col-sm-8 col-xs-12">
    <?= $this->Form->create($navigationTree) ?>
    <fieldset>
        <legend><?= __('Edit Navigation Tree') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('key');
            echo $this->Form->control('class');
            echo $this->Form->control('params');
            echo $this->Form->control('item_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
