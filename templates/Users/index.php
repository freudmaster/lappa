<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php echo $this->Html->css("/bower_components/materialize/dist/css/materialize");?>
<div class="users index content">
    <div class="jumbotron white padding30px">
        <h2 class="display-4">Utilisateurs</h2>
        <div class="table-responsive lead white">
            <table class="table" id="table-user">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom d'utilisateur</th>
                    <th>email</th>
                    <th>Langue d'apprentissage</th>
                    <th>Niveau</th>
                    <th>Date de création</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= $user->has('language') ? $this->Html->link($user->language->name, ['controller' => 'Languages', 'action' => 'view', $user->language->id],['class'=>'badge blue']) : '' ?></td>
                        <td><?= $user->has('level') ? $this->Html->link($user->level->name, ['controller' => 'Levels', 'action' => 'view', $user->level->id],['class'=>'badge green']) : '' ?></td>
                        <td><?= h($user->date_created) ?></td>
                        <t
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
<?php echo $this->Html->script("/bower_components/materialize/dist/js/materialize");?>
<?php $this->start('scriptBottom'); ?>
<script>
    $(document).ready(function() {
                $("#table-user").DataTable({
                    'paging': false,
                    'lengthChange': false,
                    'searching'   : true,
                    'showEntries': false,
                    'ordering'    : true,
                    'info'        : false,
                    'autoWidth'   : true
                });
            }
        );
</script>
<?php $this->end(); ?>

