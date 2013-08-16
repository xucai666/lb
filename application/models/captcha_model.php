<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Modle
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Vcode_model extends CI_Model
{
public $width  = 57; //宽度
public $height = 20; //高度
public $len    = 4;  //字符长度
public $backcolor  = '#F6F6F6' ;  //背景色
public $bordercolor = null;   //边框色
public $noisenum  = NULL ;  //杂点数量
 
public $textsize = 10;    //字体大小
public $font ;    //自定义字体
public $imagename ;
protected $image ;   //图片变量
protected $backcolorRGB ;  //背景色RGB
protected $bordercolorRGB = null;   //边框色
protected $size;   //每个字符的宽度(px)
protected $sizestr2str;  //字符间距
public $vcode  = NULL; //验证码内容(数字)
function __construct()
{
  parent::__construct();
  $this->font = APPPATH."../../font/04B_08.TTF";  
  
}
public function show_img()
{
  header("Content-type: image/png");
  //$this->imagename = 'vcode/'.md5(date("YmdHis").$this->vcode).'.png';
  //imagePng($this->image,$this->imagename);
  imagePng($this->image);
  imagedestroy($this->image);
}
 
public function make_img()
{
  $this->image = imageCreate($this->width, $this->height); //创建图片
  $this->backcolorRGB = $this->getcolor($this->backcolor);   //将#ffffff格式的背景色转换成RGB格式
  imageFilledRectangle($this->image, 0, 0, $this->width, $this->height, $this->backcolorRGB); //画一矩形 并填充
  $this->size = $this->width/$this->len; //宽度除以字符数 = 每个字符需要的宽度
  if($this->size>$this->height) $this->size=$this->height; //如果 每个字符需要的宽度 大于图片高度 则 单字符宽度=高度(正方块)
  $this->sizestr2str = $this->size/10 ; //以每个字符的1/10宽度为 字符间距
  $left = ($this->width-$this->len*($this->size+$this->sizestr2str))/$this->size;   // (验证码图片宽度 - 实际需要的宽度)/每个字符的宽度 = 距离左边的宽度
  for ($i=0; $i<$this->len; $i++)
  {
   $randtext = rand(0, 9);  //验证码数字 0-9随机数
   $this->vcode .= $randtext; //写入session的数字
   $textColor = imageColorAllocate($this->image, rand(50, 155), rand(50, 155), rand(50, 155)); //图片文字颜色
   if (!isset($this->textsize) ) $this->textsize = rand( ($this->size-$this->size/10), ($this->size + $this->size/10) ); //如果未定义字体大小 则取随机大小 
   $location = $left + ($i*$this->size+$this->size/10);
   imagettftext($this->image, $this->textsize, rand(-18,18), $location, rand($this->size-$this->size/10, $this->size+$this->size/10), $textColor, $this->font, $randtext); //生成单个字体图象
  }
  if( isset($this->noisenum)) $this->setnoise(); //杂点处理  
  $this->session->set_userdata('sys_valid_code', $this->vcode);  
  if(isset($this->bordercolor)) //边框处理
  {
   $this->bordercolorRGB = $this->getcolor($this->bordercolor);
   imageRectangle($this->image, 0, 0, $this->width-1, $this->height-1, $this->bordercolorRGB);
  }
  
}
 
protected function getcolor($color)
{
  $color = eregi_replace ("^#","",$color);
  $r = $color[0].$color[1];
  $r = hexdec ($r);
  $b = $color[2].$color[3];
  $b = hexdec ($b);
  $g = $color[4].$color[5];
  $g = hexdec ($g);
  $color = imagecolorallocate ($this->image, $r, $b, $g);
  return $color;
}
protected function setnoise()
{
  for ($i=0; $i<$this->noisenum; $i++)
  {
   $randColor = imageColorAllocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
   imageSetPixel($this->image, rand(0, $this->width), rand(0, $this->height), $randColor);
  }
}
}