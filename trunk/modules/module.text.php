<?php
class module_text{
    var $parent;
    var $properties;
    public function __construct($node,$parent=null,$edit_type=0){
        global $a;
        global $user;
        $this->parent=$parent;
        if (isSet($parent)){$this->properties=$parent->properties;}
        load_properties($node,$this);
        $this->_prepare();
        //$this->display_tpl();
        if ($edit_type == 0){   //display node
            $vl = $this->properties['view_level'];
            if (!isSet($vl)){$vl=99;}
            if ($user['user_level']>$vl){
            loginFunction(2);
            }else{
            print_tpl($this);
            }
        }elseif($edit_type>0){  //editing node
            $el = $this->properties['edit_level'];
            if (!isSet($el)){$el=99;}
            if ($user['user_level']<=$el){
            $this->edit_text();
            }else{
            loginFunction(2);
            }
        }elseif($edit_type<0){  //saving changes
            $el = $this->properties['edit_level'];
            if (!isSet($el)){$el=99;}
            if ($user['user_level']<=$el){
            $this->save_text();
            }else{
            loginFunction(2);
            }
        }
    }
    static function _display($root,$parent=null,$edit_type=0){
        $_self = new module_text($root,$parent,$edit_type);
    }
    static function _save($edit_id){
        $node = get_children_by_id($edit_id);
        $_self = new module_text($node,null,'-1');

    }
    public function _display_tpl(){
        print_tpl($this);
    }
    public function _call_part($part){
        $this->display();
    }
    private function _prepare(){
        /* Sets up default module template if it's not defined in node properties. */
        if (!IsSet($this->properties["template"])||$this->properties["template"]==""){
            $this->properties["template"]="file:../modules/templates/module.text.default.tpl";
        }
    }
    private function display(){
        echo get_value($this->properties['id']);
    }
    private function save_text(){
        global $thulit;
        if ( !isSet($lang) && isSet($thulit['lang']) ){$lang=$thulit['lang'];}
        if ( !isSet($lang) ){$lang=$thulit['default_lang'];}
        $set = db_get("select * from data left join relation on id=child_id where parent_id='".$_POST['node_id']."' and (lang like '%".$lang."%' or lang='' or lang is null) order by sort_order");
        if ($arr = $set->fetchRow()){
            $set = db_get("update data set data_text='".addslashes($_POST['value'])."' where id='".$arr['id']."'");
        }
    }
    private function edit_text(){
        global $smarty;
        $value = get_value($this->properties['id']);

        $sBasePath = '/FCKeditor/' ;
        $oFCKeditor = new FCKeditor('value') ;
        $oFCKeditor->BasePath   = $sBasePath ;
        $oFCKeditor->Height = '400' ;
        //$oFCKeditor->Create() ;
        if (isSet($value)){$oFCKeditor->Value = $value;}
        //if (isSet($this->add_type)){$this->arr['node_type']=$this->add_type;}

        //$smarty->assign('edit_form_data', $this->arr);
        $smarty->register_object("oFCKeditor",$oFCKeditor);
        //$smarty->display('admin_edit_form.tpl');

        $smarty->assign('_edit_value',$value);
        $smarty->assign('_edit_prop',$this->properties);
        $smarty->display("db:_text_edit_1");
    }
}
?>
