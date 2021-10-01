function getProductPrice(){
    productPrice = document.querySelector('#product-price').textContent;
}

function getQuantity(){
    productQuantity = document.querySelector('#quantity-amount').value;
}

function displaySubtotal(){
    getProductPrice();
    getQuantity();
    subtotal = document.querySelector('#diaplayProductSubtotal').textContent = "$" + productPrice * productQuantity;
}
displaySubtotal();


document.querySelector('#update-cart').addEventListener("click", displaySubtotal);