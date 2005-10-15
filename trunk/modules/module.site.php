<?php
class module_site{
    var $parent;
    var $properties;
    public function __construct($node,$parent=null,$edit_type=0){
        global $a;
        global $user;
        global $thulit;
        $this->parent=$parent;
        if (isSet($parent)){$this->properties=$parent->properties;}
        load_node_properties($node,$this);
        $this->_prepare();
        load_properties($node,$this);
        //$this->display_tpl();
        $vl = $this->properties['view_level'];
        if (!isSet($vl)){$vl=99;}
        if ($user['user_level']>$vl){
            loginFunction(2);
        }else{
            $this->_prepare();
            $this->_check();
            print_tpl($this);
        }
    }
    static function _display($root, $parent=null,$edit_type=0){
        $_self = new module_site($root, $parent, $edit_type);
    }
    private function _prepare(){
        global $thulit;
        global $smarty;
        /* Sets up language if it's not in $_GET.
            Order:  1. "lang" property of Site
                    2. "default_lang" in thulit settings
                    3. last possibility "en" - English
        */
        if (!IsSet($thulit["lang"])||$thulit["lang"]==""){
            if (IsSet($this->properties["lang"])&&$this->properties["lang"]!=""){$thulit["lang"]=$this->properties["lang"];}
                elseif (IsSet($thulit["default_lang"])&&$thulit["default_lang"]!=""){$thulit["lang"]=$thulit["default_lang"];}
                    else{$thulit["lang"]="en";}
        }
        /* Sets up page if it's not in $_GET. That means index page
            Order:  1. "index_page" property of Site
                    2. "default_index_page" in thulit settings
                    3. if nowhere writen then "index"
        */
        if (!IsSet($thulit["page"])||$thulit["page"]==""){
            if (IsSet($this->properties["index_page"])&&$this->properties["index_page"]!=""){$thulit["page"]=$this->properties["index_page"];}
                elseif (IsSet($thulit["default_index_page"])&&$thulit["default_index_page"]!=""){$thulit["page"]=$thulit["default_index_page"];}
                    else{$thulit["page"]="index";}
        }
        /* Assign base variables into thulit */
        $smarty->assign('lang',$thulit["lang"]);
        $smarty->assign('site',$thulit['site']);
        $smarty->assign('page',$thulit["page"]);
    }
    private function _check(){
        $this->check_redirects();
    }
    private function check_redirects(){
        global $thulit;
        if (isSet($this->properties['redirect'])&&$this->properties['redirect']!=""){
            $redirect=$this->properties['redirect'];
            unset($this->properties['redirect']); //because properties are heritable and I don't want infinite loop
            header ("Location: http://".$redirect."/".$thulit["lang"]."/".$thulit["page"]);
            exit;
        }
        if (isSet($this->properties['rewrite'])&&$this->properties['rewrite']!=""){
            $rewrite=$this->properties['rewrite'];
            unset($this->properties['rewrite']); //because properties are heritable and I don't want infinite loop
            display_site($rewrite, $this);
        }
    }
    public function _display_tpl(){
        print_tpl($this);
    }
    public function _call_part($part){
        eval("\$this->".$part."();");
    }
    private function page(){
        global $thulit;
        $set = db_get("select * from data left join relation on child_id=id where name_id='".$thulit["page"]."' and parent_id='".$this->properties['id']."' and rel_type='page'");
        if ($arr = $set->fetchRow()){
            display($arr, $parent);
        }
    }
}
?>
