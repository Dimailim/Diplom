<?php
/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 03.05.2019
 * Time: 20:54
 */

namespace app\controllers;
use app\models\Categories;
use app\models\Genre;
use app\models\Products;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController{

    public function  actionIndex(){ //действие по умолчанию
        $hits = Products::find()->where(['hit' => 1])->limit(6)->all();
        //debug($hits);thunder

        $this->setMeta('Magique biblio - книжный интернет-магазин. Diplom by Dmitry Gvozdev');
        return $this->render('index',compact('hits'));
    }
    public function actionView($id){
//        $id = Yii::$app->request->get('id');  // второй способ через массив  get
        $genre = Genre::findOne($id);
        if(empty($genre)){
            throw new HttpException(404, 'Запрошенная категория не найдена');
        }
//        $products = Products::find()->where(['genre_id' => $id ])->all();
        $pages = Products::find()->where(['genre_id' => $id ]);
        $page = new Pagination(['totalCount'=> $pages->count(), 'pageSize'=> 9,'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $pages->offset($page->offset)->limit($page->limit)->all();
        $this->setMeta('Magique biblio | '.$genre['genre_name'],$genre['keyword'],$genre['description']);
        //debug($genre);
        return $this->render('view',compact('products','genre', 'page'));
    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if(!$q){
            $this->setMeta('Magique biblio - книжный интернет-магазин. Diplom by Dmitry Gvozdev');
            $hits = Products::find()->where(['hit' => 1])->limit(6)->all();
            return $this->render('index',compact('hits'));
        }
//        $query = Products::find()->where(['like','product_name',$q]);
        $query = Products::find()->andWhere(['like','product_name',$q])->orWhere(['like','author',$q])->orWhere(['like','publisher',$q])->orWhere(['like','content',$q]);
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=> 9,'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Поиск: '.$q);
        return $this->render('search',compact('products','pages', 'q'));
    }
    public function actionAsearch(){
        $this->setMeta('Расширенный поиск');
        $search = trim(Yii::$app->request->get('search'));
        $c = Yii::$app->request->get('c');
        $min = Yii::$app->request->get('min');
        $min = Yii::$app->request->get('max');
        switch ($c){
            case 'publisher':
                $name = 'публикации';
                $query = Products::find()->where(['like','publisher',$search]);
                break;
            case 'product_name':
                $name = 'названию';
                $query = Products::find()->where(['like','product_name',$search]);
                break;
            case 'author':
                $name = 'автору';
                $query = Products::find()->where(['like','author',$search]);
                break;
            case 'annotation':
                $name = 'описанию';
                $query = Products::find()->where(['like','content',$search]);
                break;
            case 'new':
                $name = 'новинкам';
                $search = ".";
                $query = Products::find()->where(['like', 'new', 1]);
                break;
            case 'sale':
                $name = "скидкам";
                $search = ".";
                $query = Products::find()->where(['like','sale',1]);
                break;
            default:
                $name = 'названию';
                $query = Products::find()->where(['like','product_name',$search]);
                break;

        }
        if(!$search){
            return $this->render('advancesearch');
        }
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=> 9,'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('advancesearch', compact('products','pages','search','c','name'));
    }

}