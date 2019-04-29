<?php

/**
 * Created by PhpStorm.
 * User: Dimailim
 * Date: 24.04.2019
 * Time: 23:31
 */
namespace  app\components;
use yii\base\Widget;
use app\models\Categories;
use app\models\Books;
use app\models\Comics;
use app\models\Souvenirs;
use app\models\Stationery;

class MenuWidget extends Widget{

    public $tpl;
    public $data; // записи категории из бд
    public $tree; // из обычного массива, массив дерева.
    public  $menuHtml;  //  готовый html код в зависимости от шаблона который сохранится в  перменной  tpl
    public function init(){
        parent::init();
        if( $this->tpl == null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function  run(){
        $this->data = Categories::find()->indexBy('id')->joinWith('books')->joinWith('comics')->joinWith('souvenirs')->joinWith('stationery')->asArray()->all();
        $this->tree =$this->getTree();

        debug($this->data);
        return $this->tpl;
    }

    protected function getTree(){
        $tree = [];
//        foreach ($this->data as $id=>&$node) {
//            if
//            $tree[$id] = &$node;
//               foreach($this->dataBooks as $is=>&$node ){
//                   $this->dataBooks[$node['parent_id']]['childs']= &$node;
//               }
//        }
    }
}