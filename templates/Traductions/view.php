<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Traduction'), ['action' => 'edit', $traduction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Traduction'), ['action' => 'delete', $traduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traduction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Traductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Traduction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="traductions view content">
            <h3><?= h($traduction->mots) ?></h3>
            <table>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= $traduction->has('language') ? $this->Html->link($traduction->language->name, ['controller' => 'Languages', 'action' => 'view', $traduction->language->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mot') ?></th>
                    <td><?= $traduction->has('mot') ? $this->Html->link($traduction->mot->valeur, ['controller' => 'Mots', 'action' => 'view', $traduction->mot->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Traduction') ?></th>
                    <td><?= h($traduction->traduction) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path Audio') ?></th>
                    <td><?= h($traduction->path_audio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plural') ?></th>
                    <td><?= h($traduction->plural) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($traduction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($traduction->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Modified') ?></th>
                    <td><?= h($traduction->date_modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
