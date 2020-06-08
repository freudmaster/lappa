<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction $traduction
 *  @var \App\Model\Entity\Expression $expression
 * @var \App\Model\Entity\Language[] $languages
 * @var \App\Model\Entity\Mot[] mots
 */
?>
<?php echo $this->Html->css("/bower_components/materialize/dist/css/materialize");?>

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">

                <h2 class="box-title"><?=__('Traduire des mots & Expressions')?> </h2>
            <br/>
            <br/>
            <br/>
            <div class="">
                        <div class="btn-group" role="group">
                            <?= $this->Form->button(__('List Mots'), ['action' => 'index','class'=>'btn btn-primary']) ?>
                            <?= $this->Form->button(__('List Categories'), ['controller' => 'Categories', 'action' => 'index','class'=>'btn bg-teal']) ?>
                            <?= $this->Form->button(__('New Category'), ['controller' => 'Categories', 'action' => 'add','class'=>'btn bg-olive']) ?>
                            <?= $this->Form->button(__('List Levels'),['controller' => 'Levels', 'action' => 'index','class'=>'btn bg-orange']) ?>
                            <?= $this->Form->button(__('New Level'), ['controller' => 'Levels', 'action' => 'add','class'=>'btn btn-danger']) ?>
                            <?= $this->Form->button(__('List Traductions'),['controller' => 'Traductions', 'action' => 'index','class'=>'btn bg-navy']) ?>
                            <?= $this->Form->button(__('Translate'),['controller' => 'Traductions', 'action' => 'translate','class'=>'btn bg-black']) ?>
                        </div>
                </div>

        </div>
        <br/>
        <div class="box-body">
        <br/>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active in" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Traduire Mots</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Traduire Expressions</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  active in row justify-content-center center-block" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-offset-2 content ">
                    <br/>
                    <br/>
                    <?= $this->Form->create($traduction) ?>
                    <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('mot_id', ['options' => $mots]);?>
                    </div>
                    <div class="col-md-6">
                        <?=  $this->Form->control('language_id', ['options' => $languages]);?>
                    </div>
                    </div>
                            <?php
                            echo $this->Form->control('traduction');
                        echo $this->Form->control('plural',['label'=>'Pluriel']);
                        ?>
                    <?= $this->Form->button(__('Ajouter la traduction'),['class'=>'btn bg-olive btn-lg btn-block']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="tab-pane fade row" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="content">
                    <?= $this->Form->create($expression) ?>
                    <?= $this->Form->control('expression_id', ['options' => $expressions]);?>
                    <?=  $this->Form->control('language_id', ['options' => $languages]);?>
                    <?php
                    echo $this->Form->control('traduction');
                    echo $this->Form->control('plural');
                    ?>
                    <?= $this->Form->button(__('Ajouter la traduction'),['class'=>'btn bg-olive btn-lg btn-block']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script("/bower_components/materialize/dist/js/materialize");?>

<?php $this->start('scriptBottom'); ?>
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('input.input_text, textarea.textarea2').characterCounter();
        $('#myTab a[href="#home"]').tab('show');
    });

</script>
<?php $this->end(); ?>
