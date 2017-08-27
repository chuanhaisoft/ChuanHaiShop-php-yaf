
ChuanHaiShop 采用php的yaf内存框架开发，运行速度极快，自身集成orm，使用灵活，sql语句的执行采用sql预处理方式，从根源上避免了sql注入，业务逻辑大量采用行锁，事务，运行稳定。


1.数据库信息修改：protected\config\application.ini

2.环境要求：php>=5.4  yaf最新版即可,开启yaf命名空间

3.微信支付证书位置：\m\weixin\cert\

4.shell服务：php -f /web路径/cmd.php request_uri=/cmd/order/do


前端演示：http://www.chuanhaisoft.com/


后台演示：http://demo.chuanhaisoft.com/chuanhai/
用户名:admin 密码:chuanhaisoft
