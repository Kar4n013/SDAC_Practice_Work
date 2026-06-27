arr = [-100,-2,-5,-7,-9];
function findMax(arr) {
  let max = arr[0];
  for (let index = 0; index < arr.length; index++) {
    const element = arr[index];
    if (element > max) {
      max = element;
    }
  }
  return max;
}
console.log(findMax(arr));
