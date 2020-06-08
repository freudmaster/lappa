<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mot $mot
 */
?>
<section class="content">
<div class="mots form large-6 medium-6 columns col-lg-9">

    <?= $this->Form->create($mot) ?>

    <div class="box box-info">
      <div class="box-header with-border">
        <div class="col-lg-6">
        <h3 class="box-title"><?=__('Edit Mot')?> </h3>
      </div>
        <div class="col-lg-offset-11">
        <?= $this->Form->postLink(
                  '<i class="fa fa-close "></i>',
                  ['action' => 'delete', $mot->id],
                  ['confirm' => __('Are you sure you want to delete # {0}?', $mot->id),'class'=>'btn btn-danger','escape'=>false]
              )
          ?>
        </div>
      </div>
      <div class="box-body">
        <div class="col-offset-lg-2">
        <div class="btn-group-horizontal">

                <?= $this->Html->link(__('List Mots'), ['action' => 'index'],['class'=>'btn btn-primary']) ?>
                <?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index'],['class'=>'btn bg-teal']) ?>
                <?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add,'],['class'=>'btn bg-olive']) ?>
                <?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index'],['class'=>'btn bg-orange']) ?>
                <?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add'],['class'=>'btn btn-danger']) ?>
              </div>
              </br>
                <div class="btn-group-horizontal">
               <?= $this->Html->link(__('List Traductions'), ['controller' => 'Traductions', 'action' => 'index'],['class'=>'btn bg-navy']) ?>
                <?= $this->Html->link(__('New Traduction'), ['controller' => 'Traductions', 'action' => 'add'],['class'=>'btn bg-black']) ?>
        </div>
      </div>
        <br/>
        <div class="input-group">
  <span class="input-group-addon">@</span>
          <?= $this->Form->control('valeur',['class'=>'form-control',"placeholder"=>"Valeur"])?>

        </div>
        <br>
        <?php
            echo $this->Form->control('code');
        ?>
      </br>
          <?php echo $this->Form->control('definition',["class"=>"form-control"]);?>
        <br>
        <div class="col-lg-6">
        <?php      echo $this->Form->control('category_id', ['options' => $categories],["class"=>"col-lg-3"]);
          ?>
        </div>
        <div class="col-lg-6">
      <?php echo $this->Form->control('level_id', ['options' => $levels]);?>
        </div>
    <?= $this->Form->button(__('Sauvegarder'),['class'=>'btn bg-olive btn-lg btn-block']) ?>
    <?= $this->Form->end() ?>
</div>
</section>
