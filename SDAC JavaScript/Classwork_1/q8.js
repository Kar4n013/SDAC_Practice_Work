const sales = [
  {
    name: "Pencils",
    price: 5000,
  },
  {
    name: "Pens",
    price: 8000,
  },
  {
    name: "Erasers",
    price: 3000,
  },
];
console.log(sales[0]);

const Total = sales.reduce((sal, sales) => (sal += sales.price), 0);
console.log(Total);
