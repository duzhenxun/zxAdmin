<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login Admin</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-part2.css" />
        <![endif]-->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-rtl.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-ie.css" />
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="__PUBLIC__/assets/js/html5shiv.js"></script>
        <script src="__PUBLIC__/assets/js/respond.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row col-xs-12">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <!-- #section:pages/error -->
                        <div class="col-xs-12"></div>
                        <div class="error-container col-xs-12 center">
                            <div class="well">
                                <h1 class="grey lighter smaller">
                                    <span class="blue bigger-125">
                                        <?php if(isset($message)): ?><p class="success"><?php echo($message); ?>！</p>
                                            <?php else: ?>
                                            <p class="error red" ><?php echo($error); ?>！</p><?php endif; ?>
                                    </span>
                                </h1>

                                <hr>
                                <h3 class="lighter smaller">

                                    页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>

                                </h3>
                                <div class="space"></div>
                                <hr>
                                <div class="space"></div>
                                <div class="center">
                                 
                                    <a href="<?php echo($jumpUrl); ?>" class="btn btn-primary">
                                        <i class="ace-icon fa fa-tachometer"></i>
                                        返回
                                    </a>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-3"></div>
                        <!-- /section:pages/error -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div>




            </div><!-- /.main-content -->
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

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            (function() {
                var wait = document.getElementById('wait'), href = document.getElementById('href').href;
                var interval = setInterval(function() {
                    var time = --wait.innerHTML;
                    if (time <= 0) {
                        location.href = href;
                        clearInterval(interval);
                    }
                    ;
                }, 1000);
            })();
        </script>
    </body>
</html>