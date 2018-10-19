<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 21:53
 */

namespace app\controllers;


use app\models\ContactForm;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use yii\web\Controller;

class TaskController extends Controller
{
//    public $layout = 'new';

    public function actionIndex() {


        $tasks = Tasks::getTasksCurrentMonth();

        var_dump($tasks);

//        var_dump(\Yii::$app->request->get('id'));
//        var_dump('55');

//        $model = new Test();
//        $model->title = 'new';
//        var_dump($model->validate());
//        var_dump($model->getErrors());
//        exit;

//        return $this->render('index', [
//            'title' => 'Yii2',
//            'content' => 'test'
//        ]);

//        Without layout
//        return $this->renderPartial('index', [
//            'title' => 'Yii2',
//            'content' => 'test'
//        ]);
    }

    public function actionTest() {
//        \Yii::$app->db->createCommand("
//             INSERT INTO test(name, content, created) VALUES
//                ('name1', 'content1', NOW()),
//                ('name2', 'content2', NOW()),
//                ('name3', 'content3', NOW())
//         ")->execute();

//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test
//        ")->queryAll();

//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test WHERE id = 1
//        ")->queryOne();

//        $res = \Yii::$app->db->createCommand("
//            SELECT id FROM test
//        ")->queryColumn();

//        $res = \Yii::$app->db->createCommand("
//           SELECT COUNT(*) FROM test
//        ")->queryScalar();

//        $id = 1;
//        $res = \Yii::$app->db->createCommand("
//            SELECT * FROM test WHERE id = :id
//        ")
//            ->bindParam(':id', $id)
//            ->queryAll();
//        var_dump($res);

//        Create data
//        $user = new Users();
//        $user->login = 'Deny';
//        $user->password = md5('1');
//        $user->role = 1;
//
//        $user->save();

//        Read data: find PrimaryKey
//        $user = Users::findOne(1);
//        var_dump($user);
//        $user1 = Users::findOne(['login' => 'admin']);
//        var_dump($user1);
//        $users = Users::findAll([1, 2]);
//        var_dump($users);
//        $users = Users::find()->all();
//        var_dump($users);

//        Change data
//        $user = Users::findOne(1);

//        For new record after found data
//        $user->isNewRecord = true;
//        For autoincrement
//        $user->id = null

//        $user->login = 'admin_new';
//        $user->save();

//        Delete data
//        $user = Users::findOne(1);
//        $user->delete();

//        Users::deleteAll(['login' => 'admin']);
//        Users::deleteAll('id' > 3);
//        Users::deleteAll(['>', 'id', 3]);

//        var_dump(Users::find()
//            ->select('id', 'login')
//            ->where('<', 'id', 3)
//        );

//        For portions
//        var_dump(Users::find()->batch(1000));


//        New property
//        $user = Users::findOne(2);
//        var_dump($user->address);

//        $user = Users::findOne(2);
//        var_dump($user->role);

//        $user = Users::getUserWithRole(2);
//
//        var_dump($user);



    }

}