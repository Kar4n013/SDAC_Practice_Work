function filterEvenNumbers(arr) {
    const fil = arr.filter((arr) => {
        return arr % 2 == 0
    })
    return fil
}
let arr = [2,3,4,56,99,78,14]
console.log(filterEvenNumbers(arr));

