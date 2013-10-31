<?php
/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2013, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */
if (!defined('IN_CKFINDER')) exit;

/**
 * @package CKFinder
 * @subpackage Utils
 * @copyright CKSource - Frederico Knabben
 */

/**
 * @package CKFinder
 * @subpackage Utils
 * @copyright CKSource - Frederico Knabben
 */
class CKFinder_Connector_Utils_FileSystem
{
    /**
     * @param string $path
     * @return string
     */
    private function trimPathTrailingSlashes($path)
    {
        return rtrim($path, DIRECTORY_SEPARATOR . '/\\');
    }

    /**
     * This function behaves similar to System.IO.Path.Combine in C#, the only diffrenece is that it also accepts null values and treat them as empty string
     *
     * @static
     * @access public
     * @param string $path1 first path
     * @param string $path2 scecond path
     * @return string
     */
    public static function combinePaths($path1, $path2)
    {
        if (is_null($path1))  {
            $path1 = "";
        }
        if (is_null($path2))  {
            $path2 = "";
        }
        if (!strlen($path2)) {
            if (strlen($path1)) {
                $_lastCharP1 = substr($path1, -1, 1);
                if ($_lastCharP1 != "/" && $_lastCharP1 != "\\") {
                    $path1 .= '/';
                }
            }
        }
        else {
            $_firstCharP2 = substr($path2, 0, 1);
            if (strlen($path1)) {
                if (strpos($path2, $path1)===0) {
                    return $path2;
                }
                $_lastCharP1 = substr($path1, -1, 1);
                if ($_lastCharP1 != "/" && $_lastCharP1 != "\\" && $_firstCharP2 != "/" && $_firstCharP2 != "\\") {
                    $path1 .= '/';
                }
            }
            else {
                return $path2;
            }
        }
        return $path1 . $path2;
    }

