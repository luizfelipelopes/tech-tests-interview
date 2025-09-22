<?php

/**
The Sales Person
    
Design the workflow of a salesperson in code. The behavior should be performed as follows:
1) Once a customer selects an item and provides the appropriate amount of money, the salesperson should provide the correct product.
2) 	If the customer provides too much money, the salesperson should return the correct amount of change. 
	If insufficient funds are provided, it should tell the customer and ask for more money.
3) The salesperson should start with an initial inventory of products and an initial amount of money for change. 
The change will consist of the following denominations: 1 cent, 5 cents, 10 cents, 25 cents, 50 cents, $1, and $2.
4) There should be a way to restock products or replenish the money available for change at a later time.
5) The salesperson should keep track of the current inventory of products and the money available for change.
*/

class Salesperson {

	// Transform prices in cents ($1 = 100 cents)
	private $products = [
		'product1' => [
			'quantity' => 50,
			'price' => 10000,
		],
		'product2' => [
			'quantity' => 50,
			'price' => 10000,
		],
		'product3' => [
			'quantity' => 50,
			'price' => 10000,
		],
	];

	// Transform currencies in cents ($1 = 100 cents)
	private $change = [
		'1' => 10,
		'5' => 10,
		'10' => 10,
		'25' => 10,
		'50' => 10,
		'100' => 10,
		'200' => 10,
	];


	public function sellProduct(string $product, float $money): array {
		
		if(!isset($this->products[$product])) {
			return [
				'success' => false,
				'message' => "The product {$product} doesn't exists!"
			];
		}
		
		$money = ($money * 100);

		// if money < price = return alert to user insufficient funds
		if($money < $this->products[$product]['price']) {
			return [
				'success' => false,
				'message' => "Insufficient funds!"
			];
		}
		
		// if money > price of product = decrease change and product
		if($money > $this->products[$product]['price']) {
			$change = $moeney - $this->products[$product]['price'];
			$infoChange = $this->provideChange($change, $product);
			
			if($infoChange['changeResting'] > 0) {
				return [
					'success' => false,
					'message' => "Insufficent changes! Please replenish more! Needs more: {$infoChange['changeResting']} "
				];
			}

			$this->change = $infoChange['changes'];
			
		}
		
		$this->products[$product]['quantity']--;

		return [
			'success' => true,
			'message' => "Product Sold with Success!"
		];
	}

	private function provideChange(float $change, string $product): array
	{
		krsort($this->change);	
		$changes = $this->change;		

		foreach($this->change as $key => $value) {

			if($change == 0) {
				break;
			}	

			for($i= 0; $i < $value; $i++) {
				$diffChange = $change - (int) $key;
				if($diffChange < 0) {
					break;
				}

				$change = $diffChange;
				$changes[$key]--;
			}
		}

		return [
			'changes' => $changes,
			'changeResting' => $change
		];
	}

	public function restockProduct(string $product, int $amount): array
	{
		if(!isset($this->products[$product])) {
			return [
				'success' => false, 
				'message' => "The product {$product} doesn't exists!"];
		} else {
			$this->products[$product]['quantity'] += $amount;
			return [
				'success' => true, 
				'message' => "The product {$product} was restocked with success!"];
		}
	}

	public function replenishChange(string $currency, int $amount): array 
	{
		if(!isset($this->change[$currency])) {
			return [
				'success' => false, 
				'message' => "The currency {$currency} doesn't exists!"];
		} else {
			$this->change[$currency] += $amount;
			return [
				'success' => true, 
				'message' => "The currency {$currency} was replenished with success!"];
		}
	}

	public function getProductsStatus(): array
	{
		return $this->products;
	}

	public function getProductStatus(string $product): array
	{
		if(!isset($this->products[$product])) {
			return [
				'success' => false, 
				'message' => "The product {$product} doesn't exists!"];
		} else {
			return [
				'success' => true, 
				'data' => $this->products[$product]];
		}
	}

	public function getChangesStatus(): array
	{
		return $this->change;
	}

}



$salesPerson = new Salesperson();
// $salesPerson->getProductsStatus();
print_r($salesPerson->getProductStatus('product1'));
// echo "\n";

print_r($salesPerson->restockProduct('product1', 20));
// echo "\n";
// $salesPerson->getProductStatus('product1') ;

// $salesPerson->getChangesStatus();
// echo "\n";
print_r($salesPerson->replenishChange('10', 20));
// echo "\n";
// $salesPerson->getChangesStatus();
// echo "\n";

// $salesPerson->sellProduct('product1', 10);

// $salesPerson->getProductsStatus();
// $salesPerson->sellProduct('product2', 150);
// echo "\n\n\n";
// $salesPerson->getProductsStatus();
// echo "\n\n\n";
// $salesPerson->getChangesStatus();
// $salesPerson->replenishChange('2.00', 10);
// echo "\n\n\n";
// $salesPerson->getChangesStatus();
print_r($salesPerson->sellProduct('product2', 100));
echo "\n\n\n";
print_r($salesPerson->getChangesStatus());
echo "\n\n\n";
print_r($salesPerson->getProductsStatus());

