<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 * @var \App\Model\Entity\Language[] $languages
 * @var \App\Model\Entity\Mot[] Mots
 *
 */
$traductions=[];
?>
<section class="content">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Traductions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="traductions form content">
                <?= $this->Form->create($traduction) ?>
                <fieldset>
                    <legend><?= __('Add Traduction') ?></legend>
                    <?php
                    echo $this->Form->control('language_id', ['options' => $languages]);
                    echo $this->Form->control('mot_id', ['options' => $Mots]);
                    echo $this->Form->control('traduction');
                    echo $this->Form->control('path_audio');
                    echo $this->Form->control('plural');
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('date_modified');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
