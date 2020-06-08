<?php
?>
<div class="traductions index content">
    <?= $this->Html->link(__('New Traduction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Traductions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('language_id') ?></th>
                <th><?= $this->Paginator->sort('mot_id') ?></th>
                <th><?= $this->Paginator->sort('traduction') ?></th>
                <th><?= $this->Paginator->sort('path_audio') ?></th>
                <th><?= $this->Paginator->sort('plural') ?></th>
                <th><?= $this->Paginator->sort('date_created') ?></th>
                <th><?= $this->Paginator->sort('date_modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($traductions as $traduction): ?>
                <tr>
                    <td><?= $this->Number->format($traduction->id) ?></td>
                    <td><?= $traduction->has('language') ? $this->Html->link($traduction->language->name, ['controller' => 'Languages', 'action' => 'view', $traduction->language->id]) : '' ?></td>
                    <td><?= $traduction->has('mot') ? $this->Html->link($traduction->mot->valeur, ['controller' => 'Mots', 'action' => 'view', $traduction->mot->id]) : '' ?></td>
                    <td><?= h($traduction->traduction) ?></td>
                    <td><?= h($traduction->path_audio) ?></td>
                    <td><?= h($traduction->plural) ?></td>
                    <td><?= h($traduction->date_created) ?></td>
                    <td><?= h($traduction->date_modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $traduction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $traduction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $traduction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traduction->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
