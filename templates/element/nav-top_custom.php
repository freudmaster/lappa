<?php use Cake\Core\Configure; ?>
<nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li><?= $this->Html->link('<i class="fa fa-sign-out"></i>',["controller"=>"Home","action"=>'logout'],['escape'=>false])?></li>
    </ul>
  </div>
</nav>
