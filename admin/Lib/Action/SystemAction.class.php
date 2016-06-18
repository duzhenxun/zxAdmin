<?php

/*
 * 系统设置
 * Author: DuZhenxun <5552123@qq.com>
 * @  2015年1月16日 15:54:08
 */

class SystemAction extends CommonAction {

    public function _initialize() {
        //exit('因SVN问题先禁用，手动配置后提交SVN');
        parent::_initialize();
        
    }

    public function index() {
        $path = CONF_PATH . 'system.php';
        if (isset($_POST['dosubmit'])) {
            foreach ($_POST['system'] as $k => $v) {
                $v = explode("\r\n", trim($v));
                foreach ($v as $kk => $vv) {
                    $tem = explode("|", $vv);
                    $data[$k][$tem[0]] = $tem[1];
                }
            }
            $data = "<?php\n\n/*\n* 系统设置\n* Author: DuZhenxun <5552123@qq.com>\n* @ ".date('Y-m-d H:i:s')."\n*/\nreturn ".var_export($data, true).";\n?>";
            $res = file_put_contents($path, $data);
            if ($res) {
                $this->success(L('ok'), '?m=' . MODULE_NAME);
            } else {
                $this->error(L('no'));
            }
        } else {
            $data = include $path;
            $this->assign('data', $data);
            $this->display();
        }
    }

}
