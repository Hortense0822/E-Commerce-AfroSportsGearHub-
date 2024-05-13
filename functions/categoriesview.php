<?php
include_once dirname(__DIR__) . '/controllers/category_controller.php';

function view_categories()
{
    $categories = get_categories_ctr();
    if ($categories) {
        foreach ($categories as $category) {
?>
            <option value="<?= $category['cat_id']; ?>"><?= $category['cat_name']; ?></option>
<?php
        }
    }
}
?>
