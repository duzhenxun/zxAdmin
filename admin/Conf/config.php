<?php

/**
 * 程序配置文件
 * Author: DuZhenxun <5552123@qq.com>
 * @ last time 2015年1月7日 12:33:44
 */
$arr = array(
//'配置项'=>'配置值'
    //'SHOW_PAGE_TRACE' => TRUE,
    'URL_MODEL' => 0,
    'TMPL_ACTION_ERROR' => 'Public:success',
    'TMPL_ACTION_SUCCESS' => 'Public:success',
    'LOAD_EXT_CONFIG' => 'system,version',
    "LOAD_EXT_FILE" => "form",
    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST' => 'zh-cn', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量
    'TOKEN_ON' => true, // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    //'TOKEN_RESET' => true, //令牌验证出错后是否重置令牌 默认为true
    'VAR_FILTERS' => 'addslashes',
    'USER_AUTH_GATEWAY' => '?m=Login&a=index', // 默认认证网关
    'SESSION_AUTO_START' => true,
    'USER_AUTH_KEY' => 'auth_id', // 用户认证SESSION标记
    'COOKIE_PREFIX' => 'kupao',
    'COOKIE_EXPIRE' => 60,
);

$db = require 'db.inc.php';

return array_merge($arr, $db);
?>