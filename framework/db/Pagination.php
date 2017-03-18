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

	public function displayLinks()
	{
		$url = $_SERVER['REQUEST_URI'];

		ob_start();

		echo "<ul class='pagination'>";

		if($this->pages > 1)
		{
			echo "<li class=\"prev\"><a href=\"#0\">Prev</a></li>";

			for($i = 1; $i <= $this->pages; $i++)
			{
				$class = ($i == $page) ? $i : '';
				echo "<li class=\"$class\"><a href=\"#0\">$i</a></li>";
			}

			echo "<li class=\"next\"><a href=\"#0\">Next</a></li>";
		}

		echo "</ul>";

		$content = ob_get_clean();

		echo $content;
	}
}