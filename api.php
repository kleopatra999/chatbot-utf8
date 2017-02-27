<?php


require 'config.php';
require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Pe77\ProgramP\ProgramP;
use Pe77\ProgramP\ProgramP\Classes\Response;


// check request type
if(!isset($_REQUEST['requestType'])){
	die();
}	
//

// user id | 把ip当做用户唯一标识
$userId = $_SERVER['REMOTE_ADDR'];

// 若用户上传了uid则用uid当做用户唯一标识
if(isset($_REQUEST['uid'])){
	$userId = $_REQUEST['uid'];
}
//

// ini
$programP = new ProgramP($config);
$bot	  = $programP->GetBot('chatbot');
$user	  = $programP->GetUser($userId);


// talk
if($_REQUEST['requestType'] == 'talk')
{
	$bot->SetProp('name', $config['botInfo']['name']);
	$bot->SetProp('age', $config['botInfo']['age']);
	$bot->SetProp('owner', $config['botInfo']['owner']);
	$bot->SetProp('website', $config['botInfo']['website']);
	$bot->SetProp('version', $config['botInfo']['version']);
	$bot->Save();

	// 确定一个基于用户输入和唯一标识的随机seed,并且初始化随机数发生器
	$seed  = substr(base_convert(md5($userId . $_REQUEST['input']), 16, 10) , -10);
	srand($seed);


	$response = array(
		'status'=>1,
		'message'=>'',
		'data'=>null,
	);

	$response['message'] = $programP->GetResponse($user, $bot, $_REQUEST['input']);

	// 清除换行，空格，制表符
	$response['message'] = trim(preg_replace("/\s+/", " ", $response['message']));

	if($programP->GetData()){
		$response['data'] = $programP->GetData();
	}
	//
	
	header("Content-Type: application/json; charset=utf-8");
	echo json_encode($response);
}


// clear
if($_REQUEST['requestType'] == 'forget')
{
	$user->ClearAllProp();
	echo '1';
}