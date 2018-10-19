<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/10/2018
 * Time: 22:02
 */

namespace app\widgets;


use yii\base\Widget;

class MyWidget extends Widget
{
    public $content = 'CONTENT';

    public function init() {

    }

    public function run() {
        return $this->render("my", ['content' => $this->content]);
    }
}