    /**
     * Check whether $fileName is a valid file name, return true on success
     *
     * @static
     * @access public
     * @param string $fileName
     * @return boolean
     */
    public static function checkFileName($fileName)
    {
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");

        if (is_null($fileName) || !strlen($fileName) || substr($fileName,-1,1)=="." || false!==strpos($fileName, "..")) {
            return false;
        }

        if (preg_match(CKFINDER_REGEX_INVALID_FILE, $fileName)) {
            return false;
        }

        if ($_config->getDisallowUnsafeCharacters()) {
            if (strpos($fileName, ";") !== false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check whether $folderName is a valid folder name, return true on success
     *
     * @static
     * @access public
     * @param string $folderName
     * @return boolean
     */
    public static function checkFolderName($folderName)
    {
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");

        if ($_config->getDisallowUnsafeCharacters()) {
            if (strpos($folderName, ".") !== false) {
                return false;
            }
        }

        return CKFinder_Connector_Utils_FileSystem::checkFileName($folderName);
    }

    /**
     * Check whether $path contains valid folders names
     *
     * @static
     * @access public
     * @param string $path
     */
    public static function checkFolderPath($path){
      $path = substr($path,strpos($path,'/')+1);
      $path = explode('/',trim($path,'/'));
        foreach ( $path as $dir ){
          if ( !empty($dir) && !CKFinder_Connector_Utils_FileSystem::checkFolderName($dir) ){
            return false;
          }
        }

        return true;
    }

    /**
     * Unlink file/folder
     *
     * @static
     * @access public
     * @param string $path
     * @return boolean
     */
    public static function unlink($path)
    {
        /*    make sure the path exists    */
        if(!file_exists($path)) {
            return false;
        }

        /*    If it is a file or link, just delete it    */
        if(is_file($path) || is_link($path)) {
            return @unlink($path);
        }

        /*    Scan the dir and recursively unlink    */
        $files = scandir($path);
        if ($files) {
            foreach($files as $filename)
            {
                if ($filename == '.' || $filename == '..') {
                    continue;
                }
                $file = str_replace('//','/',$path.'/'.$filename);
                CKFinder_Connector_Utils_FileSystem::unlink($file);
            }
        }

        /*    Remove the parent dir    */
        if(!@rmdir($path)) {
            return false;
        }

        return true;
    }

    /**
     * Return file name without extension
     *
     * @static
     * @access public
     * @param string $fileName
     * @param boolean $shortExtensionMode If set to false, extension is everything after a first dot
     * @return string
     */
    public static function getFileNameWithoutExtension($fileName, $shortExtensionMode = TRUE)
    {
        $dotPos = $shortExtensionMode ? strrpos( $fileName, '.' ) : strpos( $fileName, '.' );
        if (false === $dotPos) {
            return $fileName;
        }

        return substr($fileName, 0, $dotPos);
    }

    /**
     * Get file extension
     *
     * @static
     * @access public
     * @param string $fileName
     * @param boolean $shortExtensionMode If set to false, extension is everything after a first dot
     * @return string
     */
    public static function getExtension( $fileName, $shortExtensionMode = TRUE )
    {
        $dotPos = $shortExtensionMode ? strrpos( $fileName, '.' ) : strpos( $fileName, '.' );
        if (false === $dotPos) {
            return "";
        }

        return substr( $fileName, $dotPos + 1 );
    }

    /**
	 * Read file, split it into small chunks and send it to the browser
	 *
     * @static
     * @access public
	 * @param string $filename
	 * @return boolean
	 */
    public static function readfileChunked($filename)
    {
        $chunksize = 1024 * 10; // how many bytes per chunk

        $handle = fopen($filename, 'rb');
        if ($handle === false) {
            return false;
        }
        while (!feof($handle)) {
            echo fread($handle, $chunksize);
            @ob_flush();
            flush();
            @set_time_limit(8);
        }
        fclose($handle);
        return true;
    }

    /**
    * Replace accented UTF-8 characters by unaccented ASCII-7 "equivalents".
    * The purpose of this function is to replace characters commonly found in Latin
    * alphabets with something more or less equivalent from the ASCII range. This can
    * be useful for converting a UTF-8 to something ready for a filename, for example.
    * Following the use of this function, you would probably also pass the string
    * through utf8_strip_non_ascii to clean out any other non-ASCII chars
    *
    * For a more complete implementation of transliteration, see the utf8_to_ascii package
    * available from the phputf8 project downloads:
    * http://prdownloads.sourceforge.net/phputf8
    *
    * @param string UTF-8 string
    * @param string UTF-8 with accented characters replaced by ASCII chars
    * @return string accented chars replaced with ascii equivalents
    * @author Andreas Gohr <andi@splitbrain.org>
    * @see http://sourceforge.net/projects/phputf8/
    */
    public static function convertToAscii($str)
    {
        static $UTF8_LOWER_ACCENTS = NULL;
        static $UTF8_UPPER_ACCENTS = NULL;

        if ( is_null($UTF8_LOWER_ACCENTS) ) {
            $UTF8_LOWER_ACCENTS = array(
  '脿' => 'a', '么' => 'o', '膹' => 'd', '岣? => 'f', '毛' => 'e', '拧' => 's', '啤' => 'o',
  '脽' => 'ss', '膬' => 'a', '艡' => 'r', '葲' => 't', '艌' => 'n', '膩' => 'a', '姆' => 'k',
  '艥' => 's', '峄? => 'y', '艈' => 'n', '暮' => 'l', '魔' => 'h', '峁? => 'p', '贸' => 'o',
  '煤' => 'u', '臎' => 'e', '茅' => 'e', '莽' => 'c', '岷? => 'w', '膵' => 'c', '玫' => 'o',
  '峁? => 's', '酶' => 'o', '模' => 'g', '脓' => 't', '葯' => 's', '臈' => 'e', '膲' => 'c',
  '艣' => 's', '卯' => 'i', '疟' => 'u', '膰' => 'c', '臋' => 'e', '诺' => 'w', '峁? => 't',
  '奴' => 'u', '膷' => 'c', '枚' => 'oe', '猫' => 'e', '欧' => 'y', '膮' => 'a', '艂' => 'l',
  '懦' => 'u', '暖' => 'u', '艧' => 's', '臒' => 'g', '募' => 'l', '茠' => 'f', '啪' => 'z',
  '岷? => 'w', '岣? => 'b', '氓' => 'a', '矛' => 'i', '茂' => 'i', '岣? => 'd', '钮' => 't',
  '艞' => 'r', '盲' => 'ae', '铆' => 'i', '艜' => 'r', '锚' => 'e', '眉' => 'ue', '貌' => 'o',
  '膿' => 'e', '帽' => 'n', '艅' => 'n', '磨' => 'h', '臐' => 'g', '膽' => 'd', '牡' => 'j',
  '每' => 'y', '农' => 'u', '怒' => 'u', '瓢' => 'u', '牛' => 't', '媒' => 'y', '艖' => 'o',
  '芒' => 'a', '木' => 'l', '岷? => 'w', '偶' => 'z', '墨' => 'i', '茫' => 'a', '摹' => 'g',
  '峁? => 'm', '艒' => 'o', '末' => 'i', '霉' => 'u', '寞' => 'i', '藕' => 'z', '谩' => 'a',
  '没' => 'u', '镁' => 'th', '冒' => 'dh', '忙' => 'ae', '碌' => 'u', '臅' => 'e',
            );
        }

        $str = str_replace(
                array_keys($UTF8_LOWER_ACCENTS),
                array_values($UTF8_LOWER_ACCENTS),
                $str
            );

        if ( is_null($UTF8_UPPER_ACCENTS) ) {
            $UTF8_UPPER_ACCENTS = array(
  '脌' => 'A', '脭' => 'O', '膸' => 'D', '岣? => 'F', '脣' => 'E', '艩' => 'S', '茽' => 'O',
  '膫' => 'A', '艠' => 'R', '葰' => 'T', '艊' => 'N', '膧' => 'A', '亩' => 'K',
  '艤' => 'S', '峄? => 'Y', '艆' => 'N', '墓' => 'L', '摩' => 'H', '峁? => 'P', '脫' => 'O',
  '脷' => 'U', '臍' => 'E', '脡' => 'E', '脟' => 'C', '岷€' => 'W', '膴' => 'C', '脮' => 'O',
  '峁? => 'S', '脴' => 'O', '蘑' => 'G', '纽' => 'T', '葮' => 'S', '臇' => 'E', '膱' => 'C',
  '艢' => 'S', '脦' => 'I', '虐' => 'U', '膯' => 'C', '臉' => 'E', '糯' => 'W', '峁? => 'T',
  '弄' => 'U', '膶' => 'C', '脰' => 'Oe', '脠' => 'E', '哦' => 'Y', '膭' => 'A', '艁' => 'L',
  '挪' => 'U', '女' => 'U', '艦' => 'S', '臑' => 'G', '幕' => 'L', '茟' => 'F', '沤' => 'Z',
  '岷? => 'W', '岣? => 'B', '脜' => 'A', '脤' => 'I', '脧' => 'I', '岣? => 'D', '扭' => 'T',
  '艝' => 'R', '脛' => 'Ae', '脥' => 'I', '艛' => 'R', '脢' => 'E', '脺' => 'Ue', '脪' => 'O',
  '膾' => 'E', '脩' => 'N', '艃' => 'N', '膜' => 'H', '臏' => 'G', '膼' => 'D', '拇' => 'J',
  '鸥' => 'Y', '浓' => 'U', '努' => 'U', '漂' => 'U', '泞' => 'T', '脻' => 'Y', '艕' => 'O',
  '脗' => 'A', '慕' => 'L', '岷? => 'W', '呕' => 'Z', '莫' => 'I', '脙' => 'A', '臓' => 'G',
  '峁€' => 'M', '艑' => 'O', '抹' => 'I', '脵' => 'U', '漠' => 'I', '殴' => 'Z', '脕' => 'A',
  '脹' => 'U', '脼' => 'Th', '脨' => 'Dh', '脝' => 'Ae', '臄' => 'E',
            );
        }
        $str = str_replace(
                array_keys($UTF8_UPPER_ACCENTS),
                array_values($UTF8_UPPER_ACCENTS),
                $str
            );
        return $str;
    }

    /**
     * Secure file name from unsafe characters
     *
     * @param string $fileName
     * @access public
     * @static
     * @return string $fileName
     */
    public static function secureFileName($fileName)
    {
      $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
      $fileName = str_replace(array(":", "*", "?", "|", "/"), "_", $fileName);
      if ( $_config->getDisallowUnsafeCharacters() )
      {
        $fileName = str_replace(";", "_", $fileName);
      }
      if ($_config->forceAscii())
      {
        $fileName = CKFinder_Connector_Utils_FileSystem::convertToAscii($fileName);
      }
      return $fileName;
    }

    /**
     * Convert file name from UTF-8 to system encoding
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    public static function convertToFilesystemEncoding($fileName)
    {
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        $encoding = $_config->getFilesystemEncoding();
        if (is_null($encoding) || strcasecmp($encoding, "UTF-8") == 0 || strcasecmp($encoding, "UTF8") == 0) {
            return $fileName;
        }

        if (!function_exists("iconv")) {
            if (strcasecmp($encoding, "ISO-8859-1") == 0 || strcasecmp($encoding, "ISO8859-1") == 0 || strcasecmp($encoding, "Latin1") == 0) {
                return str_replace("\0", "_", utf8_decode($fileName));
            } else if (function_exists('mb_convert_encoding')) {
                /**
                 * @todo check whether charset is supported - mb_list_encodings
                 */
                $encoded = @mb_convert_encoding($fileName, $encoding, 'UTF-8');
                if (@mb_strlen($fileName, "UTF-8") != @mb_strlen($encoded, $encoding)) {
                    return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
                }
                else {
                    return str_replace("\0", "_", $encoded);
                }
            } else {
                return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
            }
        }

        $converted = @iconv("UTF-8", $encoding . "//IGNORE//TRANSLIT", $fileName);
        if ($converted === false) {
            return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
        }

        return $converted;
    }

