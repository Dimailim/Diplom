<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 12.05.2019
 * Time: 22:54
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


        public function  addToCart($product,$qty = 1){
            $img = $product->getImage();
//            echo "Worked";
            if(isset($_SESSION['cart'][$product->id])){
                $_SESSION['cart'][$product->id]['qty'] += $qty;
            }else{
                $_SESSION['cart'][$product->id] = [
                    'qty' => $qty,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'img' => $img->filePath,
                ];
            }
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
        }

        public function recalc($id){
            if(!isset($_SESSION['cart'][$id])){
               return false;
            }
            else{
                $qtyMinus = $_SESSION['cart'][$id]['qty'];
                $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
                $_SESSION['cart.qty'] -= $qtyMinus;
                $_SESSION['cart.sum'] -= $sumMinus;
                unset($_SESSION['cart'][$id]);

            }
        }
        public static function tableName()
        {
            return 'cart';
        }
         public function getUser(){

        }


}