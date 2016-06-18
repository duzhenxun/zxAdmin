<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>云狐后台管理系统</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome.css" />

        <!-- page specific plugin styles -->
    

    <!-- text fonts -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
            <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-part2.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-ie.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="__PUBLIC__/assets/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="__PUBLIC__/assets/js/html5shiv.js"></script>
    <script src="__PUBLIC__/assets/js/respond.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
    <!-- #section:basics/navbar.layout -->


<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
         
         <script type="text/javascript">
    try {
        ace.settings.check('breadcrumbs', 'fixed')
    } catch (e) {
    }
</script>



<!-- #section:settings.box -->
<div class="ace-settings-container" id="ace-settings-container">
    <div class="btn btn-app btn-xs btn-default ace-settings-btn" id="ace-settings-btn">
        <i class="ace-icon fa fa-cog bigger-130"></i>
    </div>

    <div class="ace-settings-box clearfix" id="ace-settings-box">
        <div class="pull-left width-50">
            <!-- #section:settings.skins -->
            <div class="ace-settings-item">
                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                <label class="lbl" for="ace-settings-navbar"> 固定头部</label>
            </div>
            <div class="ace-settings-item">
                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                <label class="lbl" for="ace-settings-sidebar"> 固定菜单</label>
            </div>
            <div class="ace-settings-item">
                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                <label class="lbl" for="ace-settings-add-container">
                    宽屏切换
                </label>
            </div>
        </div><!-- /.pull-left -->


    </div><!-- /.ace-settings-box -->
    
    
    
    
</div><!-- /.ace-settings-container -->

<!-- /section:settings.box -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa"></i>
                   后台管理 
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <!-- #section:basics/navbar.user_menu -->
               
                <li class="light-blue hidden-480">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="__PUBLIC__/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
                            <?php echo session('username');?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="?m=Admin&a=public_edit_info">
                                <i class="ace-icon fa fa-user"></i>
                                修改个人信息
                            </a>
                        </li>

                        <li>
                            <a href="?m=Admin&a=public_edit_pwd">
                                <i class="ace-icon fa fa-cog"></i>
                                修改密码
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="?m=Login&a=logout">
                                <i class="ace-icon fa fa-power-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
               
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->


<div class="main-container container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success" onclick="location.href = '?m=Task&a=top'">
                    <i class="ace-icon fa fa-tasks"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <!-- #section:basics/sidebar.layout.shortcuts -->
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>

                <!-- /section:basics/sidebar.layout.shortcuts -->
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->



        <!--菜单-->
        <!-- include file="Layout:menu" / -->
        <?php echo W('Menu',array('menus'=>$menus,'new_count'=>$new_count));?>
        <!-- /.nav-list -->




        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {
            }
        </script>
    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="main-content-inner">

            <!-- .page-content -->
            <div class="page-content  <?php echo (MODULE_NAME); ?>">
                

<?php echo W('PageHeader',array('name'=>$action_name));?>

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="widget-main">
            <form action="" method="post" name="myform" class="form-horizontal">
                
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 账号 </label>
                    <div class="col-sm-9">
                        <input type="text" name="username" readonly value="<?php echo ($data["username"]); ?>" class="col-xs-10 col-sm-5">
                       
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 旧密码 </label>
                    <div class="col-sm-9">
                         <input type="password" name="oldpassword"  value=""  class="col-xs-10 col-sm-5">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码 </label>
                    <div class="col-sm-9">
                         <input type="password" name="password"  value=""  class="col-xs-10 col-sm-5">
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认新密码 </label>
                    <div class="col-sm-9">
                         <input type="password" name="repassword"  value=""  class="col-xs-10 col-sm-5">
                    </div>
                </div>
                
             
                
                <?php if($_GET["id"] > 0): ?><input type='hidden' name='id' value="<?php echo ($_GET["id"]); ?>"><?php endif; ?>
               

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button" onclick="myform.submit()">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            提交
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            重置
                        </button>
                    </div>
                </div>
                
                <input type='hidden' name='dosubmit' value='ok'>
            </form>
        </div>
    </div>
</div>



            </div>
            <!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content" style="display: none">
                <span class="bigger-120">
                    <span class="blue bolder">云狐</span>
                    后台管理 &copy; 2014-2015
                </span>

                &nbsp; &nbsp;
                <span class="action-buttons">
                    <a href="#">
                        <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                    </a>

                    <a href="#">
                        <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                    </a>

                    <a href="#">
                        <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                    </a>
                </span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='__PUBLIC__/assets/js/jquery.js'>" + "<" + "/script>");
</script>
<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='__PUBLIC__/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='__PUBLIC__/assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="__PUBLIC__/assets/js/bootstrap.js"></script>
<!-- page specific plugin scripts -->

<?php if(!empty($widget["jquery-ui"])): ?><script src="__PUBLIC__/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__PUBLIC__/js/jquery.ui.touch-punch.min.js"></script><?php endif; ?>

<!-- ace scripts -->
<script src="__PUBLIC__/assets/js/ace/ace.js"></script>
<script src="__PUBLIC__/assets/js/ace/ace.sidebar.js"></script>
<script src="__PUBLIC__/assets/js/ace/ace.settings.js"></script>
<script src="__PUBLIC__/assets/js/ace/ace.settings-rtl.js"></script>
<script src="__PUBLIC__/assets/js/ace/ace.settings-skin.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    $(function () {
        $(".pagination a").wrap("<li></li>");
        $(".pagination span").wrap("<li class='active'></li>");
    });
</script>
<!--artDialog-->
<link rel="stylesheet" href="__PUBLIC__/js/artDialog/dialog.css" />
<script src="__PUBLIC__/js/artDialog/dialog.js"></script>
<!--artDialog end-->
<script>
    var u = $(".active").parent();
    var uc = u.attr("class");
    if (uc != 'nav nav-list') {
        u.parent().attr("class", "open active");
    }
    //弹出图片
    function alert_img(url, width, heigth, title) {

        art.dialog({
            padding: 0,
            title: title,
            content: '<img src="' + url + '" width="' + width + '" height="' + heigth + '" />',
            lock: true
        });
    }
    //弹出确认操作
    function alert_del(url, title) {
        art.dialog({
            lock: true,
            background: '#300', // 背景色
            opacity: 0.87, // 透明度
            content: title,
            ok: function () {
                return window.location.href = url;
            },
            cancel: true
        });
    }
</script>
</body>
</html>