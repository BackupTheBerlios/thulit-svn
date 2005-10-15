<?

function smarty_modifier_stripslashes($text){
    stripslashes($text);
}
function smarty_modifier_htmlentities($text){
    htmlentities($text);
}
function smarty_function_call_value($params, &$smarty){
    global $a;
    global $user;
    $vl = $params['obj']->properties['view_level'];
    if (!isSet($vl)){$vl=99;}
    if ($user['user_level']>$vl){
    loginFunction(2);
    }else{
    $params['obj']->_call_part('value');
    }
}
$smarty->register_function("call_value", "smarty_function_call_value");
function smarty_function_call_content($params, &$smarty){
    global $a;
    global $user;
    $vl = $params['obj']->properties['view_level'];
    if (!isSet($vl)){$vl=99;}
    if ($user['user_level']>$vl){
        loginFunction('2');
    }else{
        $params['obj']->_call_part($params['part']);
    }
}
$smarty->register_function("call_content", "smarty_function_call_content");

function smarty_modifier_create_link($params, &$smarty){
    global $thulit;
    if ($thulit['use_mod_rewrite']){
        $link = $thulit['base_path'];
        $delim = "/";
        $link .= $params["lang"];
        $link .= $delim . $params["page"];
    }else{
        $link = $thulit['base_path'] . "index.php?";
        $delim = "&";
        $link .= "lang=" . $params["lang"];
        $link .= $delim . "page=" . $params["page"];
    }
    $i=0;
    while ($params["p".++$i]!=""){
        $link .= $delim . $params["p".$i];
    }
    return $link;
}
$smarty->register_function("create_link", "smarty_modifier_create_link");
?>
