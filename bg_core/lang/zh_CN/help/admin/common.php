<?php
return "<h3>生成静态页面</h3>
    <p>
        在纯静态模式下，左侧菜单下方将会显示“生成静态页面”按钮，点击按钮会将未生成的文章生成静态文件，然后逐个生成栏目、调用、专题等静态页面。
    </p>

    <p>&nbsp;</p>
    <div class=\"text-right\">
        <a href=\"#top\">
            <span class=\"glyphicon glyphicon-chevron-up\"></span>
            top
        </a>
    </div>
    <hr>
    <p>&nbsp;</p>

    <a name=\"ubb\"></a>
    <h3>部分 UBB 代码支持</h3>
    <p>
        在任何表单中，可以输入如下代码来实现相应的功能，最终在 Smarty 模板显示时，需调用 UBB 修饰符，详情请查看 <a href=\"{BG_URL_HELP}ctl.php?mod=tpl&act_get=common#ubb\">模板</a>。
    </p>
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">支持的 UBB 代码</div>
        <div class=\"table-responsive\">
            <table class=\"table table-bordered\">
                <thead>
                    <tr>
                        <th class=\"text-nowrap\">代码</th>
                        <th class=\"text-nowrap\">对应 HTML</th>
                        <th>说明</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=\"text-nowrap\">[b]字符[/b]</td>
                        <td class=\"text-nowrap\">&lt;b&gt;字符&lt;/b&gt;</td>
                        <td>加粗</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[code]代码[/code]</td>
                        <td class=\"text-nowrap\">&lt;code&gt;代码&lt;/code&gt;</td>
                        <td>计算机代码文本</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[del]字符[/del]</td>
                        <td class=\"text-nowrap\">&lt;del&gt;字符&lt;/del&gt;</td>
                        <td>被删除文本</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[em]字符[/em]</td>
                        <td class=\"text-nowrap\">&lt;em&gt;字符&lt;/em&gt;</td>
                        <td>强调文本</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[i]字符[/i]</td>
                        <td class=\"text-nowrap\">&lt;i&gt;字符&lt;/i&gt;</td>
                        <td>斜体字</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[kbd]字符[/kbd]</td>
                        <td class=\"text-nowrap\">&lt;kbd&gt;字符&lt;/kbd&gt;</td>
                        <td>定义键盘文本</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[s]字符[/s]</td>
                        <td class=\"text-nowrap\">&lt;s&gt;字符&lt;/s&gt;</td>
                        <td>加删除线的文本</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[u]字符[/u]</td>
                        <td class=\"text-nowrap\">&lt;u&gt;字符&lt;/u&gt;</td>
                        <td>下划线</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[br]</td>
                        <td class=\"text-nowrap\">&lt;br&gt;</td>
                        <td>换行</td>
                    </tr>
                    <tr>
                        <td class=\"text-nowrap\">[hr]</td>
                        <td class=\"text-nowrap\">&lt;hr&gt;</td>
                        <td>横线</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>";