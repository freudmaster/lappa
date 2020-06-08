<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<section class="content-header">
    <h1>Langue
        <small><?=$language->id?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Langue</a></li>
        <li><a href="#">Details</a></li>
        <li class="active"><?=$language->name?></li>
    </ol>
</section>
<!-- Main content -->
<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i>  <?=$language->name?>
            </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
            <p>
                <strong>Description</strong><br>
                <br>
               <?= $language->description?>
            </p>
        </div>

        <div class="col-sm-4 invoice-col">
            <b>Statistiques</b><br>
            <br>
            <div class="progress-group">
                <span class="progress-text">% de mots traduits en <?=$language->name?></span>
                <span class="progress-number"><b><?=count($language->traductions)?></b>/<?=$mots->count()?></span>

                <div class="progress sm">
                    <?php $percent_word=(round(count($language->traductions)/$mots->count(),2)*100);?>
                    <div class="progress-bar progress-bar-aqua" style="width: <?=$percent_word?>%"></div>
                </div>
            </div>

            <div class="progress-group">
                <span class="progress-text">% d'expressions traduits en <?=$language->name?></span>
                <span class="progress-number"><b><?=count($language->expression_traduites)?></b>/<?=$expressions->count()?></span>
                <div class="progress sm">
                    <?php $percent_expression=(round(count($language->expression_traduites)/$expressions->count(),2)*100);?>
                    <div class="progress-bar progress-bar-yellow" style="width: <?=$percent_expression?>%"></div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th><span>#</span></th>
                    <th>Mot</th>
                    <th>Traduction</th>
                    <th>Pluriel</th>
                    <th>Date dernieres modifications</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($language->traductions as $traduction):?>
                    <tr>
                        <td><?=$traduction->id?></td>
                        <td><?=$traduction->mot->valeur?></td>
                        <td><?=$traduction->traduction?></td>
                        <td><?=$traduction->plural?></td>
                        <td><?=$traduction->date_modified->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::NONE])?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-lg-12">
            <?php if(count($language->expression_traduites)>0):?>;
            <p class="lead">Expressions traduites</p>

            <div class="table-responsive">
                <table class="table table-striped" id="table2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Expression</th>
                        <th>Traduction</th>
                    </tr>
                    </thead>
                   <tbody>
                   <?php foreach ($language->expression_traduites as $expression_traduite):?>
                    <tr>
                        <td><?=$expression_traduite->id?></td>
                        <td><?=$expression_traduite->expression->texte?></td>
                        <td><?=$expression_traduite->traduction?></td>
                    </tr>
                   <?php endforeach;?>
                   </tbody>
                </table>
            </div>
            <?php endif;?>

        </div>
    </div>
</section>

<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net/js/jquery.dataTables'); ?>
<?php echo $this->Html->script('/bower_components/datatables.net-bs4/js/dataTables.bootstrap4'); ?>

<?php $this->start('scriptBottom'); ?>
<script>
    $(function () {
        $('#table1').DataTable({
            'paging':true,
            "pageLength": 4,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
        $('#table2').DataTable({
            'paging':true,
            "pageLength": 4,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        })
    })
</script>
<?php $this->end(); ?>
