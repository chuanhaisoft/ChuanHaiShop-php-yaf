
ChuanHaiShop 采用php的yaf内存框架开发，运行速度极快，自身集成orm，使用灵活，sql语句的执行采用sql预处理方式，从根源上避免了sql注入，业务逻辑大量采用行锁，事务，运行稳定。

表结构支持多商户，使用者可以自行改造成b2b2c.

产品特征：

  多规格可以设置多价格，规格自定义

  运费支持设置省级运费
  
  价格设置支持2位小数

配置：

1.数据库信息修改：protected\config\application.ini

2.环境要求：php>=5.4 (支持php7) yaf最新版即可,开启yaf命名空间

3.微信支付证书位置：\m\weixin\cert\

4.shell服务：php -f /web路径/cmd.php request_uri=/cmd/order/do


前端演示：http://www.chuanhaisoft.com/


后台演示：http://demo.chuanhaisoft.com/chuanhai/
用户名:admin 密码:chuanhaisoft

川海即时通讯插件助您整合咨询系统，商家可使用桌面版与用户的web版在线交流，提高订单成交。

apache配置：<br/>
apache使用.htaccess即可

nginx 配置：
server {<br/>
  listen ****;<br/>
  server_name  domain.com;<br/>
  root   document_root;<br/>
  index  index.php index.html index.htm;<br/>
<br/>
  if (!-e $request_filename) {<br/>
    rewrite ^/(.*)  /index.php/$1 last;<br/>
  }<br/>
}<br/>

 Lighttpd配置：
 $HTTP["host"] =~ "(www.)?domain.com$" {<br/>
  url.rewrite = (<br/>
     "^/(.+)/?$"  => "/index.php/$1",<br/>
  )<br/>
}<br/>

 SAE的配置 (config.yaml)
 
 name: your_app_name<br/>
version: 1<br/>
handle:<br/>
    - rewrite: if(!is_dir() && !is_file() && path ~ "^(.*)$" ) goto "/index.php"<br/>
