<?php
define('PHPWG_ROOT_PATH', '../../../');
include(PHPWG_ROOT_PATH . 'include/common.inc.php');

defined('EASYCAPTCHA_PATH') or die('Hacking attempt!');

if (isset($_GET['admin']))
{
  is_admin() or die('Hacking attempt!');
  
  $conf['EasyCaptcha']['tictac'] = array_merge($conf['EasyCaptcha']['tictac'], $_GET);
}

include_once(EASYCAPTCHA_PATH . 'include/functions.inc.php');
include_once(EASYCAPTCHA_PATH . 'tictac/CaptchaTictac.class.php');

$captcha = new CaptchaTicTac();

$captcha->generate(isset($_GET['cross']) ? intval($_GET['cross']) : 0, isset($_GET['admin']));
