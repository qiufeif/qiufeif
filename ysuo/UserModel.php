<?php
require_once 'MySQLDB.class.php';
require_once 'BaseModel.php';
class UserModel extends BaseModel{
public function gerUsers(){
	$sql = "SELECT * FROM `user` WHERE 2>1";
	return $this->db->getRows($sql);
}	
public function deleteUserById($id){
	$sql="DELETE FROM `user` WHERE id='{$id}'";
	return $this->db->exec($sql);
}
public function addUser(){
	$registerTime = time();
	$sql = "INSERT INTO `user`
	(`name`,`nickname`,`email`,`mobile_number`,`register_time`)
	VALUES('{$_POST['name']}','{$_POST['nickname']}','{$_POST['email']}',
	'{$_POST['mobile_number']}','{$registerTime}')";
	return $this->db->exec($sql);
}
public function updateUser($id,$name,$nickname,$email,$mobileNumber){
	$sql = "UPDATE `user`
	SET name='{name}',nickname='{$nickname}',email='{$email}',mobile_number='{$nobileNumber}'
	WHERE id='{$id}'";
	return $this->db->exec($sql);
}
public function gerUserById($id){
	$sql = "SELECT* FROM `user` WHERE id='{$id}' ";
	return $this->db->GetOneRow($sql);
}
}