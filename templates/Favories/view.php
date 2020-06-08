<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favory $favory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Favory'), ['action' => 'edit', $favory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Favory'), ['action' => 'delete', $favory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Favories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Favory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favories view content">
            <h3><?= h($favory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $favory->has('user') ? $this->Html->link($favory->user->username, ['controller' => 'Users', 'action' => 'view', $favory->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mot') ?></th>
                    <td><?= $favory->has('mot') ? $this->Html->link($favory->mot->valeur, ['controller' => 'Mots', 'action' => 'view', $favory->mot->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($favory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($favory->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($favory->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activate') ?></th>
                    <td><?= $favory->activate ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
