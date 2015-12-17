<?php
	class Node {
		var $id = '';
		var $title = '';
		var $attributes = null;
		var $childNodes = null;
		
		static function configureNode($arrParam) {
			if($arrParam == null)
				return;
			$arr = $arrParam;
			$size = count($arr);
			if($size>0) {
				$node = new Node();
				$node->attributes = array();
				foreach ($arr as $key=>$value) {
					if($key == 'id')
						$node->id = $value;
					if($key == 'title')
						$node->title = $value;
					
					if($key != 'children') {
						$node->attributes[$key] = $value;
					} else {
						$node->childNodes = Node::configureNodeList($value);	
					}
				}
				return $node;
			}
			return null;
		}
		
		static function configureNodeList($arrParam) {
			if($arrParam == null || count($arrParam) == 0)
				return null;
			$arr = $arrParam;
			$index = 0;
			$nodeList = array();
			foreach ($arr as $value) {
				$node = Node::configureNode($value);
				if($node != null) {
					$nodeList[$index] = $node;
					$index++;
				}
			}
			
			if($index>0) 
				return $nodeList;
			return null;
		}
		
		function addChildNodes($childNode) {
			if($this->childNodes == null) {
				$this->childNodes = array(); 
			}
			$size = count($this->childNodes);
			$this->childNodes[$size] = $childNode;
		}
		
		function isLeaf() {
			return ($this->childNodes == null || count($this->childNodes) == 0);
		}
		
		function findNodeById($id) {
			if($this->id == $id)
				return $this;
			if($this->isLeaf() == true) 
				return null;
			
			$index = 0;
			foreach ($this->childNodes as $childNode) {
				$ret = $childNode->findNodeById($id);
				if($ret != null)
					return $ret;
				$index++;
			}
			return null;
		}
		
		function hasChildNodes() {
			return ($this->childNodes != null || count($this->childNodes) != 0);
		}
	}
?>