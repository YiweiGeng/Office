<?php
namespace app\index\controller;

class Index {
	public function index() {
		return view('/signin');
	}
	public function sign() {
		return view('/signup');
	}
}
