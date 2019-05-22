<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$name = Yii::$app->user->identity->name;
$email = Yii::$app->user->identity->email;
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
                <ul class="catalog category-products"><?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?></ul>
<!--                <div class="shipping text-center"><!--shipping-->
<!--                    <img src="/images/home/shipping.jpg" alt="" />-->
<!--                </div><!--/shipping-->

            </div>
        </div>
        <?php //debug($book->genre->categories->name_category); //  продумать релизацию навигационная панель.  ?>
        <p><a href="<?=Url::home()?>">Главная</a><?=Html::img('@web/images/product-details/arrow_left.png')?><?=$book->genre->categories->name_category?><?=Html::img('@web/images/product-details/arrow_left.png')?><a href="<?=Url::to(['category/view','id' => $book->genre->id]) ?>"><?=$book->genre->genre_name?></a><?=Html::img('@web/images/product-details/arrow_left.png')?><?=$book->product_name?></p>
        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
<!--                        <img src="/images/product-details/1.jpg" alt="" />-->
                        <?=Html::img("@web/images/books/{$book->img}") ?>
<!--                        <h3>ZOOM</h3>-->
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <?php if($book['new']): ?>
                            <?= Html::img("@web/images/home/new.png", ['alt'=> 'New', 'class' => 'newarrival']); ?>
                        <?php endif; ?>
                        <?php if ($book['sale']): ?>
                            <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Sale', 'class' => 'newarrival']); ?>
                        <?php endif;?>
<!--                        <p> <img src="/images/product-details/rating.png" alt="" /></p>-->
                        <h2><?=$book->product_name?></h2>

                        <p><b>Автор: </b> <?=$book->author ?></p>
                        <p><b>Жанр: </b><a href="<?=Url::to(['category/view','id' => $book->genre->id]) ?>"> <?=$book->genre->genre_name?></a></p>
                        <p><b>Издатель: </b> <?=$book->publisher ?></p>
                        <p><b>Год издания: </b> <?=$book->year_of_publishing ?></p>
                        <p><b>Количество страниц: </b> <?=$book->pages?></p>
                        <p><b>Возрастные ограничения:</b> <?=$book->age ?></p>
                        <span>
                                    <input type="number" value="1" min="1" id="qty">
									<span><?=$book->price ?> ₽</span>
									<a href="<?=Url::to(['cart/add', 'id' => $book->id]) ?>" data-id="<?=$book->id?>" class="btn btn-default cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</a>
                                    <a href="<?=Url::to(['wishlist/add', 'id' =>$book->id])?>" class="btn btn-default"> Добавить в закладки</a>
								</span>

                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->

            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#details" data-toggle="tab">Аннотация</a></li>
                        <li ><a href="#reviews" data-toggle="tab">Отзывы</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="details" >
                        <div class="col-sm-12">

                            <p><?=$book->content ?></p>

                        </div>
                    </div>

                    <div class="tab-pane fade " id="reviews" >

                        <div class="col-sm-12">
                            <? if(!empty($res)):?>
                                <? foreach ( $res as $msg):?>
                            <ul>
                                <li><i class="fa fa-user"></i> <?=$msg->name;?></li>
                                <li><i class="fa fa-clock-o"></i> <?=$msg->time;?></li>
                                <li><i class="fa fa-calendar-o"></i> <?=$msg->data;?></li>
                            </ul>
                            <p><?=$msg->comment;?></p>
                                <?endforeach;?>
                            <? else:?>
                            <p>Отзывов пока что нет...  Будь первым!</p>
                            <?endif;?>
                            <p><b>Напишите свой отзыв</b></p>
                            <? if(Yii::$app->user->isGuest):?>
                            <?php $form = ActiveForm::begin(); ?>
                            <span>
                                <?=$form->field($review,'name')->textInput()->input('name',['placeholder'=>'Ваше имя'])->label(false); ?>
                                <?=$form->field($review,'email')->textInput()->input('email',['placeholder' => 'Ваш E-mail'])->label(false); ?>
                            </span>
                                <?=$form->field($review,'comment')->textarea()->label(false); ?>
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default pull-right']); ?>

                            <?php ActiveForm::end(); ?>
                            <?else:?>
                            <?php $form = ActiveForm::begin(); ?>
                            <span>
                                <?=$form->field($review,'name')->hiddenInput(['value' => $name])->label(false); ?>
                                <?=$form->field($review,'email')->hiddenInput(['value' => $email])->label(false); ?>
                            </span>
                            <?=$form->field($review,'comment')->textarea()->label(false); ?>
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-default pull-right']); ?>

                            <?php ActiveForm::end(); ?>
                            <?endif;?>

<!--                            <form action="#">-->
<!--										<span>-->
<!--											<input type="text" placeholder="Your Name"/>-->
<!--											<input type="email" placeholder="Email Address"/>-->
<!--										</span>-->
<!--                                <textarea name="" ></textarea>-->
<!--                                <button type="button" class="btn btn-default pull-right">-->
<!--                                    Submit-->
<!--                                </button>-->
<!--                            </form>-->
                        </div>
                    </div>

                </div>
            </div><!--/category-tab-->
            <? if(!empty($hits)): ?>
            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">Популярные книги</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <? $count = 0; $i = count($hits) ?>
                        <? foreach ($hits as $hit): ?>

                        <?if($count % 3 == 0): ?>
                        <div class="item <? if($count == 0){ echo "active"; } ?>">
                        <?endif;?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
<!--                                            <img src="/images/home/recommend1.jpg" alt="" />-->
                                            <a href="<?=Url::to(['book/view', 'id' => $hit['id']]);?>"><?=Html::img("@web/images/books/{$hit['img']}",['alt' => $hit['product_name']]);?></a>
                                            <h2><?=$hit['price']?> ₽ </h2>
                                            <p><a href="<?=Url::to(['book/view', 'id' => $hit['id']]);?>"> <?=$hit['product_name'];?></a></p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="<?=Url::to(['wishlist/add', 'id'=>$product['id']])?>"><i class="fa fa-plus-square"></i>Добавить в закладки</a></li>
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
