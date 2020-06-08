<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLanguage[]|\Cake\Collection\CollectionInterface $userLanguages
 */
?>
<div class="userLanguages index content">
    <?= $this->Html->link(__('New User Language'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Languages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Language_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userLanguages as $userLanguage): ?>
                <tr>
                    <td><?= $this->Number->format($userLanguage->id) ?></td>
                    <td><?= $userLanguage->has('language') ? $this->Html->link($userLanguage->language->name, ['controller' => 'Languages', 'action' => 'view', $userLanguage->language->id]) : '' ?></td>
                    <td><?= $userLanguage->has('user') ? $this->Html->link($userLanguage->user->username, ['controller' => 'Users', 'action' => 'view', $userLanguage->user->id]) : '' ?></td>
                    <td><?= h($userLanguage->created) ?></td>
                    <td><?= h($userLanguage->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userLanguage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userLanguage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userLanguage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLanguage->id)]) ?>
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
