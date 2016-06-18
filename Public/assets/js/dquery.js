/*
 * dQuery v1.0.1 ~ Copyright (c) 2013 DuZhenxun ,5552123@qq.com
 * 2013年8月3日 16:12:20
 */
;
(function(window, undefined){
    var dQuery = function(strs){
        var that = this;
        //值初始化
        that.str = {
            //添加的链接
            addurl: null,
            //修改页面
            changeurl: false,
           
        };
        for (i in strs) {
            that.str[i] = strs[i];
        }
        
        _dquery = this;
        
        //为真是自动加载
        if (this.str.changeurl == true) {
        
            this.changeUrl();
            
        }
        
    };
    
    // Prototype
    dQuery.prototype = {
    
        /**
         * 事件添加，监听
         * @param 对像 obj
         * @param 事件 sEv
         * @param 回调函数 fn
         * 例：addEvent(document,"click",fn);  addEvent(document, "deviceready", fn)
         * 2013年8月3日 16:14:01
         */
        addEvent: function(obj, sEv, fn){
            if (obj.attachEvent) {
                // obj.attachEvent('on'+sEv,fn);
                obj.attachEvent('on' + sEv, function(){
                    fn.call(obj);
                }); // 有时ie会取不到对像，所以用call多传一个参数
            }
            else {
                obj.addEventListener(sEv, fn, false);
            }
        },
        
        /**
         * storage缓存方法
         * @param str	存还是取
         * @param key	键
         * @param val	值
         * @param s 	有值表示 sessionStorage
         * @autho DuZhenxun
         * @2013年3月7日 15:18:25
         */
        storage: function(str, key, val, s){
            switch (str) {
                case 'set':
                    !s ? localStorage.setItem(key, val) : sessionStorage.setItem(key, val);
                    break;
                case 'get':
                    return !s ? localStorage.getItem(key) : sessionStorage.getItem(key);
                    break;
                case 'rem':
                    !s ? localStorage.removeItem(key) : sessionStorage.removeItem(key);
                    break;
                case 'clear':
                    !s ? localStorage.clear() : sessionStorage.clear();
                    break;
                // 保存json数据
                case 'setJson':
                    var str = JSON.stringify(val);
                    !s ? localStorage.setItem(key, str) : sessionStorage.setItem(key, str);
                // 取出json数据
                case 'getJson':
                    var str = !s ? localStorage.getItem(key) : sessionStorage.getItem(key);
                    if (str) {
                        return JSON.parse(str);
                    }
                    else {
                        return false;
                    }
            }
        },
        
        
        /**
         * 取获地栏参数据的值
         * @param  key
         * 例：get('tn');
         */
        get: function(key){
            var seachUrl = window.location.search.replace("?", "");
            var itemArr = seachUrl.split("&"); //使用&分成数组 name=a1,bbb=b1
            var args = Array(), item = Array();
            
            for (var i = 0; i < itemArr.length; i++) {
                item = itemArr[i].split("="); //合用=号将其分成数组
                args[item[0]] = item[1];
            }
            //如果传入了KEY返回KEY对应的值，如果没有传入，返回整个数组
            if (key) {
                return args[key];
            }
            else {
                return args;
            }
        },
        
        
        /**
         * AJAX获取数据
         * @param 远程地址 geturl
         * @param 是否异步 async 默认为true
         */
        getData: function(geturl){
        
            var res = '';
            
            $.ajax({
                dataType: "json",
                url: geturl,
                async: true,
                success: function(json){
                    res = json;
                    //  console.log(res);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    console.log(XMLHttpRequest.status);
                    console.log(XMLHttpRequest.readyState);
                    console.log(textStatus);
                },
                complete: function(XMLHttpRequest, textStatus){
                    //console.log(this); // 调用本次AJAX请求时传递的options参数
                }
            });
            return res;
        },
        
        /**
         * 修改页面链接地址，添加推广人信息，如果是http开头，则取删除返回按钮事件
         */
        changeUrl: function(){
        
            var html_a = document.getElementsByTagName('a');
            var num = html_a.length;
            
            for (var i = 0; i < num; i++) {
                var href = html_a[i].href;
                
                if (href.indexOf('javascript:') == -1 && href.indexOf('#') == -1) {
                    if (href.indexOf('http://') != -1) {
                        this.addEvent(html_a[i], 'click', function(){
                            document.removeEventListener("backbutton", _dquery.onBackKeyDown, false);
                        });
                    }
                    else {
                        //如果URL后面还要附加
                        if (_dquery.str.addurl) {
                            if (href.indexOf('?') != -1) {
                                html_a[i].href = href + '&' + _dquery.str.addurl;
                            }
                            else {
                                html_a[i].href = href + '?' + _dquery.str.addurl;
                            }
                        }
                        
                    }
                }
                
            }
            
          
        },
        
        
        
        
        /**
         * 设备加载完后要做事
         *
         */
        devok: function(fn){
            document.addEventListener("deviceready", fn, false)
        },
        
        
 
        
        //菜单 只测试暂不使用，
        onMenuKeyDown: function(){
            navigator.notification.alert('当前版本号：' + versionName +
            '\n版权所有：www.xxx.cn', function(){
            }, '关于我们', '确定');
        },
        
        //文件下载
        down: function(downurl){
            navigator.app.loadUrl(downurl, {
                openExternal: true
            });
        },
        //插件
        plugin:{
        	otherShare:function(jsonArr){
        		cordova.exec(null,null,"AppShare","otherShare",[jsonArr]);
        	}
        },
        
        // 打印
        p: function(str){
            console.log(str);
        },
        
        
        //地址
        localUrl: function(str){
        
            var localUrl = window.location.href.toString();
            if (str == 'all') {
                return localUrl;
            }
            else {
                return localUrl.slice(localUrl.lastIndexOf('/') + 1);
            }
            
        },
        confirm: function(str,url){
            var r = confirm(str);
            if(r==true){
                return window.location.href=url;
            }
        },
        
        base64: new (function(){
        
            // private property
            _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
            
            // public method for encoding
            this.encode = function(input){
                var output = "";
                var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
                var i = 0;
                input = _utf8_encode(input);
                while (i < input.length) {
                    chr1 = input.charCodeAt(i++);
                    chr2 = input.charCodeAt(i++);
                    chr3 = input.charCodeAt(i++);
                    enc1 = chr1 >> 2;
                    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                    enc4 = chr3 & 63;
                    if (isNaN(chr2)) {
                        enc3 = enc4 = 64;
                    }
                    else 
                        if (isNaN(chr3)) {
                            enc4 = 64;
                        }
                    output = output +
                    _keyStr.charAt(enc1) +
                    _keyStr.charAt(enc2) +
                    _keyStr.charAt(enc3) +
                    _keyStr.charAt(enc4);
                }
                return output;
            }
            
            // public method for decoding
            this.decode = function(input){
                var output = "";
                var chr1, chr2, chr3;
                var enc1, enc2, enc3, enc4;
                var i = 0;
                input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
                while (i < input.length) {
                    enc1 = _keyStr.indexOf(input.charAt(i++));
                    enc2 = _keyStr.indexOf(input.charAt(i++));
                    enc3 = _keyStr.indexOf(input.charAt(i++));
                    enc4 = _keyStr.indexOf(input.charAt(i++));
                    chr1 = (enc1 << 2) | (enc2 >> 4);
                    chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                    chr3 = ((enc3 & 3) << 6) | enc4;
                    output = output + String.fromCharCode(chr1);
                    if (enc3 != 64) {
                        output = output + String.fromCharCode(chr2);
                    }
                    if (enc4 != 64) {
                        output = output + String.fromCharCode(chr3);
                    }
                }
                output = _utf8_decode(output);
                return output;
            }
            
            // private method for UTF-8 encoding
            _utf8_encode = function(string){
                string = string.replace(/\r\n/g, "\n");
                var utftext = "";
                for (var n = 0; n < string.length; n++) {
                    var c = string.charCodeAt(n);
                    if (c < 128) {
                        utftext += String.fromCharCode(c);
                    }
                    else 
                        if ((c > 127) && (c < 2048)) {
                            utftext += String.fromCharCode((c >> 6) | 192);
                            utftext += String.fromCharCode((c & 63) | 128);
                        }
                        else {
                            utftext += String.fromCharCode((c >> 12) | 224);
                            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                            utftext += String.fromCharCode((c & 63) | 128);
                        }
                    
                }
                return utftext;
            }
            
            // private method for UTF-8 decoding
            _utf8_decode = function(utftext){
                var string = "";
                var i = 0;
                var c = c1 = c2 = 0;
                while (i < utftext.length) {
                    c = utftext.charCodeAt(i);
                    if (c < 128) {
                        string += String.fromCharCode(c);
                        i++;
                    }
                    else 
                        if ((c > 191) && (c < 224)) {
                            c2 = utftext.charCodeAt(i + 1);
                            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                            i += 2;
                        }
                        else {
                            c2 = utftext.charCodeAt(i + 1);
                            c3 = utftext.charCodeAt(i + 2);
                            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                            i += 3;
                        }
                }
                return string;
            }
        })(),
    
    
    
    };
    window.dQuery = dQuery;
    
})(window);



dq = new dQuery();
