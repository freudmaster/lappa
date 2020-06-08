<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favory $favory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Favories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favories form content">
            <?= $this->Form->create($favory) ?>
            <fieldset>
                <legend><?= __('Add Favory') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('mot_id', ['options' => $mots]);
                    echo $this->Form->control('activate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
