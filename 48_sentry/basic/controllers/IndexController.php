<?php
namespace app\controllers;

use app\controllers\CommonController;
use app\models\Product;
use Yii;

class IndexController extends CommonController
{
    protected $except = ['index'];

    public function actionIndex()
    {
        //Yii::info('this is info', 'myinfo');
        Yii::warning('this is warning');
        //Yii::info('this is trace');
        //Yii::beginProfile('mybench');
        $this->layout = "layout1";
        $data['tui'] = Product::find()->where('istui = "1" and ison = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['new'] = Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['hot'] = Product::find()->where('ison = "1" and ishot = "1"')->orderby('createtime desc')->limit(4)->all();
        $data['all'] = Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(7)->all();
        //Yii::endProfile('mybench');
        return $this->render("index", ['data' => $data]);
    }

    public function actionError()
    {
        echo "404";exit;
    }


}
