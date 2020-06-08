<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mot[]|\Cake\Collection\CollectionInterface $mots
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $langues
 * */

?>

<section class="content">
    <div class="box box-info">
        <div class="box box-header">
        <h1>
            Mots
            <small>Liste des Mots enregistrés</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Mots</a></li>
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
        <div class="box box-body white">
                <div class="table-responsive white">
                    <table id="tableau" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mot</th>
                            <th>Description</th>
                            <th>Dificulté</th>
                            <th>Categorie</th>
                            <th>Progression de traduction</th>
                            <th>Dernière modification</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($mots as $mot): ?>
                            <tr>
                                <td><?= $mot->id;?></td>
                                <td><?= $mot->valeur;?></td>
                                <td><?=$mot->description?></td>
                                <td><span class="label label-success"><?=$mot->level->name?></span></td>
                                <td><span class="label label-primary"><?=$mot->category->name?></span></td>
                                <td>
                                    <div>
                                        <?php $percent_=round(count($mot->traductions)/$langues->count(),2)*100;?>
                                        <span class='badge <?=$percent_<25?"bg-red":($percent_<50?"bg-yellow":($percent_<75?"bg-blue":"bg-green"));?>'><?=(int)$percent_?>%</span>
                                        <div class="progress sm">
                                            <div class='<?=$percent_<25?" progress-bar progress-bar-red":($percent_<50?" progress-bar progress-bar-yellow":($percent_<75?" progress-bar progress-bar-blue":" progress-bar progress-bar-green"));?>'' style=<?= $this->Html->style(['width' => $percent_.'%']);?>
                                        </div>
                                    </div>
                                </td>
                                <td><?=$mot->modified->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::NONE]);?></td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <?= $this->Html->link('<i class="fa fa-edit"></i>Modifier',['controller'=>"Mots",'action'=>'edit',$mot->id],['escape'=>false,'class'=>"btn btn-sm btn-default"])?>
                                        <?= $this->Html->link('<i class="fa fa-eye"></i>Voir',['controller'=>"Mots",'action'=>'view',$mot->id],['escape'=>false,'class'=>"btn btn-sm btn-default"])?>
                                        <?= $this->Form->postLink("<i class='fa fa-close'></i>Supprimer", ['action' => 'delete', $mot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mot->id),'escape'=>false,'class'=>'btn btn-sm btn-default btn-cancel']) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</section>

<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4'); ?>

<?php $this->start('scriptBottom'); ?>
<script>
    $(document).ready(function() {
        $('#tableau').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : true
        });
    });
</script>
<?php $this->end(); ?>

