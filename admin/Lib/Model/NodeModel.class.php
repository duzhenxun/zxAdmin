<?php

/*
 * 菜单
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月8日 18:15:16
 */

class NodeModel extends Model {

    protected $_validate = array(
        array('pid', 'require', '上级菜单必须'),
        array('name', 'require', '菜单名必须'),
        array('mod', 'require', '文件名必须'),
        array('act', 'require', '方法名必须'),
        array('act', 'check_act', '方法名已存在', 0, 'callback'),
    );
   
     protected $_auto = array(
        array('act', 'strtolower', 3, 'function'),
    );

    //验证act是否已存在
    public function check_act($data) {
        $where['act'] = $data;
        $where['mod'] = $_POST['mod'];

        $id = intval($_POST['id']);
        if ($id) {
            $where['id'] = array('NEQ', $id);
        }

        $count = $this->where($where)->count();

        if ($count) {
            return false;
        } else {
            return true;
        }
    }

    public function get_menu($where='') {
        if (empty($where)) {
            $where['status'] = 1;
        }
        $r = $this->where($where)->order('listorder asc,id asc')->select();
        $data = list_to_tree($r);
       // $data = nodetree($r);;
        return $data;
    }

}
