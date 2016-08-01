<?php
header('Content-Type:text/html;charset=utf-8');
require'UserModel.php';
require'10product-model.php';
class UserController  extends BaseController{
	function add(){
		if (empty($_POST)) {
			require'UserAdd.html';
		}else{
			UserModel::create()->addUser();
			$this->redirect('UserController.php?type=index','添加成功');
		}
	}
	function delete(){
		$id = $_GET['id'];
		UserModel::create()->deleteUserById($id);
		$this->redirect('UserController.php ? type=index','删除成功');
	}
	function update(){
		if (empty($_POST)) {
			$id = $_GET['id'];
			$user = UserModel::create()->getUserById($id);
			require'UserUpdate.html';	
		}else{
			$id=$_GET['id'];
			$name = $_POST['name'];
			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$mobilNumber=$_POST['mobile_number'];
			UserModel::create()->updateUser($id,$name,$nickname,$email,$mobilNumber);
			$this->redirect('UserController.php?type=index','修改成功');
		}
	}
	function index(){
		$users=UserModel::create()->getUsers();
		require 'UserList.html';
	}
}
$obj = new UserController();
$type = $_GET['type'];
$obj->$type();