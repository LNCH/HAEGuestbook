<?php

class Loader
{
	public function library($classname)
	{
		include(LIB_PATH . "$classname.class.php");
	}

	public function helper($classname)
	{
		include(HELPER_PATH . "$classname.php");
	}
}