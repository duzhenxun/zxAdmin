<?php

/*
 * 管理员模块
 * Author: DuZhenxun <5552123@qq.com>
 * @  2015年1月7日 12:36:20
 */

class AdminModel extends Model {

    protected $_validate = array(
       
        
        array('username','require','帐号名称必须'), //默认情况下用正则进行验证
        //array('username','','帐号名称已经存在',1,'unique','1'), // 在新增的时候验证name字段是否唯一

        array('password','require','密码必须',), //默认情况下用正则进行验证
        
        array('email','email','Email格式不正确'), //默认情况下用正则进行验证
        array('realname','require','真实姓名必须'), //默认情况下用正则进行验证
        
        array('oldpassword','require','旧密码必须'), //默认情况下用正则进行验证
        array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        
        array('verify','require','验证码必须',0), //默认情况下用正则进行验证
        array('verify', 'check_verify', '验证码不正确！', '0', 'callback', 3),
        //array('password', 'check_password', '密码不正确！', '1', 'callback', 3),
    
    );
    protected $_auto = array(
        array('ip', 'ip', 3, 'function'),
        array('last_time', 'time', 2, 'function'),
        array('add_time', 'time', 1, 'function'),
    );

    //验证码检测
    public function check_verify($data) {
        if ($_SESSION['verify'] != md5($data)) {
            return false;
        } else {
            return true;
        }
    }
    
    
    
    //密码检测
    public function check_password($username,$password) {
       
        $where['username'] = $username; 
        $res = $this->where($where)->find();
        if($res['password']!=md5($password)){
            return false;
        }else{ 
            return $res;
        }
    }
    
    //通过ID获取管理员信息
    public function info($id){
        $where['id']=$id;
        $res = $this->where($where)->find();
        if($res){
            return $res;
        }else{
            return false;
        }
    }
    
    
    
    

}
