<?php

/*
 * 管理员
 * Author : DuZhenxun <5552123@qq.com>
 * @ 2015年1月8日 11:30:04
 */

class AdminAction extends CommonAction {

    public function _initialize() {
        $this->M = D('Admin');
        parent::_initialize();
    }

    //管理员列表
    public function index() {
        
        $r = $this->M
                ->alias('a')
                ->field('a.*,r.rolename')
                ->join(C('DB_PREFIX').'role as r on a.roleid=r.id')
                ->order('id asc')
                ->select();
        $this->assign('data', $r);
        $this->display();
    }

    /*
     * 增加，修改 当有ID是修改
     */

    public function add() {
        $id = intval($_REQUEST['id']);
        if (isset($_POST['dosubmit'])) {
            //修改
            if ($id) {
                $this->M->_auto = array();
            }

            //自动验证，自动添加
            if (!$this->M->create()) {
                $this->error($this->M->getError());
            }

            if ($id) {
                if (!empty($_POST['npassword'])) {
                    $this->M->password = md5(trim($_POST['npassword']));
                }
                $res = $this->M->save();
            } else {
                $this->M->password = md5($this->M->password);
                $res = $this->M->add();
            }


            if ($res) {
                $this->success(L('ok'), '?m=' . MODULE_NAME);
            } else {
                $this->error(L('no'));
            }
        } else {
            //显示模板

            if (intval($_GET['id'])) {
                $where['id'] = intval($_GET['id']);
                $data = $this->M->where($where)->find();
                $this->assign('action_name', '修改');
            }
            $m = M('role')->field('id,rolename')->select();
            foreach ($m as $v) {
                $data['frole'][$v['id']] = $v['rolename'];
            }

            $this->assign('data', $data);
            $this->display();
        }
    }



    //修改
    public function public_edit_info() {
        $id = session(C('USER_AUTH_KEY'));
        if ($this->_post('dosubmit')) {
            if (!$rs = $this->M->create()) {
                $this->error($this->M->getError());
            }
            $this->M->id = $id;
            $res = $this->M->save();
            if ($res) {
                $this->success(L('ok'));
            } else {
                $this->error(L('no'));
            }
        } else {
            $data = $this->M->where(array('id' => $id))->find();

            $this->assign('data', $data);
            $this->display();
        }
    }

    //修改密码
    public function public_edit_pwd() {

        $id = session(C('USER_AUTH_KEY'));
        $where['id'] = $id;
        $r = $this->M->where($where)->find();
        if (isset($_POST['dosubmit'])) {
            if (!$this->M->create()) {
                $this->error($this->M->getError());
            }

            if ($r['password'] != md5($this->_post('oldpassword'))) {
                $this->error('旧密码不正确');
            }
            $data['id'] = $id;
            $data['password'] = md5($this->_post('password'));
            if ($this->M->save($data)) {
                $this->success(L('ok'));
            } else {
                $this->error(L('no'));
            }
        } else {
            $this->assign('data', $r);
            $this->display();
        }
    }

    public function admin_log() {
        $this->M = M('admin_log');
        $where = array();
        //条件搜索

        if (!empty($_GET['name'])) {
            $where['u.username'] = $_GET['name'];
        }

        $order = $_GET['order'] ? 'c.' . $_GET['order'] : 'c.id desc';

        //处理分页
        $p = intval($_GET['p']) ? intval($_GET['p']) : 0;
        import('ORG.Util.Page');
        $num = 15; //每页显示数量
        $count = $this->M->alias('c')->join(C('DB_PREFIX').'admin as u ON c.uid=u.id')->where($where)->count(); //总记录

        $page = new Page($count, $num);
        $page->setConfig('header', '条记录');
        $page->setConfig('theme', '%upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%');
        $page->rollPage = 10;
        $show = $page->show();

        //$where['t.sprots_Calorie'] = array('EGT', '1');
        $data = $this->M->alias('c')
                ->field('u.username,u.realname,c.*')
                ->join(C('DB_PREFIX').'admin as u ON c.uid=u.id')
                ->where($where)
                ->page($p . ',' . $num)
                ->order($order)
                ->select();

        $this->assign('count', $count);
        $this->assign('page', $show);
        $this->assign('data', $data);

        $this->display();
    }
    
    //清理一个月前日志
    public function del_admin_log() {
        $start_time = strtotime("-1 Monday");
        $where['add_time'] = array('lt', $start_time);
        $res = M('admin_log')->where($where)->delete();
        //p(M('admin_log')->getlastSql());exit;
        if ($res) {
            $this->success(L('ok'));
        } else {
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
