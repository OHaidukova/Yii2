<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 23:40
 */

namespace app\models;


use yii\base\Model;

class Test extends Model
{
    public $title;
    public $content;

    public function rules() {

        return [
            [['title'], 'myValidate']
        ];
    }

    public function myValidate($attr, $params) {
        if($this->$attr != 'new') {
            $this->addError($attr, 'Name is different');
        }
    }
}