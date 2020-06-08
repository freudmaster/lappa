<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="">
    <div class="row center-align white padding30px">
        <h3 class="col-md-11 left-align"><?= __('Categories') ?></h3>
        <?= $this->Html->link('<i class="material-icons">add</i>', ['action' => 'add'],['class'=>'btn-floating waves-effect waves-light blue','escape'=>false]) ?>
    </div>
    <div class="categories index content white">
       <div class="table-responsive padding30px text-center">
            <table class="table table-responsive table-hover" id="table-categorie">
                <thead>
                <tr>
                    <th style="width: 24px">#</th>
                    <th style="width: 24px">Titre</th>
                    <th style="width: 24px">Nb. Mots</th>
                    <th style="width: 24px">Nb. Expressions</th>
                    <th style="width: 24px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td class="center-align" style="width: 24px"><?= $this->Number->format($category->id) ?></td>
                        <td  class="center-align" style="width: 120px"><h4><strong><?= h($category->name) ?></strong></h4></td>
                        <td class="center-align margin30px" ><h5 class=""><strong><?= $this->Number->format(count($category->mots)) ?></h5></strong></td>
                        <td class="center-align" style="width: 24px"><h5><strong><?= $this->Number->format(count($category->expressions)) ?></h5></strong></td>
                        <td class="actions">
                            <?= $this->Html->link("<i class='material-icons'>remove_red_eye</i>", ['action' => 'view', $category->id],['escape'=>false]) ?>
                            <?= $this->Html->link("<i class='material-icons'>mode_edit</i>", ['action' => 'edit', $category->id],['escape'=>false]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4'); ?>

<?php $this->start('scriptBottom'); ?>
<script>
    $(document).ready(function() {
        $('#table-categorie').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching'   : true,
            'showEntries': false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
    });
</script>
<?php $this->end(); ?>
