
<option value="<?=$category['id']?>" <?php if($category['id'] == $this->model->genre_id) echo 'selected'?>> <?=$category['name_category'];?>
    <?php if(isset($genre)):?>
    <? foreach ($genre as $title): ?>
    <!--            <ul>-->
    <?=$title['genre_name']?>
    <!--            </ul>--></option>
<? endforeach; ?>
<?php endif; ?>

