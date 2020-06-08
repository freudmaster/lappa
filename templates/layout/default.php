<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->meta(
        'favicon.png',
        '/favicon.png',
        ['type' => 'icon']
    );?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- BootstrapFreud-->
    <?php echo $this->Html->css("/bower_components/materialize/dist/css/materialize");?>
    <?php echo $this->Html->css('/bower_components/ionicons/src/components/icon/icon.css')?>
    <?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min'); ?>
    <?php echo $this->Html->css('./../bower_components/bootstrap/dist/css/bootstrap'); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php echo $this->Html->css('/bower_components/datatables.net-bs4/css/dataTables.bootstrap4'); ?>
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
    <?php echo $this->Html->css("lappa");?>

    <?php echo $this->Html->css('AdminLTE.skins/skin-'. Configure::read('Theme.skin') .'.min'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php echo $this->fetch('css'); ?>

</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
            <span class="logo-mini"><?php echo Configure::read('Theme.logo.mini'); ?></span>
            <span class="logo-lg"><?php echo Configure::read('Theme.logo.large'); ?></span>
        </a>
        <?php echo $this->element('nav-top_custom'); ?>
    </header>

    <?php echo $this->element('aside-main-sidebar_custom'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $this->Flash->render(); ?>
        <?php echo $this->Flash->render('auth'); ?>
        <?php echo $this->fetch('content'); ?>

    </div>
    <!-- /.content-wrapper -->

    <?php echo $this->element('footer_custom'); ?>
    <?php echo $this->element('aside-control-sidebar_custom'); ?>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery')?>
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<?php echo $this->Html->script('/bower_components/html5shiv/dist/html5shiv')?>
<?php echo $this->Html->script('/bower_components/jquery-slimscroll/jquery.slimscroll')?>
<?php echo $this->Html->script('/bower_components/respond/dest/respond.min')?>
<?php echo $this->Html->script('/bower_components/font-awesome/js/fontawesome')?>
<?php echo $this->Html->script("/bower_components/materialize/dist/js/materialize");?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE.adminlte.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>

<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBottom'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        var a = $('a[href="<?php echo $this->Url->build() ?>"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
    });
</script>

</body>
</html>
