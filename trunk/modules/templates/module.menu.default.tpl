{* Smarty *}
<div class="{$prop.class}">
{call_content obj=$obj part='link'}
<ul>
{section name=sec1 loop=$node_array}
    <li><a class="{$prop.class}_{$smarty.section.sec1.index}" href="{create_link lang=$lang page=$node_array[sec1].name_id}">
{$node_array[sec1].node_name}</a></li>
{/section}
</ul>

</div>