<?php
/*
 *  后台首页
 * Author: DuZhenxun <5552123@qq.com>
 * @ 2015年2月2日 09:54:52
 */
class IndexAction extends CommonAction {
   
    /**
     * 控制台
     */
    public function index() {
        $today = date('Y-m-d');
        $filepath = RUNTIME_PATH . '/Cache/';
        
        if (!is_file($filepath . $today . '_count.php')) {
            $data = $this->get_count();
            setcache($data, $today . '_count');
        }
        $count = getcache($today . '_count');
        $this->assign('time', get_time());
        $this->assign('count', $count);
        $this->display();
    }
    
    /**
     * 获取数据总汇
     * @return array
     */
    private function get_count() {
        $time = get_time();
        $count = array();
        $count['user_all'] = getCount('user', "status=1 and wrlogin!=0");
        $count['user_yesterday'] = getCount('user', "status=1 and wrlogin!=0 and add_time > " . $time['yesterday']);
        $count['user_monday'] = getCount('user', "status=1 and wrlogin!=0 and add_time >" . $time['monday']);
        $count['task_all'] = getCount('sports_task');
        $count['task_yesterday'] = getCount('sports_task', "add_time > " . $time['yesterday']);
        $count['task_monday'] = getCount('sports_task', "add_time > " . $time['monday']);
        $count['find_all'] = getCount('sports_find');
        $count['find_yesterday'] = getCount('sports_find', "state=1 and inputtime >" . $time['yesterday']);
        $count['find_monday'] = getCount('sports_find', "state=1 and inputtime >" . $time['monday']);
        $count['user_login_monday'] = getCount('user', "status=1 and wrlogin!=0 and add_time < " . $time['monday'] . " and last_time>" . $time['monday']);

        //硬盘
        $res = exec("df -h |grep /data");
        $disk = explode('|', preg_replace('/\s+/', '|', trim($res)));
        foreach ($disk as $k => $v) {
            $disk[$k] = trim($v, '%');
        }
        $count['disk'] = $disk;
        //内存
        $res = exec("free -m |grep Mem:");
        $mem = explode('|', preg_replace('/\s+/', '|', $res));
        $mem[0] = round($mem[2] / $mem[1] * 100);
        $count['mem'] = $mem;
        return $count;
    }

}
