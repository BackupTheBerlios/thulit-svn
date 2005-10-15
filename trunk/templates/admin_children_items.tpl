{* Smarty *}
<ul>
{section name=sec1 loop=$link2}
    <li><a href="{$link2[sec1].href}">{$link2[sec1].name_id} :: {$link2[sec1].name}</a></li>
{/section}
</ul>
