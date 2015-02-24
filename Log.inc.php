<?php
	/* File : Log.inc.php
	 * Author : Jeroen Bouman
	 */
	
	abstract class LogLevel {
		const NONE = 0;
		const INFO = 1;
		const WARN = 2;
		const ERROR = 3;
		const DEBUG = 4;
		const TRACE = 6;
	}
	 
	class Logger {
		
		private $_logFile = "";
		private $_logLevel = LogLevel::DEBUG;

		/*
		 * Constructor, save path to file
		 * Create a new file if it does not exists 
		 */
		public function __construct($pathToLogFile){
			$this->_logFile = $pathToLogFile;
			
			if (!file_exists($this->_logFile)) {
				$fp = fopen($this->_logFile, "a+");
				if ($fp) {
					fclose($fp);
					$this->log(LogLevel::INFO, "New Log file created.");
				} else {
					//unable to create a new logfile
					return false;
				}//end if
			}//end if

/*
			$this->info("Sample info log message");
			$this->warn("Sample warn log message");
			$this->error("Sample error log message");
			$this->debug("Sample debug log message");
			$this->trace("Sample trace log message");
*/

			return true;
		}//end function
		
		public function info($message) {
			if ($this->_logLevel >= LogLevel::INFO) {
				$temp = "INFO ".$message;
				$this->log(LogLevel::INFO, $temp);
			}//end if
		}//end function
		
		public function warn($message) {
			if ($this->_logLevel >= LogLevel::WARN) {
				$temp = "WARN ".$message;
				$this->log(LogLevel::WARN, $temp);
			}//end if
		}//end function
		
		public function error($message) {
			if ($this->_logLevel >= LogLevel::ERROR) {
				$temp = "ERROR ".$message;
				$this->log(LogLevel::ERROR, $temp);
			}//end if
		}//end function
		
		public function debug($message) {
			if ($this->_logLevel >= LogLevel::DEBUG) {
				$temp = "DEBUG ".$message;
				$this->log(LogLevel::DEBUG, $temp);
			}//end if
		}//end function
		
		public function trace($message) {
			if ($this->_logLevel >= LogLevel::TRACE) {
				$temp = "TRACE ".$message;
				$this->log(LogLevel::TRACE, $temp);
			}//end if
		}//end function
		
		
		private function log($level, $message) {
			list($usec, $sec) = explode(' ', microtime());
			$datetime = strftime("%Y-%m-%d %H:%M:%S",time());
			$msg = "$datetime ". sprintf("%06s",intval($usec*1000000)).": $message";
			
			$fp = fopen($this->_logFile, 'a+');
			fputs($fp, "$msg\n");
			fclose($fp);
		}//end function
		
		
		
		public function getLogLevel() {
			return $this->_logLevel;
		}//end function
		public function setLogLevel($level) {
			$this->_logLevel = $level;
			$this->info("Log level changed to $level");
		}//end function
		
		public function readLog($lines) {
			//TODO
		}//end function
	}//end class		
?>