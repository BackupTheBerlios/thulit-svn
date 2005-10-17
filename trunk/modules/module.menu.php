<?php
class module_menu{
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
        $_self = new module_menu($root, $parent,$edit_type);
    }
    public function _display_tpl(){
    print_tpl($this);
    }
    private function _prepare(){
        /* Sets up default module template if it's not defined in node properties. */
        if (!IsSet($this->properties["template"])||$this->properties["template"]==""){
            $this->properties["template"]="file:../modules/templates/module.menu.default.tpl";
        }
    }
    public function _call_part($part){
    $this->body();
    }
    private function body(){
    global $smarty;
    $children = get_children_by_rel_type($this->properties['id'],"link");
    $smarty->assign('node_array',$children);
    }
}
?>
