<?php 

function ap_block_two_render($attr, $content){


    ob_start(); ?>


        <p class="second-block">Second Block – hello from the saved content!</p>

    <?php $output = ob_get_clean(); 

    return $output;

}