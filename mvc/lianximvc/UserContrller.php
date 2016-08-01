<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/18
 * Time: 15:30
 */
header('Conrent-Type:text/html;charset=utf-8');
require 'UserModel.php';
require '10product-model.php';
require_once 'BaseController.php';

class UserController extends BaseController
{
    function add()
    {
        if(empty($_POST))
        {
            require 'UserAdd.html';
        }else{
            UserModel::create()->addUser();
            $this->redirect('UserController.php?type=index','添加成功');
        }
    }
    function update()
    {

    }
}