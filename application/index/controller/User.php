<?php
namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Session;

class User extends Controller {
	public function check() {
		$attr = input('attr');
		$val = input('val');
		return Model('User')->check($attr, $val);
	}

	public function signup() {
		$email = input('post.email');
		$pwd = input('post.pwd');
		return model('User')->signup($email, $pwd)->toJson();
	}

	public function signin() {
		$email = input('email');
		$pwd = input('pwd');
		$res = model('User')->signin($email, $pwd);
		if ($res) {
			session('user', $res);
			$this->success('登录系统成功', '/');
		} else {
			$this->error('登录系统失败，请检查相关信息');
		}
	}
}