    /**
     * Convert file name from system encoding into UTF-8
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    public static function convertToConnectorEncoding($fileName)
    {
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        $encoding = $_config->getFilesystemEncoding();
        if (is_null($encoding) || strcasecmp($encoding, "UTF-8") == 0 || strcasecmp($encoding, "UTF8") == 0) {
            return $fileName;
        }

        if (!function_exists("iconv")) {
            if (strcasecmp($encoding, "ISO-8859-1") == 0 || strcasecmp($encoding, "ISO8859-1") == 0 || strcasecmp($encoding, "Latin1") == 0) {
                return utf8_encode($fileName);
            } else {
                return $fileName;
            }
        }

        $converted = @iconv($encoding, "UTF-8", $fileName);

        if ($converted === false) {
            return $fileName;
        }

        return $converted;
    }

    /**
     * Find document root
     *
     * @return string
     * @access public
     */
    public function getDocumentRootPath()
    {
        /**
         * The absolute pathname of the currently executing script.
         * Notatka: If a script is executed with the CLI, as a relative path, such as file.php or ../file.php,
         * $_SERVER['SCRIPT_FILENAME'] will contain the relative path specified by the user.
         */
        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            $sRealPath = dirname($_SERVER['SCRIPT_FILENAME']);
        }
        else {
            /**
             * realpath 鈥?Returns canonicalized absolute pathname
             */
            $sRealPath = realpath('.') ;
        }

