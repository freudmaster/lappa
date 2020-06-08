<?php
?>
<div>
    <span class='progress-description'><?=(int)$percent?>% <?=$description?></span>
    <div class="progress" style="<?=$this->Html->style(['background'=>'rgba(0,0,0,0.2)','margin'=> '5px 10px 5px 10px','height'=>' 3px'])?>">
        <div class="progress-bar" style="<?= $this->Html->style(['width' => $percent.'%',"background"=>"white"]);?>"></div>
    </div>

</div>
