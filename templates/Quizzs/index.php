<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quizz[]|\Cake\Collection\CollectionInterface $quizzs
 */
?>
<div class="quizzs index content">
    <?= $this->Html->link(__('New Quizz'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quizzs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nb_word') ?></th>
                    <th><?= $this->Paginator->sort('nb_expression') ?></th>
                    <th><?= $this->Paginator->sort('level_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzs as $quizz): ?>
                <tr>
                    <td><?= $this->Number->format($quizz->id) ?></td>
                    <td><?= $this->Number->format($quizz->nb_word) ?></td>
                    <td><?= $this->Number->format($quizz->nb_expression) ?></td>
                    <td><?= $quizz->has('level') ? $this->Html->link($quizz->level->name, ['controller' => 'Levels', 'action' => 'view', $quizz->level->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quizz->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quizz->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quizz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizz->id)]) ?>
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
