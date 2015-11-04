<?php

/**
 * Description of Product
 *
 * @author Sergey Ivanov <sivanovkz@gmail.com>
 */
class Product {

	public static function initSQLConnection() {
		$resource = mysql_connect("localhost", "root", "");
		if ($resource === false) {
			throw new Exception("Could not connect to MySQL server: " . mysql_error());
		}
		if (!mysql_select_db('test', $resource)) {
			throw new Exception("Could not use database 'test': " . mysql_error());
		}
	}

	/*
	 * Удаление продукта по идентификатору
	 */

	public static function delete($aId) {
		$lId = (int) $aId;
		if ($lId < 0 || $lId > PHP_INT_MAX) {
			return false;
		}
		$result = mysql_query("DELETE FROM `products` WHERE `id`=" . $lId);
		return $result;
	}

	/*
	 * Получение продукта по идентификатору
	 */

	public static function newInstance($aId) {
		$lId = (int) $aId;
		if ($lId < 0 || $lId > PHP_INT_MAX) {
			return false;
		}
		$result = mysql_query("SELECT * FROM `products` WHERE `id`=" . $lId . " LIMIT 1");
		if ($result !== false) {
			$row = mysql_fetch_array($result);
			$product = new self();
			$product->id = $row['id'];
			$product->title = $row['title'];
			$product->price = $row['price'];
			$product->discount = $row['discount'];
			$product->description = $row['description'];
			return $product;
		} else {
			return false;
		}
	}

	public static function newEmptyInstance() {
		return new self();
	}

	public static function find($aCount, $aOptFrom = null) {
		$lFrom = is_null($aOptFrom) ? '' : (int) $aOptFrom . ', ';
		$query = "SELECT `id` FROM `products` LIMIT {$lFrom}{$aCount}";
		$result = mysql_query($query);
		if ($result !== false) {
			$lReturnProducts = array();
			while ($row = mysql_fetch_array($result)) {
				$lReturnProducts[] = self::newInstance($row['id']);
			}
			return $lReturnProducts;
		} else {
			return false;
		}
	}

	public static function count() {
		$result = mysql_query("SELECT COUNT(`id`) as `count` FROM `products`");
		$row = mysql_fetch_array($result);
		$count = (int) $row['count'];
		return $count;
	}

	private $id;
	private $title;
	private $price;
	private $discount;
	private $description;

	private function __construct() {
		
	}

	public function getId() {
		return $this->id;
	}

	public function setTitle($aTitle) {
		$this->title = $aTitle;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setPrice($aPrice) {
		$this->price = $aPrice;
	}

	public function getPrice() {
		return $this->price;
	}

	public function setDiscount($aDiscount) {
		$this->discount = $aDiscount;
	}

	public function getDiscount() {
		return $this->discount;
	}

	public function setDescription($aDescription) {
		$this->description = $aDescription;
	}

	public function getDescription() {
		return $this->description;
	}

	public function save() {
		if (isset($this->id)) {
			$this->_update();
		} else {
			$this->_insert();
		}
	}

	private function _update() {
		mysql_query("UPDATE `products` SET `title`='{$this->title}', "
				. "`price`='{$this->price}', `discount`='{$this->discount}', "
				. "`description`='{$this->description}' WHERE `id`={$this->id}");
	}

	private function _insert() {
		mysql_query("INSERT INTO `products` (`title`, `price`, `discount`, `description`)"
				. " VALUES ('{$this->title}', '{$this->price}', '{$this->discount}', '{$this->description}')");
		$new_id = mysql_insert_id();
		$this->id = $new_id;
	}

}
