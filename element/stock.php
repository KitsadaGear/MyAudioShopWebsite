<?php

function basket_component($s_id, $s_name, $s_cost, $s_img , $s_description , $counter){
  
  $element = "

  <form action=\"shopping_basket.php?action=remove&id=$s_id\" method=\"post\" class=\"basket-items\">
                  <div class=\"border rounded\">
                      <div class=\"row bg-white\">
                          <div class=\"col-md-3 pl-0\">
                              <img src=$s_img alt=\"Image1\" class=\"img-fluid\">
                          </div>
                          <div class=\"col-md-6\">
                              <h5 class=\"pt-2\">$s_name</h5>
                              <small class=\"text-secondary\">$s_description</small>
                              <h5 class=\"pt-2\">$s_cost Baht</h5>
                              <button type=\"submit\" class=\"btn btn-warning\">Edit Product</button>
                              <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                          </div>
                          <div class=\"col-md-3 py-5\">
                              <div>
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\" id = \"minus\"><i class=\"fa fa-minus\"></i></button>
                                  <input type=\"text\" value=\"$counter\" class=\"form-control w-25 d-inline\">
                                  <button type=\"button\" class=\"btn bg-light border rounded-circle\" id = \"plus\"><i class=\"fa fa-plus\"></i></button>

                        
  
                            
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
  ";
  echo  $element;
}


?>