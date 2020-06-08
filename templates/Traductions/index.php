<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Traduction[]|\Cake\Collection\CollectionInterface $traductions
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>

<section class="padding30px">
    <div class="row">
        <div class="col-md-3 col-lg-3 title-box">
            <div class="dropdown" id="MDropdown">
                <div class="height200" style="margin-top: 20px">
                    <h4 class="white-text bold " id="title-selected"></h4>
                    <p class="white-text" id="description-selected"></p>
                </div>
                <a class="btn btn-flat dropdown-toggle white-text col-md-12 col-lg-12" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px">Choisir une langue</a>
                <div class="dropdown-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($languages as $language):?>
                        <a class="dropdown-item col-md-12 dropdown-item-2" data-objet-name="<?=$language->name?>" data-objet-description="<?=$language->description?>" data-identifier="<?=$language->id?>" id="v-pills-<?=$language->id?>-tab" data-toggle="pill" href="#v-pills-<?=$language->id?>" role="tab" aria-controls="v-pills-<?=$language->id?>" aria-selected="true"><?=$language->name?></a>
                    <?php endforeach;?>
                </div>
            </div>

        </div>
        <div class="col-md-4 col-lg-4 title-box-white">
           <h4>Statistiques</h4>
            <?php
                $totalExpressionTraduiteCount=(double)$expressionsTraduites->count();
                $TotlexpressionTraduitesAdmin=((double)$expressionsTraduites->where(["administrator_id"=>$user->id])->count());
                $expressionsTraduitesPercent=round((($TotlexpressionTraduitesAdmin*100/$totalExpressionTraduiteCount)),2);

                $totalExpressionsCount=(double)$expressions->count();
                $totalExpressionsAdmin=(double)$expressions->where(["administrator_id"=>$user->id])->count();
                $expressionsPercent=round(($totalExpressionsAdmin*100/$totalExpressionsCount),2);

                $totalMotsCount=(double)$mots->count();
                $totalMotsAdmin=(double)$mots->where(["administrator_id"=>$user->id])->count();
                $motsPercent=round(($totalMotsAdmin*100/$totalMotsCount),2);
                $totalTraductionsCount=(double)$traductions->count();
                $totalTraductionsAdmin=(double)$traductions->where(["administrator_id"=>$user->id])->count();
                $totalTraductions=round(($totalTraductionsAdmin*100/$totalTraductionsCount),2);

            ?>
            <h5>% de mots créer par vous</h5>
            <div class="progress sm">
                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$motsPercent?>%"></div>
            </div>
            <h5>% mots traduits par vous</h5>
            <div class="progress sm">
                <div class="progress-bar progress-bar-yellow " role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$totalTraductions?>%"></div>
            </div>
           <h5>% d'expression créer par vous</h5>
           <div class="progress sm"><div class="progress-bar bg-teal" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$expressionsPercent?>%"></div></div>
           <h5>% d'expressions traduites par vous</h5>
           <div class="progress sm">
               <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$expressionsTraduitesPercent?>%"></div>
           </div>
       </div>
        <div class="col-md-4 col-lg-4 title-box-white">
            <h4>Options</h4>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->Html->link('<i class="fa fa-plus"></i>',['controller'=>'Traductions','action'=>'add'],['escape'=>false,'class'=>"btn-floating col-md-offset-1 col-md-4 btn-large waves-effect waves-light light-blue"])?>
                    <h5 class="col-md-6 text-center">Ajouter une traduction</h5>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                    <?= $this->Html->link('<i class="fa fa-list"></i>',['controller'=>'Mots','action'=>'index'],['escape'=>false,'class'=>"btn-floating col-md-offset-1 col-md-4 btn-large waves-effect waves-light light-green"])?>
                    <h5 class="col-md-6 text-center">Afficher la liste des mots</h5>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="tab-content" id="v-pills-tabContent" >
            <?php foreach ($languages as $language):?>
                <div class="tab-pane fade element" id="v-pills-<?=$language->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$language->id?>-tab">
                    <?= $this->element('tranductionsLanguesInfo',["objet"=>$language]);?>
                </div>
    <?php endforeach;?>
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
        $('#MDropdown').on('click.bs.dropdown', function (event) {
            let target=event.target;
            if(target.className.includes("dropdown-item")) {
                let tabletarget="#table-";
                tableauExpression=tabletarget.concat(target.getAttribute("data-identifier"));
                tableauMot=tabletarget.concat("mot-",target.getAttribute("data-identifier"));
                $(tableauExpression).DataTable({
                    'paging':true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'select': true,
                    'info'        : false,
                    'autoWidth'   : true
                });
                $("#dropdownMenuLink").text(target.getAttribute("data-objet-name").concat("- Cliquez pour changer"));
                $("#title-selected").text(target.getAttribute("data-objet-name"));
                $("#description-selected").text(target.getAttribute("data-objet-description"));
                $(tableauMot).DataTable({
                    'paging':true,
                    'lengthChange': true,
                    'select': true,
                    'searching'   : true,
                    'showEntries':false,
                    'ordering'    : true,
                    'info'        : false,
                    'autoWidth'   : true
                });
            }

        })
    } );

</script>
<?php $this->end(); ?>


