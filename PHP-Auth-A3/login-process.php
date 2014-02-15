<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;

$session = new Session();
$session->start();	
$request = Request::createFromGlobals();

if($session->get('username'))
{
	$response = new RedirectResponse('dashboard.php');
	$response->send();
}
else
{
	$auth = new ITP\Auth($pdo);

	if($auth->attempt($request->get('username'),$request->get('password')) == false)
	{ 
		$session->getFlashBag()->add('error','Incorrect Credentials');
		$response = new RedirectResponse('login.php');
	}
	else
	{				
		$session->getFlashBag()->add('alert','You have successfully logged in!');
		$session->set('username',$request->get('username'));
		$session->set('email',$session->get('email'));
		$session->set('loginTime',Carbon::now());
		$response = new RedirectResponse('dashboard.php');
	}
	$response->send();
}
?>