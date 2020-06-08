<?php
$user = $this->Identity->get();
?>
<div class="user-panel">
    <div class="pull-left image">
        <?php echo $this->Html->image('user_1.png', array('class' => 'img-circle')); ?>
    </div>
    <div class="pull-left info">
        <p><?=$user->lastname?></p>
        <span><?= $user->firstname?></span>
    </div>
</div>
