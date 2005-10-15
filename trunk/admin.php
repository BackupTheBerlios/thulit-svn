<?php
//sending headers fon nocache
header("Cache-control: no-cache");
header("Expires:".gmdate("D, d M Y H:i:s")." GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
//nastavenie ciest
require_once ("include_path.php");
require_once ("config.php");
//require_once ("Var_Dump.php");
require_once ("base.auth_init.php");
require_once ("base.db_init.php");
require_once ("base.smarty_init.php");
require_once ("class.admin_edit.php");
require_once ("class.admin_menu.php");
require_once ("class.admin_children.php");
//require_once ("class.admin_add_children.php");
require_once ("class.admin_node.php");
require_once ("class.admin_data_write.php");
require_once ("FCKeditor/fckeditor.php") ;
//initialization of page time counter
$timer_start=Time()+SubStr(MicroTime(),0,8);
if (isSet($_GET['action']) && $_GET['action'] == "logout" && $a->checkAuth()) {
    $a->logout();
    $a->start();
}

if ($a->checkAuth()) {
    $smarty->assign('title', 'redakcia');
    $smarty->assign('stranka', 'admin');
    $smarty->display('header.tpl');
    if(!isSet($_GET['action'])){$_GET['action']='edit_node';}
    
    switch ($_GET['action']) {
        case "add_child":
            ADMIN_CHILDREN::choose($_GET['node_id']);
            break;
        case "add_node":
            ADMIN_NODE::add_node(0, $_GET['node_type']);
            break;
        case "delete_node":
            ADMIN_NODE::delete_node($_GET['node_id']);
            break;
        case "delete_link":
            ADMIN_CHILDREN::delete_link($_GET['parent_id'], $_GET['node_id'], $_GET['rel_type'], $_GET['sort_order']);
            break;
        case "add_children_submit":
            ADMIN_CHILDREN::add_child($_GET['node_id']);
            break;
        case "edit_node":
            if(isSet($_POST['data_edit'])&&($_POST['data_edit']=='Odeslat')){
                $admin_data_write=new ADMIN_DATA_WRITE($_POST);
                $admin_data_write->write($_GET['edit_id']);
                echo $admin_data_write->saved;
            }
            if(isSet($_GET['edit_id'])){
                $admin_edit=new ADMIN_EDIT($_GET['edit_id']);
                $admin_edit->vypis();
            }
            break;
    }

    //vyrobi menu
    ADMIN_MENU::menu();
    ADMIN_MENU::orphans();

    ADMIN_NODE::choose_to_add(0);

    echo "<div id='logout'><a href='admin.php?action=logout'>Logout</a></div>";
}else{
    loginFunction();
    echo "not logged in<br /><br />";
}
echo "<br /><br /><br /><br /><a href='index.php'>index</a>";

//echo page creation time
echo "<div id='time_value'><br /><br />".SubStr((Time()+SubStr(MicroTime(),0,8)-$timer_start),0,7)."<br /></div>";
$smarty->display('footer.tpl');
?>
