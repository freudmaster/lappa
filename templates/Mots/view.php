<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mot $mot
 */
?>
<?php echo $this->Html->css('/bower_components/datatables.net-bs4/css/dataTables.bootstrap4'); ?>

<section class="content-header">
    <?= $this->Html->link('Consulter la liste des mots', ['action' => 'index'],['class'=>'btn btn-primary ']) ?>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Mots</a></li>
        <li><a href="#">Details</a></li>
        <li class="active"><?=$mot->valeur?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="mots view large-9 medium-8 columns content row">
                <div class="col-sm-4 col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <div>
                                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $mot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mot->id),'class'=>'btn btn-danger pull-right']) ?>
                            </div>
                            <h2><?= h($mot->valeur) ?></h2>


                        </div>
                        <div class="box-body">
                            <div>
                                <h4><?= __('Definition') ?></h4>
                                <?= $this->Text->autoParagraph(h($mot->definition)); ?>
                            </div>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Categorie') ?></th>
                                    <td><?= $mot->has('category') ? $this->Html->link('<span class="badge bg-green">'.$mot->category->name.'</span>',['controller' => 'Categories', 'action' => 'view', $mot->category->id],['escape'=>false]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Niveau') ?></th>
                                    <td><?= $mot->has('level') ? $this->Html->link('<span class="badge bg-blue">'.$mot->level->name.'</span>', ['controller' => 'Levels', 'action' => 'view', $mot->level->id],['escape'=>false]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="width: 40%;"><?= __('Code') ?></th>
                                    <td><?= $this->Number->format($mot->code) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="width: 50%;"><?= __('Date creation') ?></th>
                                    <td><?= h($mot->created->i18nFormat([IntlDateFormatter::FULL,IntlDateFormatter::NONE])) ?></td>
                                </tr>
                                <br/>
                                <tr>
                                    <th scope="row" style="width: 50%;"><?= __('Der. modification') ?></th>
                                    <td><?= h($mot->modified->i18nFormat([IntlDateFormatter::FULL,IntlDateFormatter::NONE])) ?></td>
                                </tr>
                            </table>

                            </div>
                        <div class="box-footer bg-blue">
                            <div class="btn-group-horizontal">
                                <?= $this->Html->link('<span class="text-white" style="font-size: 15px; color: white">Modifier</span>', ['action' => 'edit', $mot->id],['escape'=>false]) ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-8 col-md-8">

                    <div class=" nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a href="#tab_1-1" data-toggle="tab"  role="tab" aria-controls="favories" aria-selected="false"><h4><?= __('Utilisateurs qui aiment') ?></h4></a></li>
                            <li class="nav-item"><a href="#tab_2-2" data-toggle="tab"  role="tab" aria-controls="traduction" aria-selected="false"><h4><?= __('Traductions') ?></h4></a></li>
                        </ul>
                        <div class="tab-content"  style="height: 400px">
                            <div class="tab-pane " id="tab_1-1" role="tabpanel" aria-labelledby="favories">
                                <?php if (!empty($mot->favories)): ?>
                                    <table  class="table table-hover table-striped" id="tabfavories">
                                        <thead>
                                        <tr>
                                            <th><?= __('Utilisateur') ?></th>
                                            <th ><?= __('Date d\'ajout') ?></th>
                                            <th  class="actions"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($mot->favories as $favories): ?>
                                            <tr>
                                                <td><?= h($favories->user['username']) ?></td>
                                                <td><?= h($favories->modified) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => 'Favories', 'action' => 'view', $favories->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Favories', 'action' => 'edit', $favories->id]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favories', 'action' => 'delete', $favories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favories->id)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else:
                                echo $this->element("empty_list");
                                ?>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane active" id="tab_2-2" role="tabpanel" aria-labelledby="traduction">
                                <?php if (!empty($mot->traductions)): ?>
                                    <table id="tabtraduction" class="table table-hover table-striped">
                                        <tr>
                                            <th><?= __('#') ?></th>
                                            <th ><?= __('Langue') ?></th>
                                            <th ><?= __('Traduction') ?></th>
                                            <th ></th>
                                        </tr>
                                        <?php foreach ($mot->traductions as $traductions):
                                            ?>
                                            <tr>
                                                <td><?= h($traductions->id) ?></td>
                                                <td><?= h($traductions->Languages['name']) ?></td>
                                                <td><?= h($traductions->traduction) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Traductions', 'action' => 'view', $traductions->id],['class'=>'btn btn-default btn-sm','escape'=>false]) ?>
                                                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Traductions', 'action' => 'edit', $traductions->id],['class'=>'btn btn-default btn-sm','escape'=>false]) ?>
                                                    <?= $this->Form->postLink('<i class="fa fa-close"></i>', ['controller' => 'Traductions', 'action' => 'delete', $traductions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traductions->id),'class'=>'btn btn-default btn-sm','escape'=>false]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                <?php else:
                                    echo $this->element("empty_list");
                                    ?>
                                <?php endif; ?>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>

<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4',['block' => 'script']); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4',['block' => 'script']); ?>
<?php $this->start('scriptBottom'); ?>

<script>
    $(function () {
        $('#tabtraduction').DataTable({
            'paging':true,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
        $('#tabfavories').DataTable({
            'paging':true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : true
        });
    });
    <?php $this->end();?>
</script>
