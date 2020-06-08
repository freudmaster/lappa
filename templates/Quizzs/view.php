<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quizz $quizz
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quizz'), ['action' => 'edit', $quizz->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quizz'), ['action' => 'delete', $quizz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quizz->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quizzs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quizz'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quizzs view content">
            <h3><?= h($quizz->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $quizz->has('level') ? $this->Html->link($quizz->level->name, ['controller' => 'Levels', 'action' => 'view', $quizz->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quizz->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nb Word') ?></th>
                    <td><?= $this->Number->format($quizz->nb_word) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nb Expression') ?></th>
                    <td><?= $this->Number->format($quizz->nb_expression) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
