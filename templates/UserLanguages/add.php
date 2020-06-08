<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLanguage $userLanguage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userLanguages form content">
            <?= $this->Form->create($userLanguage) ?>
            <fieldset>
                <legend><?= __('Add User Language') ?></legend>
                <?php
                    echo $this->Form->control('Language_id', ['options' => $languages]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
