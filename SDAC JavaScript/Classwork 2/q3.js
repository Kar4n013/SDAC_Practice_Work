function payement(status) {
      return new Promise((resolve, reject) => {
     if (status) {
        resolve("Payement Successful!!!")
     } else {
        reject("Payement Unsuccessful....")
     }   
    });
}
payement(true).then((result) => {
    console.log(result);
    
}).catch((err) => {
    console.log(err);
    
});