<?php
/**
 * @var \App\View\AppView $this
 * @var \Navigation\Model\Entity\NavigationTree $navigationTree
 * @var \Navigation\Model\Entity\NavigationItem[] $navigationItems
 */
?>
<nav class="actions large-3 medium-4 columns col-sm-4 col-xs-12" id="actions-sidebar">
    <ul class="side-nav nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Navigation Tree'), ['action' => 'edit', $navigationTree->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Navigation Tree'), ['action' => 'delete', $navigationTree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navigationTree->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Navigation Trees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Navigation Items'), ['controller' => 'NavigationItems', 'action' => 'index', '?' => ['navigation_tree_id' => $navigationTree->id]]) ?> </li>
    </ul>
</nav>
<div class="content action-view view large-9 medium-8 columns col-sm-8 col-xs-12">
    <h1><?= h($navigationTree->title) ?: h($navigationTree->key) ?></h1>
    <table class="table vertical-table">
        <tr>
            <th><?= __('Key') ?></th>
            <td><?= h($navigationTree->key) ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= h($navigationTree->class) ?></td>
        </tr>
        <tr>
            <th><?= __('Item Count') ?></th>
            <td><?= $this->Number->format($navigationTree->item_count) ?></td>
        </tr>
    </table>
    <div class="row">
        <h3><?= __('Params') ?></h3>
        <?= $this->Text->autoParagraph(h($navigationTree->params)); ?>
    </div>

    <div class="related">
		<h2>Tree</h2>
        <?php echo $this->Tree->generate($navigationItems, ['alias' => 'path']) ?>
    </div>
</div>
