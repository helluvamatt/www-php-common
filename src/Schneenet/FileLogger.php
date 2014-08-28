<?php
namespace Schneenet;

class FileLogger
{
	protected $_handle;
	
	public function __construct($file)
	{
		$this->_handle = fopen($file, 'a');
		if ($this->_handle === FALSE) throw new \RuntimeException("Failed to open log file: $file");
	}
	
	public function __destruct()
	{
		fclose($this->_handle);
	}
	
	public function write($message)
	{
		fwrite($this->_handle, "[" . date(\DateTime::RFC2822) . "] " . $message . "\n");
	}
	
	
}