<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if(!empty($new)): ?>
<section id="slider"><!--slider-->
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                    <? $count = 0; $i = count($new) ?>
                      <? foreach ($new as $item): ?>
                        <?if($count % 1 == 0): ?>
                        <div class="item <? if($count == 0){ echo "active"; } ?>">
                        <?endif;?>
                            <div class="col-sm-6">
                                <h1><?=$item['product_name']?></h1>
                                <h2><?=$item['author']?></h2>
                                <p>Новинки! Успей прочитать первым, новую книгу от <?=$item['author']?> </p>
                                <a href="<?=Url::to(['book/view', 'id' => $item['id']])  ?>" class="btn btn-default get">Подробнее</a>
                            </div>
                            <div class="col-sm-6">
                                <?= Html::img("@web/images/books/{$item['img']}", ['alt'=> $item['product_name']]); ?>
<!--                                <img src="/images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        <? $count++ ?>
                        <?if($count % 1 == 0 || $count == $i): ?>
                        </div>
                        <?endif;?>
                        <?endforeach;?>
                     </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->
<?endif;?>

<section>
    <div class="container">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>
        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products"><?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?></ul><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.png" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <?php if(!empty($hits)): ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Популярные книги</h2>
                    <? foreach ($hits as $hit): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?=Url::to(['book/view', 'id' => $hit['id']])  ?>"> <?= Html::img("@web/images/books/{$hit['img']}", ['alt'=> $hit['product_name']]); ?></a>
                                    <h2><?= $hit['price']; ?> ₽</h2>
                                    <p><a href ="<?=Url::to(['book/view', 'id' => $hit['id']])  ?>"><?= $hit['product_name']; ?></a></p>
                                    <a href="<?=Url::to(['cart/add', 'id' => $hit['id']]) ?>" data-id="<?=$hit['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>

                                </div>
                                <?php if($hit['new']): ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'New', 'class' => 'new']); ?>
                                <?php endif; ?>
                                <?php if ($hit['sale']): ?>
                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Sale', 'class' => 'new']); ?>
                                <?php endif;?>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="<?=Url::to(['wishlist/add', 'id'=>$hit['id']])?>"><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>
<!--                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?endforeach;?>
                </div><!--features_items-->
                <?endif;?>
                <?php if(!empty($sales)):?>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Скидки</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <? $count = 0; $i = count($sales) ?>
                            <? foreach ($sales as $sale): ?>

                                <?if($count % 3 == 0): ?>
                                    <div class="item <? if($count == 0){ echo "active"; } ?>">
                                <?endif;?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <!--                                            <img src="/images/home/recommend1.jpg" alt="" />-->
                                                <a href="<?=Url::to(['book/view', 'id' => $sale['id']]);?>"><?=Html::img("@web/images/books/{$sale['img']}",['alt' => $sale['product_name']]);?></a>
                                                <h2><?=$sale['price']?> ₽ </h2>
                                                <p><a href="<?=Url::to(['book/view', 'id' => $sale['id']]);?>"> <?=$sale['product_name'];?></a></p>
                                                <a href="<?=Url::to(['cart/add', 'id' => $sale['id']]) ?>" data-id="<?=$sale['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="<?=Url::to(['wishlist/add', 'id'=>$sale['id']])?>"><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>
                                                <!--                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <? $count++ ?>
                                <?if($count % 3 == 0 || $count == $i): ?>
                                    </div>
                                <?endif;?>
                            <? endforeach; ?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
                <?endif;?>

            </div>
        </div>
    </div>
</section>