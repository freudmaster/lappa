<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 * */
?>
<section class="content">
    <div class="box box-info">
        <div class="box box-header">
            <h1>
                <h3><?= __('Languages') ?></h3>
                <small>Liste des Langues enregistrés</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Langue</a></li>
                <li class="active">Liste</li>
            </ol>
            <div class="">
                <?= $this->Html->link('<i class="fa fa-plus"></i> Ajouter un mot',['controller'=>'Mots','action'=>'add'],['escape'=>false,'class'=>'btn btn-success']);?>
                <?= $this->Html->link('<i class="fa fa-edit"></i> Traduire des mots',['controller'=>'Traductions','action'=>'add'],['escape'=>false,'class'=>'btn btn-primary']);?>
                <?= $this->Html->link('<i class="fa fa-list"></i> Voir les Expressions',['controller'=>'Expressions','action'=>'index'],['escape'=>false,'class'=>'btn btn-warning']);?>
                <?= $this->Html->link('<i class="fa fa-list"></i>Voir les traductions',['controller'=>'Traductions','action'=>'index'],['escape'=>false,'class'=>'btn btn-danger']);?>
            </div>
            <br/>
        </div>

        <div class="box box-body">
            <?php $bgs=["bg-green","bg-light","bg-primary","bg-secondary","bg-purple","bg-yellow","bg-maroon","bg-teal","bg-gray"];?>
            <div class="table-responsive">

                <?php foreach ($languages as $language):
                    $percent_=round(count($language->traductions)/$traductions->count(),2)*100;
                    $percent_ex=round(count($language->expression_traduites)/$expressions->count(),2)*100;
                    shuffle($bgs);
                    ?>
                    <div class="col-lg-3 col-xs-6">
                        <div class="<?= 'small-box '.$bgs[0]?>">
                            <div class="inner">
                                <h3 class=""><b><?=$language->name?></b></h3>
                                <?= $this->element("language_progress",["percent"=>$percent_,"description"=>" de mots traduits en".$language->name])?>
                                <?= $this->element('language_progress',["percent"=>$percent_ex,"description"=>" d'expressions traduites en".$language->name])?>
                            </div>
                                <?= $this->Html->link('<i class="fa fa-eye"></i>Plus d\'informations',['controller'=>"Languages",'action'=>'view',$language->name],['escape'=>false,'class'=>"small-box-footer"])?>
                        </div>
                    </div>



                    <?php endforeach; ?>


    </div>

</div>




            </div>

</section>


<?php $this->start('scriptBottom'); ?>

<?php $this->end(); ?>

