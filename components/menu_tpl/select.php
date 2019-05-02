<li>!!!<a href=""><?= $category['name_category']; ?>
        <?php if(isset($category['genre'])):  $genre = $category['genre']; ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif; ?>
    </a>
    <?php if(isset($genre)):?>
        <? foreach ($genre as $title): ?>
            <ul>
                <a href=""> <?=$title['genre_name']?></a>
            </ul>
        <? endforeach; ?>
    <?php endif; ?>
</li>

