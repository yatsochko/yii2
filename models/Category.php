<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 28.09.2017
 * Time: 18:44
 */

namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        // В таблице product есть поле category_id
        return $this->hasMany(Product::className(),['category_id' => 'id']);
    }

}