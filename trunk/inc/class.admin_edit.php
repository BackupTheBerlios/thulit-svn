<?php
class ADMIN_EDIT{

    var $root;
    var $arr;
    var $add_type;
    function ADMIN_EDIT($edit_id='0'){
        if($edit_id!='0'){
            global $db;
            $q   = "select * from data where id='".$edit_id."'";
            $set = $db->query($q);
            if (DB::isError($set)) {
                die($set->getMessage());
            }
            $this->arr = $set->fetchRow();
            if (DB::isError($set)) {
                die($set->getMessage());
            }
        }else{
            $this->arr['id']='0';
            $this->arr['lang']='cz';
            $this->arr['data_type']='text';
            $this->arr['tpl_name']='index.tpl';
            $this->arr['owner']='0';
        }
    }
    function vypis($item='0'){
        global $smarty;
        //Var_Dump::display($this->arr);
        $sBasePath = 'FCKeditor/' ;
        $oFCKeditor = new FCKeditor('data_text') ;
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Height	= '400' ;
//$oFCKeditor->Create() ;
        if (isSet($this->arr['data_text'])){$oFCKeditor->Value = $this->arr['data_text'];}
        if (isSet($this->add_type)){$this->arr['node_type']=$this->add_type;}

	$admin_children = new ADMIN_CHILDREN($this->arr['id']);
        $smarty->register_object("admin_children", $admin_children);
	$admin_children->create();

        $smarty->assign('edit_form_data', $this->arr);
        $smarty->register_object("oFCKeditor",$oFCKeditor);
        $smarty->display('admin_edit_form.tpl');


    }
}
?>



