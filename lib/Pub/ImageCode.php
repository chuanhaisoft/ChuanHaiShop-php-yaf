<?php
namespace Pub;

class ImageCode
{
    private $charset = 'abcdefghkmnprstuvwxyz23456789ABCDEFGHKMNPRSTUVWXYZ';//字符来源
    private $code;//验证码
    private $code_len = 4;//验证码字符长度
    private $width = 130;//图片宽度
    private $height = 50;//图片高度
    private $img;//图形资源句柄
    private $font;//字体
    private $font_size = 30;//字体大小
    private $font_color;//字体颜色
    
    public function __construct() 
    {
     $this->font = realpath(APP_PATH.'/../font/GOTHIC.TTF');//字体路径要写对，否则显示不了图片
    }
    //生成随机码
    private function Draw_Code() 
    {
         $Len = strlen($this->charset)-1;
         for ($i=0;$i<$this->code_len;$i++) 
         {
             $this->code .= $this->charset[mt_rand(0,$Len)];
         }
    }
    //生成背景
    private function Draw_Bg() 
    {
         $this->img = imagecreatetruecolor($this->width, $this->height);
         $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
         imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
    }
    //生成文字
    private function Draw_Font() 
    {
         $x = $this->width / $this->code_len;
         for ($i=0;$i<$this->code_len;$i++) 
         {
             $this->font_color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
             imagettftext($this->img,$this->font_size,mt_rand(-30,30),$x*$i+mt_rand(1,5),$this->height / 1.4,$this->font_color,$this->font,$this->code[$i]);
         }
    }
    //生成线条、雪花
    private function Draw_Line() 
    {
         //画线条
         for ($i=0;$i<6;$i++) 
         {
             $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
             imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
         }
         //画雪花
         for ($i=0;$i<100;$i++) 
         {
             $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
             imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
         }
    }
    //输出
    private function Out_Put() 
    {
         header('Content-type:image/png');
         imagepng($this->img);
         imagedestroy($this->img);
    }
    //调用
    public function Do_Img() 
    {
         $this->Draw_Bg();
         $this->Draw_Code();
         $this->Draw_Line();
         $this->Draw_Font();
         Fram::SetSession('sys_code_pic', $this->Get_Code());
         $this->Out_Put();
    }
    //获取验证码
    public function Get_Code() 
    {
         return strtolower($this->code);
    }
}
