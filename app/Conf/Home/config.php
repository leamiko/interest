<?php

/**
 * 前台配置文件
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
return array(
    // 默认模板主题名称
    'DEFAULT_THEME' => 'default',
    // 跳转页面模版
    'TMPL_ACTION_ERROR' => 'Public/html/error.html',
    'TMPL_ACTION_SUCCESS' => 'Public/html/success.html',
    'LANG_SWITCH_ON' => true,
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'DEFAULT_LANG' => 'zh-cn', // 默认语言
    'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
);