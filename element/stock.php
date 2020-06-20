<?php

function component($s_id, $s_name, $s_cost, $s_img , $s_description){
    $element = "
    
    <div class=\"card\">
    <div class = \"card_column\">
      <div class = \"card_show\">
       <img src= $s_img>
        <h1>$s_id $s_name</h1>
        <p class=\"price\">$s_cost Baht</p>
        <p>$s_description</p>
        <p><button name = \"button_mic1\">Add to Cart</button></p>
      </div>
    </div>
  </div>
  
    ";
    echo $element;
}



?>