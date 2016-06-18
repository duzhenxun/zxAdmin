<?php

function nodetree($arr, $id = 0, $level = 0) {
    static $array = array();
    foreach ($arr as $v) {
        if ($v['pid'] == $id) {
            $v['level'] = $level;
            $array[] = $v;
            nodetree($arr, $v['id'], $level + 1);
        }
    }
    return $array;
}

function list_to_tree($list, $root = 0, $pk = 'id', $pid = 'pid', $child = '_child') {
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = 0;
            if (isset($data[$pid])) {
                $parentId = $data[$pid];
            }
            if ((string) $root == $parentId) {
                $tree[] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }
    return $tree;
}

function tree_to_list($tree, $level = 0, $pk = 'id', $pid = 'pid', $child = '_child') {
    $list = array();
    if (is_array($tree)) {
        foreach ($tree as $val) {
            $val['level'] = $level;
            if (isset($val['_child'])) {
                $child = $val['_child'];
                if (is_array($child)) {
                    unset($val['_child']);
                    $list[] = $val;
                    $list = array_merge($list, tree_to_list($child, $level + 1));
                }
            } else {
                $list[] = $val;
            }
        }
        return $list;
    }
}

function get_user_id() {
    $user_id = session(C('USER_AUTH_KEY'));
    return isset($user_id) ? $user_id : 0;
}

function get_time() {
    $time['now'] = time(); //今天凌晨时间
    $time['today'] = strtotime(date('Y-m-d')); //今天凌晨时间
    $time['yesterday'] = strtotime(date('Y-m-d', strtotime('-1 day'))); //昨天凌晨时间
    $time['monday'] = strtotime(date('Y-m-d', strtotime('-1 month'))); // 一个月前
    $time['year'] = strtotime(date('Y-m-d', strtotime('-1 year'))); // 一个年前
    return $time;
}

/**
 * 打印
 */
function p($str) {
    echo '<pre>';
    if (is_object(($str))) {
        var_export($str);
    } else {
        print_r($str);
    }
    echo '</pre>';
}

/**
 * 快速使用缓存
 */
function kcache($str) {
    return Cache::getInstance($str, C($str));
}

/**
 * 设置缓存
 * @param string $data
 * @param type $name
 */
function setcache($data, $name = 'test', $filepath) {
    $filepath = $filepath ? $filepath : RUNTIME_PATH . '/Cache/';
    if (!is_dir($filepath)) {
        mkdir($filepath, 0777, true);
    }
    $data = "<?php\n\n/*\n* 生成缓存文件\n* Author: DuZhenxun <5552123@qq.com>\n* @ " . date('Y-m-d H:i:s') . "\n*/\nreturn " . var_export($data, true) . ";\n?>";
    $res = file_put_contents($filepath . $name . '.php', $data);
    return $res;
}

/**
 * 获取缓存
 * @param type $name
 * @param type $path
 */
function getcache($name, $filepath) {
    $filepath = $filepath ? $filepath : RUNTIME_PATH . '/Cache/';
    $filename = $filepath . $name . '.php';
    if (is_file($filename)) {
        $data = @include($filename);
        return $data;
    } else {
        return false;
    }
}

/**
 * 删除缓存
 * @param type $name
 * @param type $filepath
 */
function delcache($name, $filepath) {
    $filepath = $filepath ? $filepath : RUNTIME_PATH . '/Cache/';
    if (is_file($filename . $name . 'php')) {
        @unlink($filename . $name . 'php');
    }
}

/**
 * 删除文件
 * @param string $dir
 * @return type
 */
function dir_delete($dir) {
    if (substr($dir, -1) != '/') {
        $dir = $dir . '/';
    }
    $list = glob($dir . '*');
    foreach ($list as $v) {
        is_dir($v) ? dir_delete($v) : @unlink($v);
    }
    return @rmdir($dir);
}

/**
 * 获取请求ip
 *
 * @return ip地址
 */
function ip() {
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return preg_match('/[\d\.]{7,15}/', $ip, $matches) ? $matches [0] : '';
}

/**
 * 快速使用缓存
 */
function c_cache($str) {
    return Cache::getInstance($str, C($str));
}

/**
 * 获取服务器上所有的mem
 * @param type $host
 * @param int $port
 * @param type $test 测试
 * @return array
 * @2014年11月14日 18:26:15  <5552123@qq.com> 
 */
