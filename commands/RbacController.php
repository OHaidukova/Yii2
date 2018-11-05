<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/11/2018
 * Time: 15:34
 */

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex() {
        $am = \Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $manager = $am->createRole('manager');

        $am->add($admin);
        $am->add($manager);

        $permissionCreate = $am->createPermission("createTask");
        $permissionDelete = $am->createPermission("deleteTask");
        $permissionViewTask = $am->createPermission("viewTask");
        $permissionViewTasks = $am->createPermission("viewTasks");
        $permissionUpdate = $am->createPermission("updateTask");

        $am->add($permissionCreate);
        $am->add($permissionDelete);
        $am->add($permissionViewTask);
        $am->add($permissionViewTasks);
        $am->add($permissionUpdate);

        $am->addChild($admin, $permissionCreate);
        $am->addChild($admin, $permissionDelete);
        $am->addChild($admin, $permissionViewTask);
        $am->addChild($admin, $permissionViewTasks);
        $am->addChild($admin, $permissionUpdate);
        $am->addChild($manager, $permissionCreate);
        $am->addChild($manager, $permissionViewTask);
        $am->addChild($manager, $permissionViewTasks);

        $am->assign($admin, 1);
        $am->assign($manager, 2);
    }
}