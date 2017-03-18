<?php

class Pagination
{
	public $totalPosts;
	public $pages;
	public $page;
	public $limit;
	public $offset;

	public function __construct($params = [])
	{
		$this->totalPosts = isset($params['totalPosts']) ? $params['totalPosts'] : NULL;
		$this->page = isset($params['page']) ? $params['page'] : NULL;
		$this->limit = isset($params['limit']) ? $params['limit'] : NULL;

		$this->calculatePages();
	}	

	private function calculatePages()
	{
		if($this->totalPosts === NULL || $this->page === NULL || $this->limit === NULL)
		{
			throw new Exception("The Pagination class is missing parameters", 500);
		}

		$this->pages = (int) ceil($this->totalPosts / $this->limit);
		$this->offset = ($this->page - 1) * $this->limit;
	}

	private function createUrl($page)
	{
		$currentUrl = $_SERVER['REQUEST_URI'];
		if($currentUrl != "/")
		{
			$parts = explode("/", $currentUrl);

			$last = $parts[count($parts) - 1];

			if(is_numeric($last))
			{
				unset($parts[count($parts) - 1]);
			}

			$url = implode("/", $parts) . "/" . $page;
		}
		else 
		{
			$url = "/default/index/" . $page;
		}		

		return $url;
	}

	public function displayLinks()
	{
		ob_start();

		echo "<ul class='pagination'>";

		if($this->pages > 1)
		{
			if($this->page !== 1)
			{
				echo "<li class=\"prev\"><a href=\"" . $this->createUrl($this->page - 1) . "\">Prev</a></li>";
			}

			for($i = 1; $i <= $this->pages; $i++)
			{
				$class = ($i == $this->page) ? "active" : '';
				echo "<li class=\"$class\"><a href=\"" . $this->createUrl($i) . "\">$i</a></li>";
			}

			if($this->page !== $this->pages)
			{
				echo "<li class=\"next\"><a href=\"" . $this->createUrl($this->page + 1) . "\">Next</a></li>";
			}
		}

		echo "</ul>";

		$content = ob_get_clean();

		echo $content;
	}
}