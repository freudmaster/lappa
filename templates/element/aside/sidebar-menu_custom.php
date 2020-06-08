<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview">
    <a href="#">
    <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
    <li><?= $this->Html->link('<i class="fa fa-bookmark-o"></i><span>Liste de Mots</span>',["controller"=>"mots","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-book"></i><span>Liste des Expressions</span>',["controller"=>"expressions","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-files-o"></i><span>Ajouter des traductions</span>',["controller"=>"traductions","action"=>'add'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-language"></i><span>Liste des Langues</span>',["controller"=>"languages","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-file-text-o"></i><span>Consulter les traductions</span>',["controller"=>"traductions","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-users"></i><span>Utilisateurs</span>',["controller"=>"Users","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-step-forward"></i><span>Consulter les Niveaux</span>',["controller"=>"Levels","action"=>'index'],['escape'=>false])?></li>
    <li><?= $this->Html->link('<i class="fa fa-object-group"></i><span>Consulter les catégories</span>',["controller"=>"Categories","action"=>'index'],['escape'=>false])?></li>
   <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
-->
</ul>
