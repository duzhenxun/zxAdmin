<?php

/*
 * 菜单
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月12日 16:07:40
 */

class MenuWidget extends Widget {

    public function render($data) {
        $tree = $data['menus'];
        return $this->tree_menu($tree);
    }

    function tree_menu($tree, $level = 0) {
        $level++;
        $html = "";
        //dump($tree);
        if (is_array($tree)) {

            if ($level > 1) {

                $html = "<ul class='submenu'>\r\n";
            } else {
                $html = "<ul class='nav nav-list'>\r\n";
            }
            foreach ($tree as $val) {



                if (isset($val["name"])) {
                    $title = $val["name"];
                    
                    if(!empty($val["act"])) {
                        $url = '?m=' . $val['mod'] . '&a=' . $val['act'];
                        $val['data'] ? $url.='&' . $val['data'] : '';
                    }




                    if (empty($val["id"])) {
                        $id = $val["name"];
                    } else {
                        $id = $val["id"];
                    }

                    if (empty($val['icon'])) {
                        $icon = "fa-caret-right";
                    } else {
                        $icon = $val['icon'];
                    }

                    if ($val['mod'] == MODULE_NAME && $val['act'] == ACTION_NAME) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }


                    if (isset($val['_child'])) {

                        $html .= '<li>';
                        $html .= "<a class=\"dropdown-toggle\" node=\"$id\" href=\"" . "$url\">";
                        $html .= "<i class=\"menu-icon fa $icon\"></i>";
                        $html .= "<span class=\"menu-text\">$title</span>";
                        $html .= "<b class=\"arrow fa fa-angle-down\"></b>";
                        $html .= "</a>\r\n";
                        $html .='<b class="arrow"></b>';
                        $html .= $this->tree_menu($val['_child'], $level);
                        $html = $html . "</li>\r\n";
                    } else {

                        $html .='<li class="' . $active . '">';
                        $html .="<a  node=\"$id\"  href=\"" . "$url\">\r\n";
                        $html .= "<i class=\"menu-icon fa $icon\"></i>";
                        $html .= "<span class=\"menu-text\">$title</span>";
                        $html .="</a>\r\n";
                        $thml .='<b class="arrow"></b>'
                                . '</li>\r\n';
                    }
                }
            }
            $html = $html . "</ul>\r\n";
        }
        return $html;
    }

}
