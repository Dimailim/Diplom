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
                    <div class="brands_products"><!--brands_products-->

<!--                        <div class="brands-name">-->
                            <ul class="catalog category-products">
                                <p>Поиск по...</p>
                                <form action="<?=Url::to(['category/asearch'])?>">
                                    <li><input type="radio"  name = "c" value="publisher"> издательству</li>
                                    <li><input type="radio" name = "c" value="product_name" checked> названию </li>
                                    <li><input type="radio" name="c" value="author"> автору </li>
                                    <li><input type="radio" name="c" value="annotation"> описанию </li>
                                    <li><input type="radio" name="c" value="new"> новинка </li>
                                    <li><input type="radio" name="c" value="sale">  скидка </li>
                            </ul>
<!--                        </div>-->
                    </div><!--/brands_products-->
                    <div class="price-range"><!--price-range-->
                        <h2>Поиск по цене</h2>
                        <div class="well">
                            <input type="text" class="span2" name="c" value="" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[250,1000]" id="sl2" ><br />
                            <b>0 ₽</b> <b class="pull-right">5000 ₽</b>
                        </div>
                    </div><!--/price-range-->

                    <h2>Категория</h2>
                    <ul class="catalog category-products"><?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?></ul><!--/category-products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Расширенный поиск</h2>
                            <p align="center"><input type="text" placeholder="Введите запрос..." width="100%" name = "search" class="features_items"/></p>
                            <p align="center"><input type="submit" value="Поиск" class="btn btn-default" > </p>
                        </form>
                    <?php if(!empty($products)):?>
                        <h4>Поиск по <?= $name?>, запрос: <?= Html::encode($search)?></h4>
                        <? foreach ($products as $product):?>
                            <div class="product-details"><!--product-details-->
                                <div class="col-sm-5">
                                    <div class="view-product">
                                    <a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"> <?= Html::img("@web/images/books/{$product['img']}", ['alt'=> $product['product_name']]); ?></a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if($product['new']): ?>
                                        <?= Html::img("@web/images/home/new.png", ['alt'=> 'New', 'class' => 'newarrival']); ?>
                                    <?php endif; ?>
                                    <?php if ($product['sale']): ?>
                                        <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Sale', 'class' => 'newarrival']); ?>
                                    <?php endif;?>
                                    <h2><a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"><?=$product['product_name'] ?></a></h2>
                                    <p><b>Автор:</b> <?= $product['author'] ?></p>
                                    <p><b>Издательство:</b> <?= $product['publisher']?></p>
                                    <p><b>Жанр:</b><a href="<?=Url::to(['category/view','id' => $product->genre->id]) ?>"> <?=$product->genre->genre_name?></a></p>
                                    <p><b>Возрастное ограничение:</b> <?=$product['age']?></p>
                                    <p><?=$product['content']?></p>

                                    <span>
									<span><b><?= $product['price']; ?> ₽</b></span>
									<a href="<?=Url::to(['cart/add', 'id' => $product['id']]) ?>" data-id="<?=$product->id?>" class="btn btn-default cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</a>
								</span>

                                </div>
                            </div><!--/product-details-->

<!--                            <div class="col-sm-4">-->
<!--                                <div class="product-image-wrapper">-->
<!--                                    <div class="single-products">-->
<!--                                        <div class="productinfo text-center">-->
<!--                                            <a href ="--><?//=Url::to(['book/view', 'id' => $product['id']])  ?><!--"> --><?//= Html::img("@web/images/books/{$product['img']}", ['alt'=> $product['product_name']]); ?><!--</a>-->
<!--                                            <h2>--><?//= $product['price']; ?><!-- ₽</h2>-->
<!--                                            <p><a href ="--><?//=Url::to(['book/view', 'id' => $product['id']])  ?><!--">--><?//=$product['product_name'] ?><!--</a></p>-->
<!--                                            <p><font size="2">--><?//= $product['author'] ?><!--</p>-->
<!--                                            <p>Издательство: --><?//= $product['publisher']?><!--</font></p>-->
<!--                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>-->
<!--                                        </div>-->
<!--                                        --><?php //if($product['new']): ?>
<!--                                            --><?//= Html::img("@web/images/home/new.png", ['alt'=> 'New', 'class' => 'new']); ?>
<!--                                        --><?php //endif; ?>
<!--                                        --><?php //if ($product['sale']): ?>
<!--                                            --><?//= Html::img("@web/images/home/sale.png", ['alt'=> 'Sale', 'class' => 'new']); ?>
<!--                                        --><?php //endif;?>
<!--                                    </div>-->
<!--                                    <div class="choose">-->
<!--                                        <ul class="nav nav-pills nav-justified">-->
<!--                                            <li><a href=""><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
                        <? endforeach;?>
                        <div class="clearfix"></div>
                        <center>
                            <? echo LinkPager::widget([
                                'pagination' => $pages,
                            ]);
                            ?>
                        </center>
                    <? else: ?>
                        <p>Запрос пуст или по данному запросу ничего не найдено...</p>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>