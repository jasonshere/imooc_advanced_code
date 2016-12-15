<?php
namespace app\controllers;

use app\controllers\CommonController;
use Yii;
use app\models\Product;
use yii\data\Pagination;
use app\models\ProductSearch;

class ProductController extends CommonController
{
    protected $except = ['index', 'detail'];

    public function actionIndex()
    {
        $this->layout = "layout2";
        $cid = Yii::$app->request->get("cateid");
        $where = "cateid = :cid and ison = '1'";
        $params = [':cid' => $cid];
        $model = Product::find()->where($where, $params);
        $all = $model->asArray()->all();
        
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['frontproduct'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $all = $model->offset($pager->offset)->limit($pager->limit)->asArray()->all();

        $tui = $model->Where($where . ' and istui = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        $hot = $model->Where($where . ' and ishot = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        $sale = $model->Where($where . ' and issale = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        return $this->render("index", ['sale' => $sale, 'tui' => $tui, 'hot' => $hot, 'all' => $all, 'pager' => $pager, 'count' => $count]);
    }

    public function actionDetail()
    {
        $this->layout = "layout2";
        $productid = Yii::$app->request->get("productid");
        $product = Product::find()->where('productid = :id', [':id' => $productid])->asArray()->one();
        $data['all'] = Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(7)->all();
        return $this->render("detail", ['product' => $product, 'data' => $data]);
    }

    public function actionSearch()
    {
        $this->layout = "layout2";
        $keyword = htmlspecialchars(Yii::$app->request->get("keyword"));
        $highlight = [
            "pre_tags" => ["<em>"],
            "post_tags" => ["</em>"],
            "fields" => [
                "title" => new \stdClass(),
                "descr" => new \stdClass()
            ]
        ];
        $searchModel = ProductSearch::find()->query([
            "multi_match" => [
                "query" => $keyword,
                "fields" => ["title", "descr"]
            ],
        ]);
        $count = $searchModel->count();
        $pageSize = Yii::$app->params['pageSize']['frontproduct'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $res = $searchModel->highlight($highlight)->offset($pager->offset)->limit($pager->limit)->all();
        $products = [];
        foreach ($res as $result) {
            $product = Product::findOne($result->productid);
            $product->title = !empty($result->highlight['title'][0]) ? $result->highlight['title'][0] : $product->title;
            $product->descr = !empty($result->highlight['descr'][0]) ? $result->highlight['descr'][0] : $product->descr;
            $products[] = $product;
        }
        $model = Product::find();
        $where = "ison = '1'";
        $tui = $model->Where($where . ' and istui = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        $hot = $model->Where($where . ' and ishot = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        $sale = $model->Where($where . ' and issale = \'1\'', $params)->orderby('createtime desc')->limit(5)->asArray()->all();
        return $this->render('index', ['sale' => $sale, 'tui' => $tui, 'hot' => $hot, 'all' => $products, 'pager' => $pager, 'count' => $count]);
    }









}
