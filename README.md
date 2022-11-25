
ChuanHaiShop 采用php的yaf内存框架开发，运行速度极快，自身集成orm，使用灵活，sql语句的执行采用sql预处理方式，从根源上避免了sql注入，业务逻辑大量采用行锁，事务，运行稳定。

ChuanHaiShop为b2c版本，但表结构已经设计为多商户，使用者可根据需要方便的自行改造为b2b2c.

产品特征：

  多规格可以设置多价格，规格自定义

  运费支持设置省级运费
  
  产品价格由 金额和积分2部分，积分用来抵扣现金，价格设置支持2位小数
  
  

配置：

1.安装:http://domain/install/index.php

2.环境要求：php>=5.4 (支持php7) yaf最新版即可,开启yaf命名空间

3.微信支付证书位置：\m\weixin\cert\

4.shell服务：php -f /web路径/cmd.php request_uri=/cmd/order/do

<a href="http://soft.yunhuatong.com/">川海软件</a>




后台地址：http://xxx.xxx.com/chuanhai
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
    
<img src="http://shop.yunhuatong.com/images/shows/shop1.jpg?a=2" >
<img src="http://shop.yunhuatong.com/images/shows/shop2.jpg?a=2" >

app端：


<img src="http://shop.yunhuatong.com/images/shows/app1.gif?a=3" width="300px">
<img src="http://shop.yunhuatong.com/images/shows/app2.gif?a=3" width="300px">
<img src="http://shop.yunhuatong.com/images/shows/app3.jpg?a=3" width="300px">
<img src="http://shop.yunhuatong.com/images/shows/app4.jpg?a=3" width="300px">

移动web端:


<img src="http://shop.yunhuatong.com/images/shows/mobile1.png?a=2" width="300px">
<img src="http://shop.yunhuatong.com/images/shows/mobile2.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile3.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile4.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile5.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile6.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile7.png?a=2"  width="300px">
<img src="http://shop.yunhuatong.com/images/shows/mobile8.png?a=2"  width="300px">
<img src="http://shop.yunhuatong.com/images/shows/mobile9.png?a=2" width="300px" >
<img src="http://shop.yunhuatong.com/images/shows/mobile10.png?a=2"  width="300px">
<img src="http://shop.yunhuatong.com/images/shows/mobile11.png?a=2" width="300px" >


管理端：


<img src="http://shop.yunhuatong.com/images/shows/houtai1.png?a=2" >
<img src="http://shop.yunhuatong.com/images/shows/houtai2.png?a=2" >
<img src="http://shop.yunhuatong.com/images/shows/houtai3.png?a=2" >
<br/>川海app：
<img src="http://shop.chuanhaisoft.com/upload/auto/2018/01/08/15/36/59/36615079672.jpg?a=2" >
<br/>客服桌面端截图：
<br/>
<img src="http://shop.yunhuatong.com/images/shows/ChuanHaiIm.jpg?a=2" >
