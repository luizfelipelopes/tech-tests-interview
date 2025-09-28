<?php

/**
Design the workflow of a salesperson in code. The behavior should be performed as follows:
1 Once a customer selects an item and provides the appropriate amount of money, the salesperson should provide the correct product.
2 	If the customer provides too much money, the salesperson should return the correct amount of change. 
	If insufficient funds are provided, it should tell the customer and ask for more money.
3 The salesperson should start with an initial inventory of products and an initial amount of money for change. 
The change will consist of the following denominations: 1 cent, 5 cents, 10 cents, 25 cents, 50 cents, $1, and $2.
4 There should be a way to restock products or replenish the money available for change at a later time.
5 The salesperson should keep track of the current inventory of products and the money available for change. (DONE)
*/


class SalesPerson {


	// Products
		// - name
		// - price
		// - quantity
	private $products= [
		'product1' => [
			'price' => 100, // cents = 1 dolar,
			'quantity' => 20
		],
		'product2' => [
			'price' => 200, // cents = 1 dolar,
			'quantity' => 30
		],
		'product3' => [
			'price' => 250, // cents = 1 dolar,
			'quantity' => 30
		],

	];


	// Changes
		// - denomination (represent all in cents)
		// 		1 cent, 5 cents, 10 cents, 25 cents, 50 cents, $1, and $2.
		// - quantity
	private $change = [
			'1' => 10,
			'5' => 10,
			'10' => 10,
			'25' => 10,
			'50' => 10,
			'100' => 10,
			'200' => 10,
	];
	 
	public function sellProduct(string $product, float $amount) {

		if(empty($product)) {
			return [
				'success' => false,
				'message' => "The name product needs to be filled!"
			];
		}	

		if(!isset($this->products[$product])) {
			return [
				'success' => false,
				'message' => "The product '{$product}' dosen't exists!"
			];
		}

		if($amount <= 0) {
			return [
				'success' => false,
				'message' => "The amount needs to be more than zero!"
			];
		}

		$amount *= 100;

		// customer provider insuficient money => alert user to insuficient
		if($amount < $this->products[$product]['price']) {
			return [
				'success' => false,
				'message' => "You have not enough funds to buy this product!"
			];
		}

		// customer provides enough money => return a product (decrement my stock)
		if($amount == $this->products[$product]['price']) {
			
			$this->products[$product]['quantity']--;
			
			return [
				'success' => true,
				'message' => "The product {$product} was sold succesfully!"
			];
		}
		
		
		// customer provides too much money => return the change (decrement the stock change) and product (decrement my stock)
		if($amount > $this->products[$product]['price']) {
			
			$change = $amount - $this->products[$product]['price'];

			$resultChange = $this->decrementChange(round($change));
			
			if($resultChange['amount'] > 0) {
				return [
					'success' => false,
					'message' => "There is not enough funds to change!"
				];	
			}
			
			$this->change = $resultChange['change'];
			$this->products[$product]['quantity']--;

			return [
				'success' => true,
				'message' => "The product {$product} was sold succesfully!"
			];
		}

	}

	private function decrementChange(float $amount) {

		$tempChange = $this->change;
		
		krsort($tempChange);

		foreach($tempChange as $key => $change) {

			if($amount <= 0) {
				break;
			}

			if($amount < intVal($key)) {
				continue;
			}

			$count = $tempChange[$key];
			for($i = 0; $i < $count; $i++) {
				if($amount <= 0 || $amount < intVal($key)) {
					break;
				}
				$amount -= intVal($key);
				$tempChange[$key]--;
			}

		}

		return [
			'amount' => $amount,
			'change' => $tempChange
		];

	}


	public function restockProduct(string $product, int $quantity): array {

		if($quantity <= 0) {
			return [
				'success' => false,
				'message' => "The quantity needs to be more than zero!"
			];
		}

		if(empty($product)) {
			return [
				'success' => false,
				'message' => "Please fill a name product!"
			];
		}
		
		if(!isset($this->products[$product])) {
			return [
				'success' => false,
				'message' => "The product '{$product}' doesn't exists!"
			];
		}

		$this->products[$product]['quantity']+= $quantity;

		return [
			'success' => true,
			'message' => "The product '{$product}' was restocked successfully!"
		];

	}
	
	public function replenishChange(string $coin, int $quantity): array {

		if($quantity <= 0) {
			return [
				'success' => false,
				'message' => "THe quantity needs to be more than zero!"
			];
		}

		if(empty($coin)) {
			return [
				'success' => false,
				'message' => "Please fill a name coin!"
			];
		}

		if(!isset($this->change[$coin])) {
			return [
				'success' => false,
				'message' => "The coin '{$coin}' doesn't exists!"
			];
		}

		$this->change[$coin] += $quantity;

		return [
			'success' => true,
			'message' => "The coin '{$coin}' was replenished successfully!"
		];

	}

	public function getProducts(): array {

		return [
			'success' => true,
			'data' => $this->products
		];

	}
	
	public function getChange() {

		return [
			'success' => true,
			'data' => $this->change
		];
	}

}

$salesPerson = new SalesPerson();
// print_r($salesPerson->getProducts());
// print_r($salesPerson->getChange());

// print_r($salesPerson->restockProduct('product1', 10));
// print_r($salesPerson->getProducts());

// print_r($salesPerson->replenishChange('10', 10));
// print_r($salesPerson->getChange());

// Sell Products
// print_r($salesPerson->getProducts());
print_r($salesPerson->sellProduct('product2', 3.57));
print_r($salesPerson->getProducts());
print_r($salesPerson->getChange());
