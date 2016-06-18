<?php

/*
 * 后台登录
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月5日 16:14:25
 */

class LoginAction extends Action {

    public function index() {
        import("ORG.Util.Cookie");
        if ($uid = Cookie::get('uid')) {
            if ($res = D('Admin')->info($uid)) {
                session(C('USER_AUTH_KEY'), $res['id']);
                session('roleid', $res['roleid']);
                session('username', $res['username']);
                header('Location:?m=Index');
            }
        } else {
            $this->display();
        }
    }

    //登录
    public function login() {
        $m = D('Admin');
        if (!$rs = $m->create()) {
            $this->error($m->getError(),'?m=Login&a=index');
        }

        $res = $m->check_password($m->username, $m->password);
        if ($res) {
            session(C('USER_AUTH_KEY'), $res['id']);
            session('roleid', $res['roleid']);
            session('username', $res['username']);

            //保存登陆信息
            $data = array();
            $data['id'] = $res['id'];
            $data['last_time'] = time();
            $data['ip'] = ip();
            $m->save($data);

            //cookie
            import("ORG.Util.Cookie");
            $cookietime = intval($_POST['cookietime']);
            if (!empty($cookietime)) {
                Cookie::set('uid', $res['id'], $cookietime);
            } else {
                Cookie::delete('uid');
            }  


            header('Location:?m=Index');
        } else {
            $this->error(L('password_no'),'?m=Login&a=index');
        }
    }

    //退出
    public function logout() {
        $auth_id = session(C('USER_AUTH_KEY'));
       
        if ($auth_id) {
            session(C('USER_AUTH_KEY'), null);
            session('username', null);
            cookie('uid',null);
            //header('Location:?m=Login');
            $this->success('安全退出','?m=Login&a=index');
            
            
        } else {
            $this->error('已经退出');
        }
    }

    //验证码
    public function verify() {
        import("ORG.Util.Image");
        Image::buildImageVerify(4, 1, 'png', 60, 29);
    }

}
