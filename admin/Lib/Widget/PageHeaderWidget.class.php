<?php

/*
 * 插件
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2014年12月30日 14:47:20
 */

class PageHeaderWidget extends Widget {

    public function render($data) {
        $name = $data['name'];
        if (is_array($name)) {
            $data['name'] = implode($name);
        }
        $search = $data['search'];
        if (empty($search)) {
            $content = $this->renderFile('page_header', $data);
        } else {
            switch ($search) {
                case 'S':
                    $content = $this->renderFile('page_header_search', $data);
                    break;
                case 'M':
                    $content = $this->renderFile('page_header_adv_search', $data);
                    break;
                default :
                    $content = $this->renderFile('page_header', $data);
                    break;
            }
        }


        return $content;
    }

}
