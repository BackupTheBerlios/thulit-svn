{* Smarty *}
<div class="menu">

<ul>
{section name=sec1 loop=$link}
    <li><a href="{$link[sec1].href}" onmousedown="//loadXMLDoc('{$link[sec1].xhref}'); return false;">{$link[sec1].name}</a></li>
{/section}
</ul>


</div><!--.menu-->