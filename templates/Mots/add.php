<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mot $mot
 */
?>
<section class="content">
<div class="mots form col-lg-12">

    <?= $this->Form->create($mot) ?>
    <div class="box box-info col-lg-4 col-md-4">
      <div class="box-header with-border">
        <div class="col-lg-6">
        <h3 class="box-title"><?=__('Ajouter un Mot')?> </h3>
      </div>

      </div>
      <div class="box-body">
          <div class="col-offset-lg-2 col-offset-md-3">
                <div class="col-offset-lg-2">
                    <div class="btn-group-horizontal">
                        <?= $this->Html->link(__('Liste des Mots'), ['action' => 'index'],['class'=>'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Liste  des Categories'), ['controller' => 'Categories', 'action' => 'index'],['class'=>'btn bg-teal']) ?>
                        <?= $this->Html->link(__('Traduire des mots'), ['controller' => 'Traductions', 'action' => 'add'],['class'=>'btn bg-black']) ?>
                    </div>
                </div>
          </div>
          <br/>
          <br/>
          <br/>

          <div class="row-center col-lg-offset-1">
              <div class="col-lg-5 form-group">
                    <?= $this->Form->control('valeur',['class'=>'',"placeholder"=>"Mot",'label'=>'Mot'])?>
                <br/>
                <?php
                        echo $this->Form->control('code');
                        echo $this->Form->control('path',['type'=>'file']);
                        echo $this->Form->control('category_id', ['options' => $categories]); ?>
                <br/>
              </div>
              <div class="col-lg-5">
                  <?= $this->Form->control('plural',["class"=>"form-control"]);?>
                  <?=  $this->Form->control('definition',["class"=>"form-control"]);?>

                <div class="col-lg-6">
                <?= $this->Form->control('level_id', ['options' => $levels]);?>
                </div>

              </div>
          </div>
          <div class="col-lg-9 col-lg-offset-1">
                <br/>
                <br/>
                <?= $this->Form->button(__('Sauvegarder'),['class'=>'btn bg-olive btn-lg btn-block']) ?>
                <?= $this->Form->end() ?>
          </div>
      </div>
    </div>
</div>
</section>
