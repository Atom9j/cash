<?
require_once("../lib/init.php");
require_once("../lib/plan.php");

$plan = new Plan($db, $usr);
echo json_encode( $plan->getList() );
?>

