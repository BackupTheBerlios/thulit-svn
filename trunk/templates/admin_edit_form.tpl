{* Smarty *}
<div class="admin_edit_form form">
    <form method="post" action="admin.php?edit_id={$edit_form_data.id}&action=edit_node">
        <ul class="list">
            <li class="list_item id"><div class="label">id:</div>
                <div class="value">
                   {$edit_form_data.id}</div></li>
            <li class="list_item name_id"><div class="label">name_id:</div>
                <div class="value">
                    <input class="input_text" name="name_id" type="text" value="{$edit_form_data.name_id}" /></div></li>
            <li class="list_item date_create"><div class="label">datum vytvoreni:</div>
                <div class="value">
                    {$edit_form_data.date_create}</div></li>
            <li class="list_item date_mod"><div class="label">datum posledni upravy:</div>
                <div class="value">
                    {$edit_form_data.date_mod}</div></li>
            <li class="list_item owner"><div class="label">vlastnik:</div>
                <div class="value">
                    <input class="input_text" name="owner" type="text" value="{$edit_form_data.owner}" /></div></li>
            <li class="list_item data_type"><div class="label">datovy typ:</div>
                <div class="value">
                    <input class="input_text" name="data_type" type="text" value="{$edit_form_data.data_type}" /></div></li>
            <li class="list_item node_type"><div class="label">typ uzlu:</div>
                <div class="value">
                    <input class="input_text" name="node_type" type="text" value="{$edit_form_data.node_type}" /></div></li>
            <li class="list_item node_name"><div class="label">jmeno uzlu:</div>
                <div class="value">
                    <input class="input_text" name="node_name" type="text" value="{$edit_form_data.node_name}" /></div></li>
            <li class="list_item lang"><div class="label">jazyk:</div>
                <div class="value">
                    <input class="input_text" name="lang" type="text" value="{$edit_form_data.lang}" /></div></li>
            <li class="list_item tpl_name"><div class="label">soubor template:</div>
                <div class="value">
                    <input class="input_text" name="tpl_name" type="text" value="{$edit_form_data.tpl_name}" /></div></li>
{if $edit_form_data.node_type eq 'value' or $edit_form_data.node_type eq ''}
            <li class="list_item data_text"><div class="label">data text:</div>
                <div class="value">
{* oFCKeditor->Create *}
<textarea class="input_text" name="data_text">{$edit_form_data.data_text}</textarea>
                </div></li>
            <li class="list_item data_varchar"><div class="label">data kratky text:</div>
                <div class="value">
                    <input class="input_text" name="data_varchar" type="text" value="{$edit_form_data.data_varchar}" /></div></li>
            <li class="list_item data_datetime"><div class="label">data datum a cas:</div>
                <div class="value">
                    <input class="input_text" name="data_datetime" type="text" value="{$edit_form_data.data_datetime}" /></div></li>
            <li class="list_item data_date"><div class="label">data datum:</div>
                <div class="value">
                    <input class="input_text" name="data_date" type="text" value="{$edit_form_data.data_date}" /></div></li>
            <li class="list_item data_time"><div class="label">data cas:</div>
                <div class="value">
                    <input class="input_text" name="data_time" type="text" value="{$edit_form_data.data_time}" /></div></li>
            <li class="list_item data_int"><div class="label">data cislo:</div>
                <div class="value">
                    <input class="input_text" name="data_int" type="text" value="{$edit_form_data.data_int}" /></div></li>
{/if}
            <li class="list_item butons">
                <div class="submit">
                    <input class="input_submit" name="data_edit" type="submit" value="Odeslat" /></div></li>
        </ul>
    </form>
{admin_children->display}
<div style="position: absolute; top: 0px; right: 0px;"><a href="admin.php">Close</a></div>
</div>
