<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expression $expression
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Expression'), ['action' => 'edit', $expression->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Expression'), ['action' => 'delete', $expression->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expression->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Expressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Expression'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expressions view content">
            <h3><?= h($expression->texte) ?></h3>
            <table>
                <tr>
                    <th><?= __('Texte') ?></th>
                    <td><?= h($expression->texte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $expression->has('category') ? $this->Html->link($expression->category->name, ['controller' => 'Categories', 'action' => 'view', $expression->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $expression->has('level') ? $this->Html->link($expression->level->name, ['controller' => 'Levels', 'action' => 'view', $expression->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($expression->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($expression->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($expression->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
