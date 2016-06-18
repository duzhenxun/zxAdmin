<?php

/*
 * 角色模块
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年1月8日 17:51:43
 */

class RoleModel extends Model {

    protected $_validate = array(
        array('rolename','require','角色名必须'), //默认情况下用正则进行验证
    );
   
    
    

}
