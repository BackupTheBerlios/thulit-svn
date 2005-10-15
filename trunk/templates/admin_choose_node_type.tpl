{* Smarty *}
<div class="admin_choose_note_type">
<ul>
{foreach item=rel from=$node_types}
    <li><a href="admin.php?action={$action}&node_type={$rel}&node_id={$parent}">{$rel}</a></li>
{/foreach}
</ul>


</div><!--.add_children-->
