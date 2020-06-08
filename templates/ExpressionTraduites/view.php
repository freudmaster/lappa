<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExpressionTraduite $expressionTraduite
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Expression Traduite'), ['action' => 'edit', $expressionTraduite->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Expression Traduite'), ['action' => 'delete', $expressionTraduite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expressionTraduite->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Expression Traduites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Expression Traduite'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expressionTraduites view content">
            <h3><?= h($expressionTraduite->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Language') ?></th>
                    <td><?= $expressionTraduite->has('language') ? $this->Html->link($expressionTraduite->language->name, ['controller' => 'Languages', 'action' => 'view', $expressionTraduite->language->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Expression') ?></th>
                    <td><?= $expressionTraduite->has('expression') ? $this->Html->link($expressionTraduite->expression->texte, ['controller' => 'Expressions', 'action' => 'view', $expressionTraduite->expression->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Traduction') ?></th>
                    <td><?= h($expressionTraduite->traduction) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($expressionTraduite->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($expressionTraduite->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Plural') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($expressionTraduite->plural)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
