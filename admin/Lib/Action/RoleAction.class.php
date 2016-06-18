<?php

/*
 * 管理员
 * Author : DuZhenxun <5552123@qq.com>
 * @ 2015年1月8日 11:30:04
 */

class RoleAction extends CommonAction {

    public function _initialize() {
        $this->M = D('Role');
        parent::_initialize();
    }

    //列表
    public function index() {
        $r = $this->M->select();
        $this->assign('data', $r);
        $this->display();
    }

    //添加
    public function add() {
        if (isset($_POST['dosubmit'])) {
            if (!$this->M->create()) {
                $this->error($this->M->getError());
            }
            asort($_POST['nodeids']);
            $this->M->nodes = implode(',',$_POST['nodeids']);  
            if (intval($_POST['id'])) {
                $res = $this->M->save();
            } else {
                $res = $this->M->add();
            }
            if ($res) {
                $this->success(L('ok'), '?m=' . MODULE_NAME);
            } else {
                $this->error(L('no'));
            }
        } else {
            if (intval($_GET['id'])) {
                $where['id'] = intval($_GET['id']);
                $data = $this->M->where($where)->find();
                $this->assign('action_name', '修改');
                $this->assign('data', $data);
            }

            $node_arr = M('node')->order('listorder asc,id asc')->select();
            $node_arr = list_to_tree($node_arr);
            $this->assign('node_arr', $node_arr);
            $this->display();
        }
    }
    
     /*
     * 删除
     */
    public function del() {
        $where['id'] = intval($this->_get('id'));
        $res = $this->M->where($where)->delete();
        if ($res) {
            $this->success(L('ok'));
        } else {
            $this->error(L('no'));
        }
    }



    

}
