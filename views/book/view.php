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
									<span><?=$book->price ?> ₽</span>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</button>
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
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p><b>Write Your Review</b></p>

                            <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                <textarea name="" ></textarea>
                                <b>Rating: </b> <img src="/images/product-details/rating.png" alt="" />
                                <button type="button" class="btn btn-default pull-right">
                                    Submit
                                </button>
                            </form>
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
