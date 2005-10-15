<?php
class module_page{
    var $parent;
    var $properties;
    public function __construct($node,$parent=null,$edit_type=0){
	$this->parent=$parent;
	if (isSet($parent)){$this->properties=$parent->properties;}
	load_properties($node,$this);
	//$this->display_tpl();
	print_tpl($this);
    }
    static function _display($root, $parent=null,$edit_type=0){
        $_self = new module_page($root, $parent,$edit_type);
    }
    public function _display_tpl(){
	print_tpl($this);
    }
    public function _call_part($part){
	$this->body();
    }
    private function body(){
	$children = get_children_by_rel_type($this->properties['id'],"body");
	foreach($children as $child){
	    display($child, $this);
	}
    }
}
?>
