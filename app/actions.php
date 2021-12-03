<?php
if(!isset($_GET["action"]))
	header("refresh:0; url='index.php?action=make';");

if(isset($_GET["action"]))
{
	switch ($_GET["action"]) {
		case 'make':
			require_once("form.php"); 
			break;

		case 'result':
			require_once("post.php");
			break;
		
		default:
			require_once("erro.php");
			break;
	}
}
?>