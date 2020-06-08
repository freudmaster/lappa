<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExpressionTraduite[]|\Cake\Collection\CollectionInterface $expressionTraduites
 */
?>
<div class="expressionTraduites index content">
    <?= $this->Html->link(__('New Expression Traduite'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Expression Traduites') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Language_id') ?></th>
                    <th><?= $this->Paginator->sort('expressions_id') ?></th>
                    <th><?= $this->Paginator->sort('traduction') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expressionTraduites as $expressionTraduite): ?>
                <tr>
                    <td><?= $this->Number->format($expressionTraduite->id) ?></td>
                    <td><?= $expressionTraduite->has('language') ? $this->Html->link($expressionTraduite->language->name, ['controller' => 'Languages', 'action' => 'view', $expressionTraduite->language->id]) : '' ?></td>
                    <td><?= $expressionTraduite->has('expression') ? $this->Html->link($expressionTraduite->expression->texte, ['controller' => 'Expressions', 'action' => 'view', $expressionTraduite->expression->id]) : '' ?></td>
                    <td><?= h($expressionTraduite->traduction) ?></td>
                    <td><?= h($expressionTraduite->path) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $expressionTraduite->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expressionTraduite->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expressionTraduite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expressionTraduite->id)]) ?>
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
