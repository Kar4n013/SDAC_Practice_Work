function payement(status) {
    return new Promise((resolve, reject) => {
        if (status) {
            resolve("Payement Succesful!!!")
        } else {
            reject("Payement Unsuccesful...")
        }
    });
}
async function test() {
    try {
        const data = await payement(true)
        console.log(data);
        
    } catch (error) {
        console.log(error);
        
    }
}
test()