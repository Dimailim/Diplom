<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<?php if(!empty($session['cart'])): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Обложка</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th><span class = "glyphicon glyphicon-remove" aria-hidden="true"></span> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($session['cart'] as $id => $item): ?>

                    <tr>
                        <td>
                           <a href="<?=Url::to(['book/view', 'id'=> $id])?>"><?= Html::img("@web/images/books/{$item['img']}", ['alt'=> $item['product_name'], 'height' => '50']); ?></a>
                        </td>
                        <td><a href="<?=Url::to(['book/view', 'id'=> $id])?>"><?=$item['product_name']?></a></td>
                        <td><?=$item['price']?>₽</td>
                        <td><?=$item['qty']?></td>
                        <td><span data-id="<?=$id?>" class = "glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                        <?php endforeach; ?>
                        <tr>
                        <td colspan="4">Итого: </td>
                            <td><?=$session['cart.qty']?></td>
                        </tr>
                    <tr>
                        <td colspan="4">Cумма: </td>
                        <td><?=$session['cart.sum'] ?>₽</td>
                    </tr>

                    </tbody>
                </table>
            </div>
    <?php else: ?>
    <p> Корзина пуста </p>
<?php endif; ?>
