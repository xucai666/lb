<?php
  /**
   *Thumb Generator using GD Library
   *Created By: Syed Abdul Baqi.
   *Date: 11th July 2009   
   *
   *Usage:
   *$image = new Imagethumb(<source file path>, [aspect ratio(DEFAULT = false)]);   
   *$image->getThumb(<thumb file path>, (int)<thumb image width>, (int)<thumb image heigth>);
   *         
   */           


  class image_thumb
  {
    public $height;
    public $width;
    public $type;
    public $aspect = false;
    public $thumb;
    public $height_t = 100;
    public $width_t = 100;
    public $filename;

    function __construct()
    {
     
    }
    
    /**
     * Short description. 
     *
     * Detail description
     * @param      none
     * @global     none
     * @since      1.0
     * @access     private
     * @return     void
     * @update     date time
    */
    function setBig($filename, $aspect = false)
    {
	    $this->filename = $filename;
      $this->aspect = $aspect;
      $image = getimagesize($this->filename);
      $this->width = $image[0];
      $this->height = $image[1];
      $this->percent = number_format($image[0]/$image[1],2);

      $this->type = $image['mime'];
        
    } // end func
    function getThumb($thumb, $width_t, $height_t)
    {
      $this->thumb = $thumb;
      //compress with percent
      if($this->percent>1){
         $height_t = round($height_t/$this->percent);
      }else{
        $width_t = round($height_t*$this->percent);
      }

      $this->width_t  = $width_t;
      $this->height_t  = $height_t;
      
      if($this->aspect == true)
      {
        $this->setAspect();
      }
      switch($this->type)
      {
        case 'image/jpg':
        case 'image/jpeg':
        case 'image/pjpeg':
          $this->createJpeg();
        break;

        case 'image/png':
        case 'image/x-png':
          $this->createPng();
        break;

        case 'image/gif':
          $this->createGif();
        break;

        case 'image/bmp':
        case 'image/wbmp':
          $this->createBmp();
        break;
      }
    }
    
    function createJpeg()
    {
      $src = imagecreatefromjpeg($this->filename);
      $desc = imagecreatetruecolor($this->width_t, $this->height_t);
      imagecopyresampled($desc, $src, 0, 0, 0, 0, $this->width_t, $this->height_t, $this->width, $this->height);
      imagejpeg($desc, $this->thumb);
    }

    function createPng()
    {
      $src = imagecreatefrompng($this->filename);
      $desc = imagecreatetruecolor($this->width_t, $this->height_t);
      imagecopyresampled($desc, $src, 0, 0, 0, 0, $this->width_t, $this->height_t, $this->width, $this->height);
      imagepng($desc, $this->thumb);
    }

    function createGif()
    {
      $src = imagecreatefromgif($this->filename);
      $desc = imagecreatetruecolor($this->width_t, $this->height_t);
      imagecopyresampled($desc, $src, 0, 0, 0, 0, $this->width_t, $this->height_t, $this->width, $this->height);
      imagegif($desc, $this->thumb);
    }

    function createBmp()
    {
      $src = imagecreatefromwbmp($this->filename);
      $desc = imagecreatetruecolor($this->width_t, $this->height_t);
      imagecopyresampled($desc, $src, 0, 0, 0, 0, $this->width_t, $this->height_t, $this->width, $this->height);
      imagewbmp($desc, $this->thumb);
    }
    
    function setAspect()
    {
      $ratio_width = $this->width/$this->width_t;
      $ratio_height = $this->height/$this->height_t;
      if($ratio_width > $ratio_height)
      {
        $this->height_t = $this->height/$ratio_width;
      }
      else
      {
        $this->width_t = $this->width/$ratio_height;
      }
    }
  }
?>