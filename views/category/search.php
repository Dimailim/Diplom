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



                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q)?></h2>
                    <?php if(!empty($products)):?>
                        <? foreach ($products as $product):?>
                            <? $img = $product->getImage(); ?>
                            <div class="product-details"><!--product-details-->
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"> <?= Html::img("@web/images/books/{$img->filePath}", ['alt'=> $product['product_name']]); ?></a>
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
									<a href="<?=Url::to(['cart/add', 'id' => $product['id']]) ?>" data-id="<?=$product->id?>" class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</a>
								</span>

                                </div>
                            </div>
<!--                            <div class="col-sm-4">-->
<!--                                <div class="product-image-wrapper">-->
<!--                                    <div class="single-products">-->
<!--                                        <div class="productinfo text-center">-->
<!--                                            <a href ="--><?//=Url::to(['book/view', 'id' => $product['id']])  ?><!--"> --><?//= Html::img("@web/images/books/{$product['img']}", ['alt'=> $product['product_name']]); ?><!--</a>-->
<!--                                            <h2>--><?//= $product['price']; ?><!-- ₽</h2>-->
<!--                                            <p><a href ="--><?//=Url::to(['book/view', 'id' => $product['id']])  ?><!--">--><?//=$product['product_name'] ?><!--</a></p>-->
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

                        <? endforeach;?>
                        <div class="clearfix"></div>
                        <center>
                            <? echo LinkPager::widget([
                                'pagination' => $pages,
                            ]);
                            ?>
                        </center>
                    <? else: ?>
                        <h2>По данному запросу ничего не найдено...</h2>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>