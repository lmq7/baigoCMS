{$cfg = [
    title      => $tplData.tagRow.tag_name,
    str_url    => "{$tplData.tagRow.urlRow.tag_url}{$tplData.tagRow.urlRow.page_attach}",
    page_ext   => $tplData.tagRow.urlRow.page_ext
]}
{include "include/pub_head.tpl" cfg=$cfg}

    <ol class="breadcrumb">
        <li><a href="{$smarty.const.BG_URL_ROOT}">首页</a></li>
        <li>TAG</li>
        <li>{$tplData.tagRow.tag_name}</li>
    </ol>

    {foreach $tplData.articleRows as $key=>$value}
        <h3><a href="{$value.urlRow.article_url}" target="_blank">{$value.article_title}</a></h3>
        <p>{$value.article_time_pub|date_format:$smarty.const.BG_SITE_DATE}</p>
        <hr>
        <ul class="list-inline">
            <li>
                <span class="glyphicon glyphicon-tags"></span>
                Tags:
            </li>
            {foreach $value.tagRows as $tag_value}
                {if $tag_value.tag_name == $tplData.tagRow.tag_name}
                    {$str_class = "highlight"}
                {else}
                    {$str_class = "normal"}
                {/if}
                <li><a href="{$tag_value.urlRow.tag_url}" class="{$str_class}">{$tag_value.tag_name}</a></li>
            {/foreach}
        </ul>
    {/foreach}

    {include "include/page.tpl" cfg=$cfg}

{include "include/pub_foot.tpl" cfg=$cfg}
{include "include/html_foot.tpl"}