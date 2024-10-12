class DatabaseSimulator {
  
  transaction;
  data;

  constructor() {
    this.transaction = [];
    this.data = [];
  
  }

  begin() {
    this.transaction.push({});
  }

  get(key) {
    let value = this.transaction[this.transaction.length-1];
    return value && value[key] ? value[key] : null;
    
  }

  set(key, value) {
    
     if(!this.transaction.length) {
      throw new Error("No active transaction"); 
    }
    
    let newData = this.transaction[this.transaction.length-1];
    
    newData[key] = value;
    this.transaction[this.transaction.length-1] = newData;
    
  }

  count() {
    return Object.keys(this.data).length;
  }

  commit() {

    if(this.transaction.length == 0) {
      throw new Error("No active transaction"); 
    }

    this.transaction.forEach((value, index) => {
        for (const key in value) {
          this.data[key] = value[key];
        }
       
    })
  }

  rollback() {
    if(this.transaction.length == 0) {
      throw new Error("No active transaction"); 
    }
    this.transaction.pop();
  }
}

console.log('EX1')

// EX1
const db = new DatabaseSimulator();
db.begin(); // begins a transaction
console.log(db.get("a")); // returns null
db.set("a", "Hello A");
console.log(db.get("a")); // returns 'Hello A'
db.set("b", "Hello B");
console.log(db.count()); // returns 0
db.commit();
console.log(db.get("a")); // returns 'Hello A'
console.log(db.get("b")); // returns 'Hello B'
console.log(db.count()); // returns 2

console.log('EX2: No active tgransaction')

// EX2: No active tgransaction
const db2 = new DatabaseSimulator();
console.log(db2.get("b")); //returns null
console.log(db2.count()); // returns 0
db2.set("b", "hello"); // throws error "No active transaction"
db2.commit(); // throws error "No active transaction"
db2.rollback(); // throws error "No active transaction"

console.log('EX 3: Rollbacking')

// EX3: Rollbacking
const db3 = new DatabaseSimulator();
db3.begin();
db3.set("a", "Hello");
db3.set("a", "Hello world");
console.log(db3.get("a")); //returns 'Hello world'
db3.rollback();
console.log(db3.get("a")); //returns null
console.log(db3.count()); // returns 0

console.log('EX 4: Nested transaction')

// EX 4: Nested transaction
const db4 = new DatabaseSimulator();
db4.begin();
db4.set("a", "Hello");
db4.begin();
db4.set("a", "Hello World");
console.log(db4.get("a")); //returns 'Hello world'
db4.commit();
console.log(db4.get("a")); //returns 'Hello world'
console.log(db4.count()); // returns 1


console.log('EX 5: Nested transaction and Rollbacks')
// EX 5: Nested transaction and Rollbacks
const db5 = new DatabaseSimulator();
db5.begin();
db5.set("a", "Hello");
db5.begin();
db5.set("a", "Hello World");
db5.set("b", "Hello");
db5.rollback();
console.log(db5.get("a")); //returns 'Hello'
console.log(db5.get("b")); //returns null
db5.commit();
console.log(db5.count()); // returns 1




