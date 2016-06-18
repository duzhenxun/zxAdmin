<?php

/*
 * 公共
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2014年12月29日 11:11:47
 */

class CommonAction extends Action {

    function _initialize() {
       
        $auth_id = session(C('USER_AUTH_KEY'));
        if (!isset($auth_id)) {
            //跳转到认证网关
            redirect(U(C('USER_AUTH_GATEWAY')));
        }
        $this->assign('js_file', 'js_' . ACTION_NAME);
        $this->assign('css_file', 'css_' . ACTION_NAME);
        $this->_assign_menu();
        $this->_get_action_name();
        $this->_admin_log();
    }


    /**
     * 分页
     */
    protected function _page($count, $num = 15) {
        import('ORG.Util.Page');
        $page = new Page($count, $num);
        $page->setConfig('header', '条数据');
        $page->setConfig('theme', '%upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');
        $page->rollPage = 10;
        $page = $page->show();
        $this->assign('count', $count);
        $this->assign('page', $page);
    }

    //菜单
    private function _assign_menu() {
        $user_id = get_user_id();
        $roleid = session('roleid');
        if ($user_id != 1) {
            $nodes = M('role')->where(array('id' => $roleid))->getField('nodes');
            $where['id'] = array('in', $nodes);
            $menus_priv = D('Node')->where($where)->select();
            $this->_check_priv($menus_priv, $user_id); //检查权限
        }
        $where['status'] = 1;
        $menus = D('Node')->get_menu($where);
        $this->assign('menus', $menus);
    }

    //当前操作名
    private function _get_action_name() {
        $where['act'] = ACTION_NAME;
        $where['mod'] = MODULE_NAME;
        $res = M('node')->where($where)->getField('name');
        $this->assign('action_name', $res);
        $this->assign('mod', MODULE_NAME);
        $this->assign('act', ACTION_NAME);
    }

    private function _admin_log() {
        if (MODULE_NAME == 'Index')
            return true;
        if (get_user_id() == 1)
            //return true;
        $data = array();
        $data['file'] = MODULE_NAME;
        $data['action'] = ACTION_NAME;
        $data['querystring'] = __SELF__;
        $data['uid'] = get_user_id();
        $data['ip'] = ip();
        $data['add_time'] = time();

        $path = strrev(__SELF__);
        $str = strrev('a=' . ACTION_NAME);
        $data['data'] = strrev(substr($path, 0, strrpos($path, $str)));
        M('admin_log')->add($data);
    }

    //处理数字符串
    private function safestr(&$value) {
        $value = intval(trim($value));
        return $value;
    }

    //权限处理
    private function _check_priv($menu, $user_id) {


        foreach ($menu as $k => $v) {
            if ($v['mod'] == MODULE_NAME && $v['act'] == ACTION_NAME) {
                $res = true;
            }
        }
        if (!$res) {
            $this->error(L('no_permission'));
        }
    }

}
