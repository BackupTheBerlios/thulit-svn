{* Smarty *}
<div class="admin_choose_node_form form">
    <form method="post" action="admin.php?action=add_children_submit&node_id={$parent}">
<ul class="select">
{foreach item=rel from=$nodes}
    <li><label><input type="checkbox" name="added_children[]" value="{$rel.id}">{$rel.name_id}</label></li>
{/foreach}
</ul>
add as:
<select name="added_rel_type">
{foreach item=opt from=$rel_types}
	<option value="{$opt}">{$opt}</option>
{/foreach}
</select>
<input class="input_submit" name="add_children" type="submit" value="Odeslat" />
    </form>
</div>
