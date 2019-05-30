<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 22.05.2019
 * Time: 17:26
 */

namespace app\controllers;

use PharIo\Manifest\Url;
use Yii;
use app\models\Wishlist;
use app\models\Products;


class WishlistController extends AppController {

    public function actionAdd($id){
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error','Чтобы добавить книгу в закладки, вы должны быть авторизированы!');
            $this->goBack();
        }
        else{
           $book =  Products::findOne($id);
                $img = $book->getImage();
               $wishlist = new Wishlist();
               $wishlist->product_id = $book->id;
               $wishlist->product_name = $book->product_name;
               $wishlist->author = $book->author;
               $wishlist->price =$book->price;
               $wishlist->img = $img->filePath;
               $wishlist->user_id = Yii::$app->user->identity->getId();
            if($wishlist->save()){
               Yii::$app->session->setFlash('success','Книга успешно добавлена в закладки');
//                return $this->goBack();
                return $this->redirect(Yii::$app->request->referrer);
            }
            else{
                Yii::$app->session->setFlash('error','Упс! Что-то пошло не так! Произшла ошибка! Обратитесь в тех поддержку.');
            }

        }
    }

    public function  actionRemove($id){
        $wishlist = Wishlist::findOne($id);
        $wishlist->delete();
        $user_id = Yii::$app->user->identity->getId();
        $wishlist =  Wishlist::find()->where(['user_id' => $user_id])->all();
        return $this->render('view', compact('wishlist'));
    }

    public function actionView(){
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('success','Авторизируйтесь, чтобы вопспользоваться закладками.');
            return $this->redirect(Yii::$app->request->referrer);
        }
        else{
            $this->setMeta('Закладки | Книжный магазин "Magique Biblio" Diplom by Dmitry Gvozdev');
            $user_id = Yii::$app->user->identity->getId();
            $wishlist =  Wishlist::find()->where(['user_id' => $user_id])->all();
            return $this->render('view', compact('wishlist'));
        }
    }



}