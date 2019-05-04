<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Magique biblio - книжный интернет-магазин. Diplom by Dmitry Gvozdev';
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

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?foreach ($genre as $name): ?>
                    <h2 class="title text-center"><?=$name['genre_name'];?></h2>
                    <? endforeach; ?>
                    <?php if(!empty($products)):?>
                    <? foreach ($products as $product):?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
<!--                                            <img src="/images/shop/product12.jpg" alt="" />-->
                                            <?= Html::img("@web/images/books/{$product['img']}", ['alt'=> $product['product_name']]); ?>
                                            <h2><?= $product['price']; ?> ₽</h2>
                                            <p><?=$product['product_name'] ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
<!--                                        <div class="product-overlay">-->
<!--                                            <div class="overlay-content">-->
<!--                                                <h2>$56</h2>-->
<!--                                                <p>Easy Polo Black Edition</p>-->
<!--                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
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
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                        </center>
                        <? else: ?>
                        <h2>Книги пока отсутсвуют, приходи позже.:C</h2>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>