<?php
class executeTime{
	private $microtime;
	public function __construct(){
		$this->microtime = microtime(true);
	}

        public function getNow(){
                $this->__dectruct();
        }

	public function __destruct(){
		if (empty($_SERVER['REQUEST_TIME_FLOAT']))
			echo '<div style="color:#fff;background:#000;position:absolute;top:0px;right:0px;padding:3px 6px;">本次执行时间：', microtime(TRUE) - $this->microtime, '秒</div>';
		else
			echo '<div style="color:#fff;background:#000;position:absolute;top:0px;right:0px;padding:3px 6px;">本次执行时间：', microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT'], '秒</div>';
	}
}
$t = new executeTime();
?>