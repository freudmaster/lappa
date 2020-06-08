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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quizz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quizz->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quizzs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quizzs form content">
            <?= $this->Form->create($quizz) ?>
            <fieldset>
                <legend><?= __('Edit Quizz') ?></legend>
                <?php
                    echo $this->Form->control('nb_word');
                    echo $this->Form->control('nb_expression');
                    echo $this->Form->control('level_id', ['options' => $levels]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
