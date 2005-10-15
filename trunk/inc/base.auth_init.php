<?php
require_once ("Auth.php");
function loginFunction($type=0,$return=null)
{
    global $lang;
    global $auth_displayed;
    /**
     * Change the HTML output so that it fits to your
     * application.
    */
    if ($auth_displayed>0){return;}
    $auth_displayed++;
    if ($type==0){
	echo "<div class='login_form'><form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
	echo "<label> login: </label><input type=\"text\" name=\"username\">";
	echo "<label> password: </label><input type=\"password\" name=\"password\">";
	echo "<input type=\"submit\" value='Send'>";
        echo "</form></div>";
    }elseif($type==1){
	echo "Not logged in on you don't have enough permissions to view this page. <br />Please <a href='/".$_GET['lang']."/login".$return."'>login</a>";
    }else{
	echo "<div class='login_form'><form method=\"post\" action=\"" . $_GET['return'] . "\">";
	echo "<input type=\"text\" name=\"username\">";
	echo "<input type=\"password\" name=\"password\">";
	echo "<input type=\"submit\">";
        echo "</form></div>";
    }
}
$auth_displayed = 0;
//$dsnauth = "mysql://user:password@localhost/database";
$a = new Auth("DB", $dsnauth, "loginFunction",false);

$a->start();

?>
