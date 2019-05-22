<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Cумма</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>

                <td><?=$item['product_name']?></td>
                <td><?=$item['price']?>₽</td>
                <td><?=$item['qty']?></td>
                <td> <?=$item['qty'] * $item['price'] ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Итого: </td>
            <td><?=$session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="3">Итоговая сумма: </td>
            <td><?=$session['cart.sum'] ?>₽</td>
        </tr>

        </tbody>
    </table>
</div>