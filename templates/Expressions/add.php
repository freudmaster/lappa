<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expression $expression
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Expressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expressions form content">
            <?= $this->Form->create($expression) ?>
            <fieldset>
                <legend><?= __('Add Expression') ?></legend>
                <?php
                    echo $this->Form->control('texte');
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('level_id', ['options' => $levels]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
