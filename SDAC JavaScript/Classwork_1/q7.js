const emp = [
    {
        "name": "Tom",
        "salary": 12000
    }, {
        "name": "Jerry",
        "salary": 22000
    }, {
        "name": "Peter",
        "salary": 32000
    }, {
        "name": "Parker",
        "salary": 42000
    }, {
        "name": "Grace",
        "salary": 52000
    }
]
const filtsalary = emp.filter((emp) => {
    return emp.salary > 20000
})
console.log(filtsalary);
