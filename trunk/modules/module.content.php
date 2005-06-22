<?php
class module_content{
    var $parent;
    var $properties;
    public function __construct($node,$parent=null){
	$this->parent=$parent;
	if (isSet($parent)){$this->properties=$parent->properties;}
	load_properties($node,$this);
	//$this->display_tpl();
	print_tpl($this);
    }
    static function _display($root,$parent=null){
        $_self = new module_content($root,$parent);
    }
    public function _display_tpl(){
	print_tpl($this);
    }
    public function _call_part($part){
	$this->display();
    }
    private function display(){
	echo get_value($this->properties['id']);
    }
}
?>