        $sRealPath = $this->trimPathTrailingSlashes($sRealPath);

        /**
         * The filename of the currently executing script, relative to the document root.
         * For instance, $_SERVER['PHP_SELF'] in a script at the address http://example.com/test.php/foo.bar
         * would be /test.php/foo.bar.
         */
       
        $sSelfPath = dirname($_SERVER['PHP_SELF']);

        $sSelfPath = $this->trimPathTrailingSlashes($sSelfPath);

        return $this->trimPathTrailingSlashes(substr($sRealPath, 0, strlen($sRealPath) - strlen($sSelfPath)));
    }

    /**
     * Create directory recursively
     *
     * @access public
     * @static
     * @param string $dir
     * @return boolean
     */
    public static function createDirectoryRecursively($dir)
    {
        if (DIRECTORY_SEPARATOR === "\\") {
            $dir = str_replace("/", "\\", $dir);
        }
        else if (DIRECTORY_SEPARATOR === "/") {
            $dir = str_replace("\\", "/", $dir);
        }

        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        if ($perms = $_config->getChmodFolders()) {
            $oldUmask = umask(0);
            $bCreated = @mkdir($dir, $perms, true);
            umask($oldUmask);
        }
        else {
            $bCreated = @mkdir($dir, 0777, true);
        }

        return $bCreated;
    }

    /**
     * Detect HTML in the first KB to prevent against potential security issue with
     * IE/Safari/Opera file type auto detection bug.
     * Returns true if file contain insecure HTML code at the beginning.
     *
     * @static
     * @access public
     * @param string $filePath absolute path to file
     * @return boolean
    */
    public static function detectHtml($filePath)
    {
        $fp = @fopen($filePath, 'rb');
        if ( $fp === false || !flock( $fp, LOCK_SH ) ) {
            return -1 ;
        }
        $chunk = fread($fp, 1024);
        flock( $fp, LOCK_UN ) ;
        fclose($fp);

        $chunk = strtolower($chunk);

        if (!$chunk) {
            return false;
        }

        $chunk = trim($chunk);

        if (preg_match("/<!DOCTYPE\W*X?HTML/sim", $chunk)) {
            return true;
        }

        $tags = array('<body', '<head', '<html', '<img', '<pre', '<script', '<table', '<title');

        foreach( $tags as $tag ) {
            if(false !== strpos($chunk, $tag)) {
                return true ;
            }
        }

        //type = javascript
        if (preg_match('!type\s*=\s*[\'"]?\s*(?:\w*/)?(?:ecma|java)!sim', $chunk)) {
            return true ;
        }

        //href = javascript
        //src = javascript
        //data = javascript
        if (preg_match('!(?:href|src|data)\s*=\s*[\'"]?\s*(?:ecma|java)script:!sim',$chunk)) {
            return true ;
        }

        //url(javascript
        if (preg_match('!url\s*\(\s*[\'"]?\s*(?:ecma|java)script:!sim', $chunk)) {
            return true ;
        }

        return false ;
    }

    /**
     * Check file content.
     * Currently this function validates only image files.
     * Returns false if file is invalid.
     *
     * @static
     * @access public
     * @param string $filePath absolute path to file
     * @param string $extension file extension
     * @param integer $detectionLevel 0 = none, 1 = use getimagesize for images, 2 = use DetectHtml for images
     * @return boolean
    */
    public static function isImageValid($filePath, $extension)
    {
        if (!@is_readable($filePath)) {
            return -1;
        }

        $imageCheckExtensions = array('gif', 'jpeg', 'jpg', 'png', 'psd', 'bmp', 'tiff');

        // version_compare is available since PHP4 >= 4.0.7
        if ( function_exists( 'version_compare' ) ) {
            $sCurrentVersion = phpversion();
            if ( version_compare( $sCurrentVersion, "4.2.0" ) >= 0 ) {
                $imageCheckExtensions[] = "tiff";
                $imageCheckExtensions[] = "tif";
            }
            if ( version_compare( $sCurrentVersion, "4.3.0" ) >= 0 ) {
                $imageCheckExtensions[] = "swc";
            }
            if ( version_compare( $sCurrentVersion, "4.3.2" ) >= 0 ) {
                $imageCheckExtensions[] = "jpc";
                $imageCheckExtensions[] = "jp2";
                $imageCheckExtensions[] = "jpx";
                $imageCheckExtensions[] = "jb2";
                $imageCheckExtensions[] = "xbm";
                $imageCheckExtensions[] = "wbmp";
            }
        }

        if ( !in_array( $extension, $imageCheckExtensions ) ) {
            return true;
        }

        if ( @getimagesize( $filePath ) === false ) {
            return false ;
        }

        return true;
    }

    /**
     * Returns true if directory is not empty
     *
     * @access public
     * @static
     * @param string $clientPath client path (with trailing slash)
     * @param object $_resourceType resource type configuration
     * @return boolean
     */
    public static function hasChildren($clientPath, $_resourceType)
    {
        $serverPath = CKFinder_Connector_Utils_FileSystem::combinePaths($_resourceType->getDirectory(), $clientPath);

        if (!is_dir($serverPath) || (false === $fh = @opendir($serverPath))) {
            return false;
        }

        $hasChildren = false;
        while (false !== ($filename = readdir($fh))) {
            if ($filename == '.' || $filename == '..') {
                continue;
            } else if (is_dir($serverPath . $filename)) {
                //we have found valid directory
                $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
                $_acl = $_config->getAccessControlConfig();
                $_aclMask = $_acl->getComputedMask($_resourceType->getName(), $clientPath . $filename);
                if ( ($_aclMask & CKFINDER_CONNECTOR_ACL_FOLDER_VIEW) != CKFINDER_CONNECTOR_ACL_FOLDER_VIEW ) {
                    continue;
                }
                if ($_resourceType->checkIsHiddenFolder($filename)) {
                  continue;
                }

                $hasChildren = true;
                break;
            }
        }

        closedir($fh);

        return $hasChildren;
    }

    /**
     * Retruns temp directory
     *
     * @access public
     * @static
     * @return string
     */
    public static function getTmpDir()
    {
      $_config = & CKFinder_Connector_Core_Factory::getInstance("Core_Config");
      $tmpDir = $_config->getTempDirectory();
      if ( $tmpDir )
      {
        return $tmpDir;
      }
      if ( !function_exists('sys_get_temp_dir')) {
        function sys_get_temp_dir() {
          if( $temp=getenv('TMP') ){
            return $temp;
          }
          if( $temp=getenv('TEMP') ) {
            return $temp;
          }
          if( $temp=getenv('TMPDIR') ) {
            return $temp;
          }
          $temp = tempnam(__FILE__,'');
          if ( file_exists($temp) ){
            unlink($temp);
            return dirname($temp);
          }
          return null;
        }
      }
      return sys_get_temp_dir();
    }

    /**
     * Check if given directory is empty
     *
     * @param string $dirname
     * @access public
     * @static
     * @return bool
     */
    public static function isEmptyDir($dirname)
    {
      $files = scandir($dirname);
      if ( $files && count($files) > 2)
      {
        return false;
      }
      return true;
    }

    /**
     * Autorename file if previous name is already taken
     *
     * @param string $filePath
     * @param string $fileName
     * @param string $sFileNameOrginal
     */
    public static function autoRename( $filePath, $fileName )
    {
      $sFileNameOrginal = $fileName;
      $iCounter = 0;
      while (true)
      {
        $sFilePath = CKFinder_Connector_Utils_FileSystem::combinePaths($filePath, $fileName);
        if ( file_exists($sFilePath) ){
          $iCounter++;
          $fileName = CKFinder_Connector_Utils_FileSystem::getFileNameWithoutExtension($sFileNameOrginal, false) . "(" . $iCounter . ")" . "." .CKFinder_Connector_Utils_FileSystem::getExtension($sFileNameOrginal, false);
        }
        else
        {
          break;
        }
      }
      return $fileName;
    }

    /**
     * Send file to browser
     * Selects the method depending on the XSendfile setting
     * @param string $filePath
     */
    public static function sendFile( $filePath ){
      $config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
      if ( $config->getXSendfile() ){
        CKFinder_Connector_Utils_FileSystem::sendWithXSendfile($filePath);
      } else {
        CKFinder_Connector_Utils_FileSystem::readfileChunked($filePath);
      }
    }

    /**
     * Send files using X-Sendfile server module
     *
     * @param string $filePath
     */
    public static function sendWithXSendfile ( $filePath ){
      if ( stripos($_SERVER['SERVER_SOFTWARE'], 'nginx') !== FALSE ){
        $fallback = true;
        $config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        $XSendfileNginx = $config->getXSendfileNginx();
        foreach ( $XSendfileNginx as $location => $root){
          if ( false !== stripos($filePath , $root) ){
            $fallback = false;
            $filePath = str_ireplace($root,$location,$filePath);
            header("X-Accel-Redirect: ".$filePath); // Nginx
            break;
          }
        }
        // fallback to standar method
        if ( $fallback ){
          CKFinder_Connector_Utils_FileSystem::readfileChunked($filePath);
        }
      } elseif ( stripos($_SERVER['SERVER_SOFTWARE'], 'lighttpd/1.4') !== FALSE ){
        header("X-LIGHTTPD-send-file: ".$filePath); // Lighttpd v1.4
      } else {
        header("X-Sendfile: ".$filePath); // Apache, Lighttpd v1.5, Cherokee
      }
    }
}
