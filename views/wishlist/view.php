<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<section id="cart_items">

    <div class="container">
        <?php if(!empty($wishlist)):?>

        <div class=" cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Название</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td ></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
            <?php foreach ($wishlist as $item):?>
                <? $img = $item->getImage(); ?>
                <tr>
                    <td class="cart_product">
<!--                        <a href=""><img src="images/cart/one.png" alt=""></a>-->
                        <?=Html::img("@web/images/books/{$item['img']}", ['alt'=> $item['product_name'], 'height' => '120']);?>
                    </td>
                    <td class="cart_description">
                        <h4><a href="<?=Url::to(['book/view','id' => $item['product_id']])?>"><?=$item['product_name']?></a></h4>
                        <p><?=$item['author']?></p>
                    </td>
                    <td class="cart_price">
                        <p><?=$item['price']?> ₽</p>
                    </td>

                    <td class="quantity">
                        <a class="btn btn-primary add-to-cart" data-id="<?=$item['product_id']?>" href=""><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                    </td>

                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="<?=Url::to(['wishlist/remove', 'id' => $item['id']])?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <? endforeach; ?>

                </tbody>
            </table>
        </div>
        <? else: ?>
    <p>Cписок пуст</p>
        <?endif;?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</section> <!--/#cart_items-->