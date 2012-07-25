<?php

namespace n3b\Bundle\Util\HttpFoundation\StreamResponse;

/**
 * Description of StreamWriterWrapper
 *
 * @author neb
 */
class StreamWriterWrapper implements StreamWriterInterface
{
    protected $writer;
    protected $method;
    protected $stream;
    
    public function __construct($stream = 'php://output')
    {
        $this->stream = $stream;
    }
    
    public function setWriter($writer, $method)
    {
        $this->writer = $writer;
        $this->method = $method;
    }

    public function write($stream = null)
    {
        if (!isset($this->writer) || !isset($this->method))
        {
            //throw new \Exception('Something went wrong!');
        }
		
		if ($stream == null)
		{
			$stream = $this->stream;
		}
		
        $this->writer->{$this->method}($stream);
    }
}
