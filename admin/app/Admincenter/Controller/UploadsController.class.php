<?php

namespace Admincenter\Controller;

use Think\Controller;

class UploadsController extends Controller
{
	public function _initialize()
	{
		header("Content-type: text/html; charset=utf-8");
	}
	function index()
	{
		dump(dirname('../Uploads/'));
	}
	public function upload()
	{
		echo json_encode(array('error' => 1, 'message' => '禁止上传,如有需要请联系技术打开'));
		exit;
		if (!IS_POST) {
			echo json_encode(array('error' => 1, 'message' => '非法操作'));
			exit;
		}
		$allowext = explode('|', $_REQUEST['allowext']);
		$allowpath = trim($_REQUEST['allowpath']);
		$size     = intval($_REQUEST['size']) ? intval($_REQUEST['size']) : 1;
		$upload = new \Think\Upload(); // 实例化上传类
		$upload->maxSize   =     $size * 1024 * 1024; // 设置附件上传大小
		$upload->exts      =     $allowext; // 设置附件上传类型
		if ($allowpath) {
			$upload->rootPath  =     './Uploads/'; // 临时目录
		} else {
			$upload->rootPath  =     RUNTIME_PATH . 'Uploads/'; // 临时目录
		}
		$upload->rootPath  =     '../web/Uploads/';
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		if (!is_dir($upload->rootPath)) mkdir($upload->rootPath, 0755, true);
		// 上传文件 
		$info   =   $upload->upload();
		if (!$info) {
			echo json_encode(array('error' => 1, 'message' => $upload->getError()));
			exit;
		} else {
			//$file_url=trim($upload->rootPath.$info["imgFile"]['savepath'].$info["imgFile"]['savename'],'.');
			$file_url = "/Uploads/" . $info["imgFile"]['savepath'] . $info["imgFile"]['savename'];
			echo json_encode(array('error' => 0, 'url' => $file_url, 'id' => 'list_' . rand(0, 9999)));
			exit;
		}
	}
}
