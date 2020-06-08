<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level[]|\Cake\Collection\CollectionInterface $levels
 */
?>
<div class="levels index content jumbotron light-blue white-text " style="height: 780px">
    <h3>Liste des Niveaux de l'application</h3>
        <div class="table-responsive lead">
            <table class="col-md-6 col-md-offset-3 text-center" id="table-level">
                <thead>
                <tr>
                    <th><?='Nb Utilisateurs'?></th>
                    <th><?= ('Titre') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($levels as $level): ?>
                    <tr>
                        <td><h2><?= $this->Number->format(count($level->users))?></h2></td>
                        <td><h2 class="bold"><?=$level->name ?></h2></td>
                       <!-- <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $level->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $level->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]) ?>
                        </td>-->
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4'); ?>
<?php $this->start('scriptBottom'); ?>
<script>
    $(document).ready(function() {
            $("#table-level").DataTable({
                'paging': false,
                'lengthChange': false,
                'select': true,
                'searching'   : false,
                'showEntries': false,
                'ordering'    : true,
                'info'        : false,
                'autoWidth'   : true
            });
        }
    );
</script>
<?php $this->end(); ?>
