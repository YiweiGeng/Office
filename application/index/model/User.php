<?php
namespace app\index\model;

use think\Model;

class User extends Model {
	public function check($attr, $val) {
		$user = User::where($attr, $val)->select();
		return $user;
	}

	public function signup($email, $pwd) {
		$user = model('User');
		$user->email = $email;
		$user->pwd = MD5($pwd);
		$user->save();
		return $user;
	}

	public function signin($email, $pwd) {
		$user = model('User');
		$res = $user->where('email', $email)->where('pwd', MD5($pwd))->find();
		return $res;
	}
}