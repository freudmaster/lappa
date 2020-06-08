<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator[]|\Cake\Collection\CollectionInterface $administrators
 */
?>
<div class="administrators index content">
    <?= $this->Html->link(__('New Administrator'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Administrators') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('picture') ?></th>
                    <th><?= $this->Paginator->sort('slug_name') ?></th>
                    <th><?= $this->Paginator->sort('date_created') ?></th>
                    <th><?= $this->Paginator->sort('date_modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrators as $administrator): ?>
                <tr>
                    <td><?= $this->Number->format($administrator->id) ?></td>
                    <td><?= h($administrator->username) ?></td>
                    <td><?= h($administrator->password) ?></td>
                    <td><?= h($administrator->firstname) ?></td>
                    <td><?= h($administrator->lastname) ?></td>
                    <td><?= h($administrator->picture) ?></td>
                    <td><?= h($administrator->slug_name) ?></td>
                    <td><?= h($administrator->date_created) ?></td>
                    <td><?= h($administrator->date_modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $administrator->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrator->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?>
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
