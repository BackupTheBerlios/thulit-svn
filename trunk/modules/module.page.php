<?php
class module_page{
    var $parent;
    var $properties;
    public function __construct($node,$parent=null,$edit_type=0){
        global $a;
        global $user;
        $this->parent=$parent;
        if (isSet($parent)){$this->properties=$parent->properties;}
        load_properties($node,$this);
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
        $_self = new module_page($root, $parent,$edit_type);
    }
    public function _display_tpl(){
        print_tpl($this);
    }
    public function _call_part($part){
        eval("\$this->".$part."();");
    }
    private function value(){
        echo get_value($this->properties['id']);
    }
    private function body(){
        $children = get_children_by_rel_type($this->properties['id'],"body");
        foreach($children as $child){
            display($child, $this);
        }
    }
}
?>
