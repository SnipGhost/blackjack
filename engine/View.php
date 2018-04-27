<?php

class View
{	
	public function display($contentView, $templateView, $data = null)
	{
		echo $contentView.' : '.$templateView.'<br>';
	}
}