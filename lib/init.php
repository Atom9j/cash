<?
error_reporting(0);

/* режим отладки */
$debug = false;

/* Путь до файла базы данных */
$sqlite_path = __DIR__."/../data/cash.db3";

/* Допустимое время бездействия */
$life_time = ini_get("session.gc_maxlifetime");

if($debug) {
  error_reporting(~E_NOTICE);
}

require_once('error.php');
require_once('db/db.php');
require_once('db/sqlite.php');

$db = new SQLITE_DB("SQLITE", $sqlite_path, NULL, NULL, NULL);
$db->connect();

if((bool)$short) return;

require_once('user.php');
require_once('cash.php');

if($debug) {
  $db->debug = true;
}

$usr = new User($db);
$usr->auth();


$ch = new Cash($db, $usr);
$settings = $ch->getSettings();