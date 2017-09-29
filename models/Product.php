<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 28.09.2017
 * Time: 18:44
 */

namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        // В таблице product есть поле category_id
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }

}