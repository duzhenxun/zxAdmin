<?php

/*
 * 表单方面的一些函数
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月12日 09:24:36
 */

function select($array = array(), $id = '', $str = '', $default = '') {
    $string = '<select ' . $str . '>';
    $default_selected = (empty($id) && $default) ? 'selected' : '';

    if ($default) {
        $string .="<option value='' $default_selected>$default</option>";
    }
    if (!is_array($array) || count($array) == 0)
        return false;

    foreach ($array as $k => $v) {

        if ($id != '') {
            $selected = $k == $id ? 'selected' : '';
        }



        $string .="<option value=$k $selected>$v</option>";
    }
    $string .='</select>';
    return $string;
}

/**
 * 单选
 * @param type $array
 * @param type $id
 * @param type $str
 * @return type
 */
function radio($array = array(), $id = 0, $str = '', $class = '') {
    $string = '';
    foreach ($array as $k => $v) {
        $checked = $k == $id ? 'checked' : '';
        if ($class) {
            $v = $class . $v . '</span>';
        }
        $string .= "<input type='radio' $str value=$k $checked> $v";
    }
    return $string;
}

/**
 * 编辑器
 * @param type $content 表单内容
 * @param type $name 表单name
 * @return string
 */
function editor($content, $name) {
    $str = <<< EOT
        
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
    var ue = UE.getEditor('content',{
        zIndex :2
        ,toolbars: [[
                'fullscreen', 'source',
                '|', 'undo', 'redo', 
                '|','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', 
                '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', 
                '|', 'customstyle', 'paragraph', 'fontfamily', 'fontsize', 
                '|','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', 
                '|','link', 'unlink', 'anchor',
                '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', 
                '|','insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'insertframe', 'insertcode', 
                '|', 'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', 
                '|','preview', 'searchreplace', 
            ]]
    });
    </script>
    <script id="content" name="$name" type="text/plain">$content</script>
            
EOT;

    return $str;
}

/**
 * 日期时间控件
 * 
 * @param $name 控件name，id
 * @param $value 选中值
 * @param $isdatetime 是否显示时间
 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
 * @param $showweek 是否显示周，使用，true | false
 */
function fromdate($name, $value = '',$class, $isdatetime = 0, $loadjs = 0, $showweek = 'true', $timesystem = 1) {
    if ($value == '0000-00-00 00:00:00')
        $value = '';
    $id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
    if ($isdatetime) {
        $size = 21;
        $format = '%Y-%m-%d %H:%M:%S';
        if ($timesystem) {
            $showsTime = 'true';
        } else {
            $showsTime = '12';
        }
    } else {
        $size = 10;
        $format = '%Y-%m-%d';
        $showsTime = 'false';
    }
    $str = '';
    if($loadjs || !defined('CALENDAR_INIT')) {
			define('CALENDAR_INIT', 1);
    $str .= '<link rel="stylesheet" type="text/css" href="' . __PUBLIC__ . '/js/calendar/jscal2.css"/>
                <link rel="stylesheet" type="text/css" href="' . __PUBLIC__ . '/js/calendar/border-radius.css"/>
                <link rel="stylesheet" type="text/css" href="' . __PUBLIC__ . '/js/calendar/win2k.css"/>
                <script type="text/javascript" src="' . __PUBLIC__ . '/js/calendar/calendar.js"></script>
                <script type="text/javascript" src="' . __PUBLIC__ . '/js/calendar/lang/en.js"></script>';
    }
    //$str .= '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value . '"  '.$class.' >&nbsp;';
    $str .= '<script type="text/javascript">
			Calendar.setup({
			weekNumbers: ' . $showweek . ',
		    inputField : "' . $id . '",
		    trigger    : "' . $id . '",
		    dateFormat: "' . $format . '",
		    showTime: ' . $showsTime . ',
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>';
    return $str;
}
