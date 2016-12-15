<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Cart;
use app\models\User;
use app\models\Product;
use Yii;

class CommonController extends Controller
{

    protected $actions = ['*'];
    protected $except = [];
    protected $mustlogin = [];
    protected $verbs = [];

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => $this->actions,
                'except' => $this->except,
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => empty($this->mustlogin) ? [] : $this->mustlogin,
                        'roles' => ['?'], // guest
                    ],
                    [
                        'allow' => true,
                        'actions' => empty($this->mustlogin) ? [] : $this->mustlogin,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => $this->verbs,
            ],
        ];
    }


    public function init()
    {
        // 菜单缓存
        $cache = Yii::$app->cache;
        $key = 'menu';
        if (!$menu = $cache->get($key)) {
            $menu = Category::getMenu();
            $cache->set($key, $menu, 3600*2);
        }
        $this->view->params['menu'] = $menu;

        // 购物车缓存
        $key = "cart";
        if (!$data = $cache->get($key)) {
            $data = [];
            $data['products'] = [];
            $total = 0;
            $userid = Yii::$app->user->id;
            $carts = Cart::find()->where('userid = :uid', [':uid' => $userid])->asArray()->all();
            foreach($carts as $k=>$pro) {
                $product = Product::find()->where('productid = :pid', [':pid' => $pro['productid']])->one();
                $data['products'][$k]['cover'] = $product->cover;
                $data['products'][$k]['title'] = $product->title;
                $data['products'][$k]['productnum'] = $pro['productnum'];
                $data['products'][$k]['price'] = $pro['price'];
                $data['products'][$k]['productid'] = $pro['productid'];
                $data['products'][$k]['cartid'] = $pro['cartid'];
                $total += $data['products'][$k]['price'] * $data['products'][$k]['productnum'];
            }
            $data['total'] = $total;
            $dep = new \yii\caching\DbDependency([
                'sql' => 'select max(updatetime) from {{%cart}} where userid = :uid',
                'params' => [':uid' => Yii::$app->user->id],
            ]);
            $cache->set($key, $data, 60, $dep);
        }
        $this->view->params['cart'] = $data;

        $dep = new \yii\caching\DbDependency([
            'sql' => 'select max(updatetime) from {{%product}} where ison = "1"',
        ]);
        // 对商品做查询缓存
        $tui = Product::getDb()->cache(function (){
            return Product::find()->where('istui = "1" and ison = "1"')->orderby('createtime desc')->limit(3)->all();
        }, 60, $dep);
        $new = Product::getDb()->cache(function(){
            return Product::find()->where('ison = "1"')->orderby('createtime desc')->limit(3)->all();
        }, 60, $dep);
        $hot = Product::getDb()->cache(function(){
            return Product::find()->where('ison = "1" and ishot = "1"')->orderby('createtime desc')->limit(3)->all();
        }, 60, $dep);
        $sale = Product::getDb()->cache(function(){
            return Product::find()->where('ison = "1" and issale = "1"')->orderby('createtime desc')->limit(3)->all();
        }, 60, $dep);
        $this->view->params['tui'] = (array)$tui;
        $this->view->params['new'] = (array)$new;
        $this->view->params['hot'] = (array)$hot;
        $this->view->params['sale'] = (array)$sale;
    }
}
