<?php

include_once dirname(__DIR__).'../controllers/brand_controller.php';


function view_brands() {
    $brands = get_brands_ctr();
    $i = 0;
    if ($brands != false) { 
			while($i < count($brands)){
				
?>
        <option value="<?=$brands[$i]['brand_id'];?>"><?=$brands[$i]['brand_name']; ?></option>
<?php $i++; }}}

?>