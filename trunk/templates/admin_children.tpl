{* Smarty *}
<div class="children">
<a href="admin.php?action=add_child&node_id={$parent}">Modify children</a>
<ul>
{section name=sec0 loop=$link}
    <li>{$link[sec0]}{admin_children->items p1=$link[sec0]}
    </li>
{/section}
</ul>


</div><!--.menu-->
