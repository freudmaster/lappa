<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?= $this->Html->meta(
    'favicon.png',
    '/favicon.png',
    ['type' => 'icon']
);?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?> | <?php echo 'Se connecter' ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min'); ?>
    <!-- Font Awesome -->
    <?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min'); ?>
    <!-- Ionicons -->
    <?php echo $this->Html->css('/bower_components/Ionicons/css/ionicons.min'); ?>
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
    <!-- iCheck -->
    <?php echo $this->Html->css('login');?>
    <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?php echo $this->fetch('css'); ?>

</head>
<body>
<?= $this->Flash->render() ?>

<div class="login-box">
    <div class="row">
        <div class="login-logo col-md-6 col-lg-5 col-lg-offset-1">
            <div class="row login-logo-title">
                <h1 style="color: #a8a8a8">Lappa <span style="color: #0093C4;">GA</span></h1>
            </div>
            <?= $this->Html->image('logo.png',['class'=>'login-logo-img'])?>
        </div>
        <?php echo $this->fetch('content'); ?>

    </div>

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('/bower_components/jquery/dist/jquery'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

<?php echo $this->fetch('script'); ?>

<?php echo $this->fetch('scriptBottom'); ?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
