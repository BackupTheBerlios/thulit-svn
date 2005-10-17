<?php
class module_edit{
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
        $vl = $this->properties['view_level'];
        if (!isSet($vl)){$vl=99;}
        if ($user['user_level']>$vl){
            loginFunction(2);
        }else{
            print_tpl($this);
        }
    }
    static function _display($root, $parent=null,$edit_type=0){
        $_self = new module_edit($root, $parent,$edit_type);
    }
    public function _display_tpl(){
        print_tpl($this);
    }
    private function _prepare(){
        /* Sets up default module template if it's not defined in node properties. */
        if (!IsSet($this->properties["template"])||$this->properties["template"]==""){
            $this->properties["template"]="file:../modules/templates/module.edit.default.tpl";
        }
    }
    public function _call_part($part){
        eval("\$this->".$part."();");
    }
    private function value(){
        global $thulit;
        global $smarty;
        $edit_id = $_GET['edit_id'];
        $parent_id = $_GET['parent_id'];
        $child = get_children_by_id($edit_id);
        $parent = get_children_by_id($parent_id);
        if (isSet($_GET['return'])){$smarty->assign('return',$_GET['return']);}else{$smarty->assign('return','index');}
        require_once($thulit['modules_path'].$thulit['modules_prefix'].$child['node_type'].".php");
        eval("module_".$child['node_type']."::_display(\$child, \$parent, '1');");
    }
}
?>
