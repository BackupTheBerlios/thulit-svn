{* Smarty *}
<div{if $prop.class ne ""} class="{$prop.class}"{/if}>
  {if $prop.edit_level ge $_user.user_level}
  <div class="edit-link"><a href="{create_link lang="cz" page="edit" p1="edit_id=`$prop.id`" p2="parent_id=`$parent_prop.id`" p3="return=`$page`"}"> edit </a></div>
  {/if}
  {call_value obj=$obj}
</div{if>