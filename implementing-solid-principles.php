<?php

  /**
   * SOLID: SOLID is a set of five design principles intended to make software 
   * designs more understandable, flexible, and maintainable.
   * */


 /**
  * S: Single Responsibility Principle (SRP):  
  * Each class should have a single responsibility or reason to change. 
  * This makes the code easier to understand and modify.
  * */
	class Order
  {
      public function calculateTotalSum(){/*...*/}
      public function getItems(){/*...*/}
      public function getItemCount(){/*...*/}
      public function addItem($item){/*...*/}
      public function deleteItem($item){/*...*/}

  }
  
  class showOrder {
      public function printOrder(){/*...*/}
      public function showOrder(){/*...*/}
  }
  
  class OrderRepository {
      public function load(){/*...*/}
      public function save(){/*...*/}
      public function update(){/*...*/}
      public function delete(){/*...*/}
  }
  
  /**
   * O: Open-closed Principle (OCP):
   * Classes should be open for extension but closed for modification. 
   * This means we can add new functionalities without altering existing code.
   * */
  
  interface Funcionario {
    public function remuneracao();
  }
  
  class ContratoClt implements Funcionario
  {
      public function remuneracao()
      {
          return 'valor CLT';
      }
  }
  
  class Estagio implements Funcionario
  {
      public function remuneracao()
      {
          return 'valor Estagio';
      }
  }
  
  class ContratoPJ implements Funcionario
  {
      public function remuneracao()
      {
          return 'valor PJ';
      }
  }
  
  class FolhaDePagamento
  {
      protected $saldo;
      
      public function calcular(Funcionario $funcionario)
      {
          $this->saldo = $funcionario->remuneracao();
          echo $this->saldo . "\n";
      }
  }
  
  $clt = new ContratoClt();
  $estagio = new Estagio();
  $pj = new ContratoPJ();
  
  $folhaPagamento = new FolhaDePagamento();
  echo "\nO: Open-closed Principle (OCP) \n";
  $folhaPagamento->calcular($clt);
  $folhaPagamento->calcular($estagio);
  $folhaPagamento->calcular($pj);

/**
 * L: Liskov Substitution Principle:
 * Objects of a derived class should be able to replace objects of the base 
 * class without altering the expected behavior of the program. 
 * This ensures code correctness and predictability.
 * */

class A 
{
  public function getNome() {
    echo 'Meu nome é A' . "\n";
  }  
}

class B extends A 
{
  public function getNome() {
    echo 'Meu nome é B' . "\n";
  }  
}

$object1 = new A();
$object2 = new B();

function imprimeNome(A $object) 
{
  return $object->getNome(); 
}

echo "\nL: Liskov Substitution Principle \n";
imprimeNome($object1);
imprimeNome($object2);


/**
 * I: Interface Segregation Principle (ISP):
 * Specific interfaces are better than a single, broad interface. 
 * This reduces dependencies between classes and makes it easier to implement 
 * new functionalities
 * */

interface Aves 
{
  public function setLocalizacao($longitude, $latitude);  
  public function renderizar();  
}

interface AvesQueVoam extends Aves 
{
  public function setAltitude($altitude);  
}


class Papagaio implements AvesQueVoam 
{
  public function setLocalizacao($longitude, $latitude) 
  {
      
  }
  
  public function setAltitude($altitude) 
  {
      
  }
  
  public function renderizar() 
  {
      
  }
}

class Pinguim implements Aves 
{
  public function setLocalizacao($longitude, $latitude) 
  {
      
  }
  
  public function renderizar() 
  {
      
  }
}


/**
 * D: Dependency Inversion Principle (DIP):
 * High-level modules should not depend on low-level modules. 
 * Both should depend on abstractions. 
 * Additionally, abstractions should not depend on details. 
 * Details should depend on abstractions.
 * */

interface ConnectionDB
{
  public function connect();
}

class MySQLConnection implements ConnectionDB
{
  public function connect()
  {
    
  }
}

class OracleConnection implements ConnectionDB
{
  public function connect()
  {
    
  }
}

class MongoDBConnection implements ConnectionDB
{
  public function connect()
  {
    
  }
}

class PasswordReminder
{
    private $dbConnection;
    
    public function __construct(ConnectionDB $connection)
    {       
        $this->dbConnection = $connection;           
    }
    
    // Faz alguma coisa
}


