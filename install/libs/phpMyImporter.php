<?php
/*
* phpMyImporter
* -------------
* Version: 1.00
* Copyright (c) 2009 by Micky Holdorf
* Holdorf.dk/Software - micky.holdorf@gmail.com
* GNU Public License http://opensource.org/licenses/gpl-license.php
*
*/

class phpMyImporter {
	/**
	* @access private
	*/
	var $database = null;
	var $connection = null;
	var $compress = null;
	var $utf8 = null;

	var $importFilename = null;
	private  $db_prefix;

	/**
	* Class constructor
	* @param string $db The database name
	* @param string $connection The database connection handler
	* @param boolean $compress It defines if the output/import file is compressed (gzip) or not
	* @param string $filepath The file where the dump will be written
	*/
	function phpMyImporter($db=null, $connection=null, $filepath='dump.sql', $compress=false) {
		$this->connection = $connection;
		$this->compress = $compress;
		$this->importFilename = $filepath;

		$this->utf8 = true;

		return $this->setDatabase($db);
	}

	/**
	* Sets the database to work on
	* @param string $db The database name
	*/
	function setDatabase($db){
		$this->database = $db;
		if ( !@mysql_select_db($this->database) )
			return false;
		return true;
  	}
	
	/**
	* Read from SQL file and make sql query
	*/
	function importSql($file) {
		// Reading SQL from file
		$this->output("Reading SQL from file '".$this->importFilename."': ");
		if ($this->compress) {
			$lines = gzfile($file);
		}
		else {
			$lines = file($file);
		}
		//替换表前缀
		if($this->getDbPrefix()) $lines = preg_replace("/corcms_/",$this->getDbPrefix(),$lines);	
		$stats = count($lines);
		$this->output("DONE!\n");	
		$this->output("Importing SQL into database '".$this->database."': Total ".$stats.' Records');	
		$x = 0;
		$importSql = "";
		$procent = 0;

		foreach ($lines as $line) {
			// Print progress
			$x++;
			$numOfLines = count($lines);
			if ($x%(int)($numOfLines/20) == 0) {
				$procent += 5;
				if ($procent%5 == 0) $this->showPercent("$procent%"); 
				else $str= ".";
				
			}


			// Importing SQL
			$importSql .= $line;
			if ( substr(trim($line), strlen(trim($line))-1) == ";" ) {
				$query = @mysql_query($importSql, $this->connection);
				if (!$query) return false;
				$importSql = "";
			}
		}
		return true;
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
	function setDbPrefix($db_prefix)

	{
	    
		$this->db_prefix = $db_prefix;
	} // end func


	
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
	function getDbPrefix()
	{
		return $this->db_prefix;
	    
	} // end func

	/**
	* Import SQL file into selected database
	*/
	function doImport() {		
		if ( !$this->setDatabase($this->database) )
			return false;

		if ( $this->utf8 ) {
			$encoding = @mysql_query("SET NAMES 'utf8'", $this->connection);
		}

		if ( $this->importFilename ) {
			$import = $this->importSql($this->importFilename);
			if (!$import) $str= "\n".mysql_error($this->connection)."\n";
			else $str= " DONE!\n";
			$this->output($str);
			return $import;
		}
		else {
			return false;
		}
	}

	function flush_buffers(){ 
	    sleep(0);  
		print str_pad(" ",1024);
		ob_flush();
		flush();
	} 

	function output($msg){
		echo $msg.'<br>';
		$this->flush_buffers();
	}

	function showPercent($percent){
		echo <<<EOT
		<script language='javascript'>
			if(!document.getElementById('percent')){
				var a = document.createElement('div');
				a.id="percent";
				document.body.appendChild(a);
			}
			document.getElementById('percent').innerHTML = "$percent";
		</script>
EOT;
		$this->flush_buffers();
	}
}
?>