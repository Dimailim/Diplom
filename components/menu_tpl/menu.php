 <li><a href="<?= yii\helpers\Url::to(['category/view', 'id' => $category['id']]);?>"><?= $category['name_category']; ?>
         <?php if(isset($category['genre'])):  $genre = $category['genre']; ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
         <?php endif; ?>
     </a>
     <?php if(isset($genre)):?>
         <? foreach ($genre as $subcat): ?>
     <ul>
           <a href="<?= yii\helpers\Url::to(['category/view', 'id' => $subcat['id']]);?>"> <?=$subcat['genre_name']?></a>
     </ul>
         <? endforeach; ?>
     <?php endif; ?>
 </li>

