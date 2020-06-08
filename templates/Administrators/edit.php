<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $administrator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Administrators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="administrators form content">
            <?= $this->Form->create($administrator) ?>
            <fieldset>
                <legend><?= __('Edit Administrator') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('picture');
                    echo $this->Form->control('slug_name');
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('date_modified');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
