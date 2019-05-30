<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

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
                    <h2>Категория</h2>
                    <ul class="catalog category-products"><?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?></ul><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.png" alt="" />
                    </div><!--/shipping-->


                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?=$genre->genre_name?></h2>
                    <?php if(!empty($products)):?>
                    <? foreach ($products as $product):?>
                            <? $img = $product->getImage(); ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"> <?= Html::img("@web/images/books/{$img->filePath}", ['alt'=> $product['product_name']]); ?></a>
                                            <h2><?= $product['price']; ?> ₽</h2>
                                            <p><a href ="<?=Url::to(['book/view', 'id' => $product['id']])  ?>"><?=$product['product_name'] ?></a></p>
                                            <a href="<?=Url::to(['cart/add', 'id' => $product['id']]) ?>" data-id="<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
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
                                            <li><a href="<?=Url::to(['wishlist/add', 'id'=>$product['id']])?>"><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>
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