class Emp {
    constructor(name,id,salary,) {
        this.id = id
        this.name = name
        this.salary = salary
    }
    displayInfo() {
    console.log("Id: "+this.id);
    console.log("Name: "+this.name);
    console.log("Salary: "+this.salary);
    console.log();
    }
}
const emp = new Emp("Tom",12,23000);
emp.displayInfo()
const emp2 = new Emp("Peter",22,33000);
emp2.displayInfo()
