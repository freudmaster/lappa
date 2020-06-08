<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expression[]|\Cake\Collection\CollectionInterface $expressions
 */
?>
<section class="content">
    <div class="box box-info">
        <div class="box box-header">
            <h1>
                Expressions
                <small>Liste des Expressions enregistrés</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Expressions</a></li>
                <li class="active">Liste</li>
            </ol>
            <div class="">
                <?= $this->Html->link('<i class="fa fa-plus"></i> Ajouter une expression',['controller'=>'Expressions','action'=>'add'],['escape'=>false,'class'=>'btn btn-success']);?>
                <?= $this->Html->link('<i class="fa fa-edit"></i> Traduire des Expressions',['controller'=>'ExpressionTraduites','action'=>'add'],['escape'=>false,'class'=>'btn btn-primary']);?>
                <?= $this->Html->link('<i class="fa fa-list"></i> Voir les mots',['controller'=>'Mots','action'=>'index'],['escape'=>false,'class'=>'btn btn-warning']);?>
                <?= $this->Html->link('<i class="fa fa-list"></i>Voir les traductions',['controller'=>'Traductions','action'=>'index'],['escape'=>false,'class'=>'btn btn-danger']);?>
            </div>
            <br/>
        </div>
        <div class="box box-body">
            <div class="table-responsive">
                <table id="tableau" class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><?=$this->Paginator->sort('id');?></th>
                        <th scope="col"><?=$this->Paginator->sort('texte','Texte')?></th>
                        <th><?= $this->Paginator->sort('category_id') ?></th>
                        <th><?= $this->Paginator->sort('level_id') ?></th>
                        <th scope="col">progression de traduction</th>
                        <th scope="col"><?=$this->Paginator->sort('modified','Derniere modification')?></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($expressions as $expression): ?>
                        <tr>
                            <td><?= $expression->id;?></td>
                            <td><?= $expression->texte;?></td>
                            <td><?=$expression->category->name?></td>
                            <td><span class="label label-success"><?=$expression->level->name?></span></td>
                            <td>
                                <div>
                                    <?php $percent_=round(count($expression->expression_traduites)/$langues->count(),2)*100;?>
                                    <span class='badge <?=$percent_<25?"bg-red":($percent_<50?"bg-yellow":($percent_<75?"bg-blue":"bg-green"));?>'><?=(int)$percent_?>%</span>
                                    <div class="progress sm">
                                        <div class='<?=$percent_<25?" progress-bar progress-bar-red":($percent_<50?" progress-bar progress-bar-yellow":($percent_<75?" progress-bar progress-bar-blue":" progress-bar progress-bar-green"));?>'' style=<?= $this->Html->style(['width' => $percent_.'%']);?>
                                    </div>
                                </div>
                            </td>
                            <td><?=$expression->modified->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::NONE]);?></td>
                            <td>
                                <div class="btn-group-horizontal">
                                    <?= $this->Html->link('<i class="fa fa-edit"></i>Modifier',['controller'=>"Expressions",'action'=>'edit',$expression->id],['escape'=>false,'class'=>"btn btn-sm"])?>
                                    <?= $this->Html->link('<i class="fa fa-eye"></i>Voir',['controller'=>"Expressions",'action'=>'view',$expression->id],['escape'=>false,'class'=>"btn btn-sm"])?>
                                    <?= $this->Form->postLink("<i class='fa fa-close'></i>Supprimer", ['action' => 'delete', $expression->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expression->id),'escape'=>false,'class'=>'btn btn-sm btn-cancel']) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body --><!-- /.box -->
        </div>
    </div>
</section>
<?php echo $this->Html->script('./../bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('./../bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4'); ?>
<?php $this->start('scriptBottom'); ?>

<script>
    $(function () {
        $('#tableau').DataTable({
            'paging':true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : true
        })
    })
</script>
<?php $this->end(); ?>

