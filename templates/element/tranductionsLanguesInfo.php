<?php

/**
 * @var \App\Model\Entity\Language $objet
 */
?>

<div class="col-lg-12 col-md-12 bg-white ">
    <div class="bg-white">
        <ul class="nav nav-tabs" id="nav-tab-<?=$objet->id?>" role="tablist">
            <li class="nav-item nav-link active"><a id="nav-home-tab-<?=$objet->id?>"  aria-expanded="true" data-toggle="tab" href="#nav-home-<?=$objet->id?>" role="tab" aria-controls="nav-home-<?=$objet->id?>" aria-selected="true">Mots traduits</a></li>
            <li class="nav-item nav-link"><a  id="nav-profile-tab-<?=$objet->id?>" data-toggle="tab" href="#nav-profile-<?=$objet->id?>" role="tab" aria-controls="nav-profile-<?=$objet->id?>" aria-selected="false">Expressions Traduites</a></li>
        </ul>
    </div>
    <div class="tab-content bg-white" id="nav-tabContent-<?=$objet->id?>" style="background: white">
        <div class="tab-pane fade active in" id="nav-home-<?=$objet->id?>" role="tabpanel" aria-labelledby="nav-home-tab-<?=$objet->id?>"  aria-selected="true">
            <?php if (count($objet->traductions)>0):?>
            <div class="table-responsive padding30px">
                <table class="table" id="table-mot-<?=$objet->id?>">
                    <thead>
                    <tr>
                        <th>Mot</th>
                        <th>Traduction</th>
                        <th>Difficultés</th>
                        <th>Traductions par</th>
                        <th>Crée par</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($objet->traductions as $traduction):?>
                        <tr>
                            <td><?= $this->Html->link(
                                    $traduction->mot->valeur,
                                    ['controller'=>'mots','action'=>'view',$traduction->id]
                                );?></td>
                            <td><?=$traduction->traduction;?></td>
                            <?php $label="label ".($traduction->mot->level_id==1?'label-success':($traduction->mot->level_id==2?'label-warning':'label-error'));
                            ?>
                            <td><?= $this->Html->link('<span class="'.$label.'">'.$traduction->mot->level->name.'</span>',['controller'=>'levels','action'=>'view',$traduction->mot->level_id],['escape'=>false]);?></td>
                            <td><?=isset($traduction->administrator->username)?$traduction->administrator->username:"";?></td>
                            <td><?=isset($traduction->mot->administrator->username)?$traduction->mot->administrator->username:""?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else :
                     echo $this->element("empty_list");
             endif;?>
        </div>
        <div class="tab-pane fade" id="nav-profile-<?=$objet->id?>" role="tabpanel" aria-labelledby="nav-profile-tab-<?=$objet->id?>">
            <?php if (count($objet->expression_traduites)>0):?>
                <div class="table-responsive padding30px">
                    <table class="table margin" id="table-<?=$objet->id?>">
                    <thead>
                    <tr>
                        <th>Expression</th>
                        <th>Traduction</th>
                        <th>Difficultés</th>
                        <th>Traduit par</th>
                        <th>Crée par</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($objet->expression_traduites as $expression_traduite):?>
                        <tr>
                            <td><?= $this->Html->link($expression_traduite->expression->texte, ['controller'=>'expressions','action'=>'view',$expression_traduite->expression->id]);?></td>
                            <td><?=$expression_traduite->traduction;?></td>
                            <?php $label="label ".($expression_traduite->expression->level_id==1?'label-success':($expression_traduite->expression->level_id==2?'label-warning':'label-error'));
                            ?>
                            <td><?= $this->Html->link('<span class="'.$label.'">'.$expression_traduite->expression->level->name.'</span>',['controller'=>'levels','action'=>'view',$expression_traduite->expression->level_id],['escape'=>false]);?></td>
                            <td><?=isset($expression_traduite->administrator->username)?$expression_traduite->administrator->username:"";?></td>
                            <td><?=isset($expression_traduite->expression->administrator->username)?$expression_traduite->expression->administrator->username:""?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            <?php else:
                echo $this->element("empty_list");
            endif;?>
        </div>
    </div>
</div>


