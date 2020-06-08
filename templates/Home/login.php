<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
$this->layout="login_admin";?>
<div class=" col-lg-5 login-content">
    <h3 class="text-center">Bienvenue dans l'espace administrateur <br/>de<br/>Lappa</h3>
    <br/>
    <div class="center-align " style="margin-left: 20px;">
        <?= $this->Form->create() ?>
        <?= $this->Form->control('username', ['required' => true,'label'=>'Nom d\'utilisateur','class'=>'form-control login-input','type'=>"text","placeholder"=>"Nom d'utilisateur"]) ?>
        <br/>
        <?= $this->Form->control('password', ['required' => true,'label'=>'Mot de passe','class'=>'form-control login-input','type'=>"password","placeholder"=>"Mot de passe"]) ?>
        <?= $this->Form->submit(__('Se Connecter'),['class'=>'btn btn-block login-btn']); ?>
        <?= $this->Form->end() ?>

    </div>

</div>
