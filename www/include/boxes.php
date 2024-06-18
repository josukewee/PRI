<?php

function errorBox($text)
{ ?>
   <div class="alert alert-danger mt-3">
        <?= $text ?>
    </div>
        
<?php }


function successBox($text)
{ ?>
   <div class="alert alert-success mt-3">
        <?= $text ?>
    </div>
        
<?php }