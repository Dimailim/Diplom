<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категория</h2>
                    <ul class="catalog category-products"><?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?></ul><!--/category-products-->
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    <div class="brands_products"><!--brands_products-->
                        <h2>Фильтр поиска</h2>
                        <div class="brands-name">
                            <ul class="catalog category-products">
                                <li> <p><b> Издатель </b> </p></li>
                                <form action="">
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                        <input type="checkbox" class="mdl-checkbox__input" id="checkbox-1" value="act">
                                        АСТ
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                                        <input type="checkbox" class="mdl-checkbox__input" id="checkbox-2"   value="astrel">
                                        Астрель
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-3">
                                        <input type="checkbox" class="mdl-checkbox__input" id="checkbox-3"  value="inostranka">
                                        Иностранка
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-4">
                                       <input type="checkbox" class="mdl-checkbox__input" id="checkbox-4"  value="rusman">Росмэн
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-5">
                                        <input type="checkbox" class="mdl-checkbox__input" id="checkbox-5"  value="ripol">РИПОЛ классик
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-6">
                                        <input type="checkbox" class="mdl-checkbox__input" id="checkbox-6"  value="ftm">ФТМ
                                    </label></li>
                                    <li><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-7">
                                       <input type="checkbox" class="mdl-checkbox__input" id="checkbox-7"  value="aksmo">Эксмо>
                                    </label></li>
                                </form>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?=$genre->genre_name?></h2>
                    <?php if(!empty($products)):?>
                    <? foreach ($products as $product):?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"> <?= Html::img("@web/images/books/{$product['img']}", ['alt'=> $product['product_name']]); ?></a>
                                            <h2><?= $product['price']; ?> ₽</h2>
                                            <p><a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"><?=$product['product_name'] ?></a></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                        </div>
                                        <?php if($product['new']): ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt'=> 'New', 'class' => 'new']); ?>
                                        <?php endif; ?>
                                        <?php if ($product['sale']): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Sale', 'class' => 'new']); ?>
                                        <?php endif;?>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                    <? endforeach;?>
                        <div class="clearfix"></div>
                         <center>
                            <? echo LinkPager::widget([
                            'pagination' => $page,
                            ]);
                            ?>
                        </center>
                        <? else: ?>
                        <h2>Книги пока отсутсвуют, приходи позже.:C</h2>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>