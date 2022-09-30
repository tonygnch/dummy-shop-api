<?php

namespace App\Adapters\Shops;

use App\Adapters\Client;

class DummyShop extends Client implements ShopInterface
{
	protected $endpoint;

	protected $limit;

	public function __construct(){
		parent::__construct();
		
		$this->url = config('dummy-shop.url');
	}

	public function getProducts($page = 1)
	{
		# Get products
		$products = $this->makeRequest('GET', 'products?page=' . $page);

		# Return products
		return $products;
	}
}