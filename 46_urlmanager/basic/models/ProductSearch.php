<?php
namespace app\models;

use yii\elasticsearch\ActiveRecord;

class ProductSearch extends ActiveRecord
{
    public function attributes()
    {
        return ["productid", "title", "descr"];
    }

    public static function index()
    {
        return "imooc_shop";
    }

    public static function type()
    {
        return "products";
    }

}