function mem_all($host, $test = true, $port = 11211,$search) {
    //$host = '192.168.18.202';
    //$port = 11211;
    $mem = new Memcache();
    $mem->connect($host, $port);
    $items = $mem->getExtendedStats('items');
    $items = $items["$host:$port"]['items'];
    foreach ($items as $key => $values) {
        $number = $key;
        $str = $mem->getExtendedStats("cachedump", $number, 0);
        $line = $str["$host:$port"];
        if (is_array($line) && count($line) > 0) {
            foreach ($line as $key => $value) {
                if($search){
                    if(substr($key,0,2)==$search){
                       $array[$key] = $mem->get($key);  
                    }
                }else{
                     $array[$key] = $mem->get($key);
                }
            }
        }
    }
    if ($test) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    } else {
        return $array;
    }
}

/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
    if (function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        $slice = iconv_substr($str, $start, $length, $charset);
        if (false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice . '...' : $slice;
}

/**
 * 通过经纬度取得实际地址
 */
function getRealyAddress($wei, $jing) {
    $place_url = 'http://api.map.baidu.com/geocoder?output=json&location=' . $wei . ',' . $jing . '&key=ccea36ece20a7a6eb0666bc726957e85';
    $json_place = file_get_contents($place_url);
    $place_arr = json_decode($json_place, true);
    $address = $place_arr['result']['formatted_address'];
    return $address;
}

function getip($ip) {
    import('@.Extend.IpLocation');
    $IpLocation = new IpLocation();
    return $IpLocation->get($ip);
}

/*
 * 获取指定表，总数
 */

function getCount($table, $where) {
    $M = M($table);
    $res = $M->where($where)->count('id');

    return $res;
}

/**
 * 导出excel函数
 * @param type $data
 * @param type $info
 * @param type $title
 * @2015年1月27日 18:50:31
 */
function export_excel($data, $info, $title) {
    $abc = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U');
    $info_count = count($info); //信息总数
    $data_count = count($data); //总数据量
    $file_name = date('Ymdhis') . ".xls"; //保存文件名

    Vendor('Excel.PHPExcel'); //导入类文件
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0); //选择第一个
    $objActSheet = $objPHPExcel->getActiveSheet(); //操作对像  
    //$objActSheet->setTitle('发现数据'); //标题
    //标题 设置
    $objActSheet->mergeCells('A1:' . $abc[$info_count - 1] . '1');  //合并
    $objActSheet->setCellValue('A1', $title); //合并单元内容
    $objActSheet->getStyle('A1')->getFont()->setSize(16);
    $objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //局中
    //$objActSheet->getColumnDimension('B')->setWidth(20); //设置其中一行宽度
    //写入A2-?2字段
    $i = 0;
    foreach ($info as $k => $v) {
        $objActSheet->setCellValue($abc[$i] . '2', $v);
        $i++;
    }

    //写入数据 A3-??
    $i = 2;
    foreach ($data as $val) {
        $i++;
        $j = 0;
        foreach ($info as $k => $v) {
            $objActSheet->setCellValue($abc[$j] . $i, $val[$k]);
            $j++;
        }

    }
    //画线
    $end = $abc[$info_count - 1] . ($data_count + 2);
    $objActSheet->getStyle("A2:" . $end)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_DASHDOT);
    header("Content-Type: application/force-download");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition:attachment;filename =" . str_ireplace('+', '%20', URLEncode($file_name)));
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

/**
 * 转换字节数为其他单位
 * @param	string	$filesize	字节大小
 * @return	string	返回大小
 */
function sizecount($filesize) {

    if ($filesize >= 1073741824) {
        $filesize = round($filesize / 1073741824) . 'GB';
    } elseif ($filesize >= 1048576) {
        $filesize = round($filesize / 1048576) . 'MB';
    } elseif ($filesize >= 1024) {
        $filesize = round($filesize / 1024) . ' KB';
    } else {
        $filesize = $filesize . ' Bytes';
    }

    return $filesize;
}

/**
 * 时间转换
 */
function totime($time) {
    if ($time >= 3600) {
        $time = round($time / 3600, 2) . '小时';
    } else if ($time >= 60) {
        $time = round($time / 60) . '分钟';
    } else {
        $time = $time . '秒';
    }
    return $time;
}
