<?php

namespace Api\Controller;

use Think\Controller;

class IndexController extends Controller
{
	public function _initialize()
	{
		header("Content-type: text/html; charset=utf-8");
	}
	protected $allowMethodList =    array('index', 'test2');
	function index($param = array())
	{
		
	}
}
