<?php
namespace WY\app\controller;

use WY\app\libs\Controller;
if (!defined('WY_ROOT')) {
    exit;
}
class main extends Controller
{
    public function index()
    {
		$url = $_SERVER['HTTP_HOST'];

		header("Location: /login");
		exit;
        $this->put('home.php');
	}
}
?>