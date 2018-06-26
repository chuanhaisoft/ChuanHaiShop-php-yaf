
ChuanHaiShop 采用php的yaf内存框架开发，运行速度极快，自身集成orm，使用灵活，sql语句的执行采用sql预处理方式，从根源上避免了sql注入，业务逻辑大量采用行锁，事务，运行稳定。

ChuanHaiShop为b2c版本，但表结构已经设计为多商户，使用者可根据需要方便的自行改造为b2b2c.

产品特征：

  多规格可以设置多价格，规格自定义

  运费支持设置省级运费
  
  产品价格由 金额和积分2部分，积分用来抵扣现金，价格设置支持2位小数
  
  

配置：

1.数据库信息修改：protected\config\application.ini

2.环境要求：php>=5.4 (支持php7) yaf最新版即可,开启yaf命名空间

3.微信支付证书位置：\m\weixin\cert\

4.shell服务：php -f /web路径/cmd.php request_uri=/cmd/order/do

<a href="http://www.chuanhaisoft.com">川海软件</a>

移动端vue版本预览：http://shop.chuanhaisoft.com/mobile/index.html

手机端扫码：

<img src="http://shop.chuanhaisoft.com/images/shows/mobile.png" >

浏览器版本预览:   http://shop.chuanhaisoft.com


后台演示：http://demo.chuanhaisoft.com/chuanhai/
用户名:admin 密码:chuanhaisoft

川海即时通讯插件助您整合咨询系统，商家可使用桌面版与用户的web版在线交流，提高订单成交。（websocket通讯，并做了ie低版本兼容）

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
    
<img src="http://shop.chuanhaisoft.com/images/shows/shop1.jpg" >
<img src="http://shop.chuanhaisoft.com/images/shows/shop2.jpg" >

app端：


<img src="http://shop.chuanhaisoft.com/images/shows/app1.gif?a=1" width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/app2.gif?a=1" width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/app3.gif?a=1" width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/app4.gif?a=1" width="300px">

移动web端:


<img src="http://shop.chuanhaisoft.com/images/shows/mobile1.png?a=1" width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/mobile2.png?a=1" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile3.png?a=1" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile4.png?a=1" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile5.png?a=1" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile6.png?a=1" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile7.png"  width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/mobile8.png"  width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/mobile9.png" width="300px" >
<img src="http://shop.chuanhaisoft.com/images/shows/mobile10.png"  width="300px">
<img src="http://shop.chuanhaisoft.com/images/shows/mobile11.png" width="300px" >


管理端：


<img src="http://shop.chuanhaisoft.com/images/shows/houtai1.jpg" >
<img src="http://shop.chuanhaisoft.com/images/shows/houtai2.jpg" >
<img src="http://shop.chuanhaisoft.com/images/shows/houtai3.jpg" >
<br/>川海app：
<img src="http://shop.chuanhaisoft.com/upload/auto/2018/01/08/15/36/59/36615079672.jpg" >
<br/>客服桌面端截图：
<br/>
<img src="http://shop.chuanhaisoft.com/images/shows/ChuanHaiIm.jpg" >
