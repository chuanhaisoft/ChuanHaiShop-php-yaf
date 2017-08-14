川海商城，使用php的yaf框架开发

1.数据库信息修改：protected\config\application.ini

2.环境要求：php>=5.4  yaf最新版即可,开启yaf命名空间

3.微信支付证书位置：\m\weixin\cert\

4.shell服务：php -f /web路径/cmd.php request_uri=/cmd/order/do


前端演示地址:http://shop.yunhuatong.com/
后端演示地址：http://demo.yunhuatong.com/chuanhai/ 用户名:admin 密码:chuanhaisoft

代码下载地址：http://pan.baidu.com/s/1kVDps2N




川海商城 内封装了orm，数据库操作基于sql预处理，从根本上杜绝了sql注入。
