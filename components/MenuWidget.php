<?php

/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:31
 */
namespace  app\components;
use app\models\Genre;
use yii\base\Widget;
use app\models\Categories;
use app\models\Books;
use app\models\Comics;
use app\models\Souvenirs;
use app\models\Stationery;
use Yii;

class MenuWidget extends Widget{

    public $tpl;
    public $data; // записи категории из бд
    public  $menuHtml;  //  готовый html код в зависимости от шаблона который сохранится в  перменной  tpl
    public function init(){
        parent::init();
        if( $this->tpl == null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function  run(){
        //get cache
        $menu = Yii::$app->cache->get('menu');
        if(!$menu){
            $this->data = Categories::find()->indexBy('id')->joinWith('genre')->asArray()->all();
            $this->menuHtml = $this->getMenuHtml($this->data);
           //set cache
            Yii::$app->cache->set('menu', $this->menuHtml,3600*24);
            return $this->menuHtml;
        }
        else
            return $menu;
        //debug($this->tree);

    }

    protected function  getMenuHtml($data){
        $str = '';
        foreach ($data as $category){

            $str .= $this->catToTemplate($category);


        }
        return $str;

    }
    protected function  catToTemplate($category){
        ob_start();
        include  __DIR__.'/menu_tpl/'.$this->tpl;
        return ob_get_clean();
    }


}