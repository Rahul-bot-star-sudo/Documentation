function totalPrice(item, price, text) {
    if (text) {
        console.log(text + price * item);
    }
    else {
        console.log(price * item);
    }
}
totalPrice(80, 100, "total amount is: ");
totalPrice(80, 100);
