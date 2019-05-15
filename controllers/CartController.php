<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 12.05.2019
 * Time: 22:33
 */

namespace app\controllers;
use Yii;
use app\models\Products;
use app\models\Cart;



class CartController extends AppController{
    public function actionAdd(){
        if(Yii::$app->user->isGuest) {
            $id = Yii::$app->request->get('id');
            $qty = (int)Yii::$app->request->get('qty');
            $qty = !$qty ? 1 : $qty;
            $product = Products::findOne($id);
            if (empty($product)) {
                return false;
            }
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product, $qty);
            if(!Yii::$app->request->isAjax){
                return $this->redirect(Yii::$app->request->referrer);
            }
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        }
        else{
            $id = Yii::$app->request->get('id');
            $product = Products::findOne($id);
            if (empty($product)) {
                return false;
            }
        }

    }
    public function actionClear(){
        if(Yii::$app->user->isGuest) {
            $session = Yii::$app->session;
            $session->open();
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));

        }
    }
    public function actionDelete(){
        if(Yii::$app->user->isGuest) {
            $id = Yii::$app->request->get('id');
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->recalc($id);
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        }
    }
    public function  actionShow(){
        if(Yii::$app->user->isGuest) {
            $id = Yii::$app->request->get('id');
            $session = Yii::$app->session;
            $session->open();
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        }
    }
    public function  actionView(){
        return $this->render('view');
    }
}