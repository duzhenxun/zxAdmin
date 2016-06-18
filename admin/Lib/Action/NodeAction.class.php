<?php

/*
 * 节点管理
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月8日 18:13:24
 */

class NodeAction extends CommonAction {

    public function _initialize() {
        $this->M = D('Node');
        parent::_initialize();
    }

    //列表
    public function index() {
       
        $data = $this->M->order('listorder asc,id asc')->select(); 
        $data = nodetree($data);
        $this->assign('data', $data);
        $this->display();
    }

    //添加
    public function add() {

        if (isset($_POST['dosubmit'])) {

            if (!$this->M->create()) {
                $this->error($this->M->getError());
            }
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
                $this->assign('action_name','修改');
            }
            
            $res = $this->M->order('listorder asc,id asc')->select();  
            $array = array();
            foreach ($res as $k => $r) {
                $res[$k]['selected'] = $r['id'] == $_GET['pid'] ? 'selected' : '';
            }
            import('@.Extend.Tree');
            $tree = new Tree();
            $tree->init($res);
            $str = "<option value='\$id' \$selected>\$spacer \$name</option>";
            $data['menu'] = $tree->get_tree(0, $str);
            
            
            $this->assign('data', $data);
            $this->display();
        }
    }


    //排序
    public function listorder(){
       
        if(isset($_POST['dosubmit'])){
            foreach($_POST['listorders'] as $id=>$listorder){
                $data['id'] = $id;
                $data['listorder'] = $listorder;
                $this->M->save($data);
            }
            $this->success(L('ok'));
        }else{
            $this->error(L('no'));
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
