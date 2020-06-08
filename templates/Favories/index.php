<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favory[]|\Cake\Collection\CollectionInterface $favories
 */
?>
<div class="favories index content">
    <?= $this->Html->link(__('New Favory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Favories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('mot_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('activate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favories as $favory): ?>
                <tr>
                    <td><?= $this->Number->format($favory->id) ?></td>
                    <td><?= $favory->has('user') ? $this->Html->link($favory->user->username, ['controller' => 'Users', 'action' => 'view', $favory->user->id]) : '' ?></td>
                    <td><?= $favory->has('mot') ? $this->Html->link($favory->mot->valeur, ['controller' => 'Mots', 'action' => 'view', $favory->mot->id]) : '' ?></td>
                    <td><?= h($favory->created) ?></td>
                    <td><?= h($favory->modified) ?></td>
                    <td><?= h($favory->activate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $favory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favory->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
