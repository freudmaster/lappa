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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $expressionTraduite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $expressionTraduite->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Expression Traduites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expressionTraduites form content">
            <?= $this->Form->create($expressionTraduite) ?>
            <fieldset>
                <legend><?= __('Edit Expression Traduite') ?></legend>
                <?php
                    echo $this->Form->control('Language_id', ['options' => $languages]);
                    echo $this->Form->control('expressions_id', ['options' => $expressions]);
                    echo $this->Form->control('traduction');
                    echo $this->Form->control('path');
                    echo $this->Form->control('plural');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
