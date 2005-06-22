{* Smarty *}
<div class="add_children">
<a href="admin.php?edit_id={$parent}">Return</a>
<ul>
{foreach item=rel from=$childs_arr}
    <li>{$rel.1.rel_type}
		<ul>
		{foreach item=child from=$rel}
    		<li>{$child.name_id}</li>
		{/foreach}
		</ul>
    </li>
{/foreach}
</ul>


</div><!--.add_children-->
