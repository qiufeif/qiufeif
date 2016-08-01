<?php
/**
 * 传智博客：高端PHP培训
 * 网站：http://www.itcast.cn
 */
header('Content-Type:text/html;charset=utf-8');
require 'UserModel.php';
require '10product-model.php';
require_once 'BaseController.php';

class UserController extends BaseController
{
    function add()
    {
        if (empty($_POST)) {
            // 显示添加用户的表单
            require 'UserAdd.html';
        } else {
            // 将新用户保存到数据库中
            UserModel::create()->addUser();
            $this->redirect('UserController.php?type=index', '添加成功');
        }
    }

    function delete()
    {
        $id = $_GET['id'];
        UserModel::create()->deleteUserById($id);
        $this->redirect('UserController.php?type=index', '删除成功');
    }

    function update()
    {
        if (empty($_POST)) {
            $id = $_GET['id'];
            $user = UserModel::create()->getUserById($id);
            require 'UserUpdate.html';
        } else {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $mobileNumber = $_POST['mobile_number'];
            UserModel::create()->updateUser($id, $name, $nickname, $email, $mobileNumber);
            $this->redirect('UserController.php?type=index', '修改成功');
        }
    }

    function index()
    {
        $users = UserModel::create()->getUsers();
        require 'UserList.html';
    }
}

$obj = new UserController();
$type = $_GET['type'];
$obj->$type();// type=index => index(), type=delete => delete(), type=add => add(), type=update => update()







