<?php 

function ap_block_one_render($attr, $content){


    ob_start(); ?>


        <p class="first-block">First Block – hello from the saved content!</p>

    <?php $output = ob_get_clean(); 

    return $output;

}