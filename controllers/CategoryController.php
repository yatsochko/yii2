<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 28.09.2017
 * Time: 21:05
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;


class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id'); //ÍÀÔÈÃÀ? õç..

//        $products = Product::find()->where(['category_id' => $id])->limit(3)->all();

        $category = Category::findOne($id);

        $query = Product::find()->where(['category_id' => $id]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'pages', 'category'));
    }

}