arr = [7,8,9,4,100,232,23]
const new_map = arr.map((arr) => {
    return arr*arr
})
console.log(new_map);
const new_filter = arr.filter((arr) => {
    return arr % 2 == 1
})
console.log(new_filter);
const new_reduce = arr.reduce((arr, total) => {
    
    return total += arr
})
console.log(new_reduce);
