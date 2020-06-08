<!-- Content Header (Page header) -->
<?php

$mots_count=$mots->count();
$expressions_count=$expressions->count();
$total_mot_expression_count=$mots_count+$expressions_count;
$traduction_count=$traductions->count();
$expressions_traduites_count=$expressionTraduites->count();
$count_langues=$langues->count();
$total_traduction_mot_expression_count=$traduction_count+$expressions_traduites_count;
$traduction_pecent=round((($total_traduction_mot_expression_count*$total_mot_expression_count)/($total_mot_expression_count*$count_langues)),1);
$users_count=$users->count();
$p=80;

?>
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">

      <!-- /.row -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner">
                  <h3><?=$mots_count?></h3>

                  <p>Mots</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-book-outline"></i>
              </div>
              <?= $this->Html->link(' Plus d\'information <i class="fa fa-arrow-circle-right"></i>',['controller'=>'mots','action'=>'index'],['class'=>'small-box-footer','escape'=>false]);?>
          </div>
      </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner">
                  <h3><?=$expressions_count?></h3>

                  <p>Expressions</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-paper-outline"></i>
              </div>
              <?= $this->Html->link(' Plus d\'information <i class="fa fa-arrow-circle-right"></i>',['controller'=>'expressions','action'=>'index'],['class'=>'small-box-footer','escape'=>false]);?>
          </div>
      </div>

    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3><?=$traduction_pecent?>%</h3>
                  <p>Traductions</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-bookmarks-outline"></i>
              </div>
              <?= $this->Html->link(' Plus d\'information <i class="fa fa-arrow-circle-right"></i>',['controller'=>'traductions','action'=>'index'],['class'=>'small-box-footer','escape'=>false]);?>
          </div>
      </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
              <div class="inner">
                  <h3><?=$users_count?></h3>

                  <p>Utilisateurs</p>
              </div>
              <div class="icon">
                  <i class="ion ion-ios-people-outline"></i>
              </div>
              <?= $this->Html->link(' Plus d\'information <i class="fa fa-arrow-circle-right"></i>',['controller'=>'users','action'=>'index'],['class'=>'small-box-footer','escape'=>false]);?>
          </div>
      </div>
    <!-- /.col -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rapport Recapitulatifs</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart"

              >
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Completion des langues</strong>
              </p>

              <div style="height:180px;overflow-y: scroll">
              <?php foreach ($langues as $langue):
                $percent_=($langue->count_traductions/$mots_count*100);?>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text"><?=$langue->name?></span>
                <span class="progress-number"><?=$langue->count_traductions?></span>
                <div class="progress sm">
                <div class='<?=$percent_<25?" progress-bar progress-bar-red":($percent_<50?" progress-bar progress-bar-yellow":($percent_<75?" progress-bar progress-bar-blue":" progress-bar progress-bar-green"));?>'' style=<?= $this->Html->style(['width' => $percent_.'%']);?>></div>
                </div>
              </div>
                        <?php endforeach; ?>
                        </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body --><!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>

  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">
        <div class="col-md-5">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Derniers Utilisateurs</h3>

              <div class="box-tools pull-right">
                <span class="label label-danger"><?=$users->count() ?> Utilisateurs</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                  <?php foreach($users->limit(10) as $user): ?>
                <li>
                    <div>
                  <?= $this->Html->image('user_1.png', array('alt' => 'User Image','style'=>'width:56px;height:56px'));?>
                  </div>
                  <?= $this->Html->link($user->username,['controller' => 'Users', 'action' => 'view', '_full' => true,$user->id,"class"=>'users-list-name']);
                  ?>
                  <span class="users-list-date"><?= $user->language->name?></span>
                </li>
                  <?php endforeach;?>
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <?php echo $this->Html->link('Voir les Utilisateurs', ['controller' => 'Users', 'action' => 'index', '_full' => true])?>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        <div class="col-md-7">
               <div class="box box-info">
                   <div class="box-header with-border">
                       <h3 class="box-title">Derniers Mots enregistrés</h3>

                       <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                       </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                           <table class="table no-margin">
                               <thead>
                               <tr>
                                   <th>Mot</th>
                                   <th>Description</th>
                                   <th>Difficultés</th>
                                   <th>Traductions effectuées</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php foreach ($mots->limit(10) as $mot):?>
                               <tr>
                                   <td><?= $this->Html->link(
                                       $mot->valeur,
                                       ['controller'=>'mots','action'=>'view',$mot->id]
                                       );?></td>
                                   <td><?=$mot->definition;?></td>
                                   <?php $label="label ".($mot->level_id==1?'label-success':($mot->level_id==2?'label-warning':'label-error'));
                                   ?>
                                   <td><?= $this->Html->link('<span class="'.$label.'">'.$mot->Levels['name'].'</span>',['controller'=>'levels','action'=>'view',$mot->level_id],['escape'=>false]);?></td>
                                   <td>
                                       <?php
                                        $percent_traduit=round((count($mot->traductions)/$count_langues)*100,1);
                                        $color="badge ";
                                        $color.=$percent_traduit<25?" bg-red":($percent_traduit<50?"bg-orange":($percent_traduit<75?"bg-blue":"bg-green"));
                                       ?>
                                       <span class='<?=$color?>'><?=$percent_traduit;?>%</span>
                                   </td>
                               </tr>
                             <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                   <div class="box-footer clearfix">
                       <?= $this->Html->link('Ajouter un mot',['controller'=>'Mots','action'=>'add'],['class'=>'btn btn-sm btn-info btn-flat pull-left']);?>
                       <?= $this->Html->link('Voir tout les mots',['controller'=>'Mots','action'=>'index'],['class'=>'btn btn-sm btn-default btn-flat pull-right']);?>
                   </div>
                   <!-- /.box-footer -->
               </div>
           </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>

<!-- jvectormap -->
<?php echo $this->Html->css('/bower_components/jvectormap/jquery-jvectormap', ['block' => 'css']); ?>
<!-- Sparkline -->
<?php echo $this->Html->script('/bower_components/jquery-sparkline/dist/jquery.sparkline.min', ['block' => 'script']); ?>
<!-- jvectormap -->
<?php echo $this->Html->script('/plugins/jvectormap/jquery-jvectormap-1.2.2.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('/plugins/jvectormap/jquery-jvectormap-world-mill-en', ['block' => 'script']); ?>
<!-- ChartJS -->
<?php echo $this->Html->script('/bower_components/chart.js/dist/Chart', ['block' => 'script']); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo $this->Html->script('dashboardChart.js', ['block' => 'script']); ?>
