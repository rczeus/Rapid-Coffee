<?php
/*	RapidCoffee is a free, opensource dynamic internet forum.
	(C) Copyright 2011.

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php

require_once('conf/config.php');
require_once("class/Post.php");
require_once("template/TPost.php");

class TListPost{

	private $topic;
	private $qtd;
	private $page;
	private $sorting;

	public function __construct(){
		$this->sorting="date desc";
	}

	public function setTopic($param){ $this->topic=$param; }
	public function setSorting($param) { $this->sorting=$param; }
	public function setQtd($param) { $this->qtd=$param; }

	function getJsonTags(){
		
		$query = Post::cloneByTopic($this->topic->getId(), $this->sorting, $this->qtd);
		$result = array();
		if ($query!=null){
			foreach ($query as $post){
				array_push($result, $post->getJsonTags());
			}
		}
		return $result;
	}
}

?>
