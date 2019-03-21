<style>
.toast-button:hover{color:#000!important;background-color:#ccc!important}
.toast-hover:hover{color:#fff!important;background-color:#2196F3!important}
#toast-<?=$count?>-toast{color:#fff!important;background-color:#4CAF50;}
</style>
<div id="toast-<?=$count?>-toast" class="<?=$toast_class != "" ? $toast_class : ""?>" style="margin:16px;border-radius:4px;position:relative;display:<?=!isset($message) || $message == "" ? "none" : "block"?>;">
  <span onclick="this.parentElement.style.display='none'" style="border:none;display:inline-block;outline:0;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap;position:absolute;right:0;top:0;border-radius:4px" class="toast-button toast-hover">X</span>
  <p style="margin:16px;padding:8px 16px!important"><?=isset($message) ? $message : ""?></p>
</div>
<?php if (isset($message) && $message != "") {?>
<script>
setTimeout(function(){document.getElementById("toast-<?=$count?>-toast").style.display='none';}, <?=$timeout?>);
</script>
<?php }?>
