// Functions

function getProductPrice(){
    productPrice = parseInt(document.querySelector('#product-price').textContent);
}

function getQuantity(){
    productQuantity = parseInt(document.querySelector('#quantity-amount').value);
}

function displaySubtotal(){
    getProductPrice();
    getQuantity();
    subtotal = productPrice * productQuantity;
    document.querySelector('#diaplayProductSubtotal').textContent = "$" + subtotal.toFixed(2);
}
displaySubtotal();

function updateSummarySubtotal(){
    document.querySelector('#summarySubtotal').textContent = "$" + subtotal.toFixed(2);
}
updateSummarySubtotal();

function updateSummaryGST(){
    gst = subtotal / 10;
    document.querySelector('#summaryGST').textContent = "$" + gst.toFixed(2);
}
updateSummaryGST();

function updateSummaryTotal(){
    document.querySelector('#summaryTotal').textContent = "$" + subtotal.toFixed(2);
}
updateSummaryTotal();


// Event Listners

document.querySelector('#update-cart').addEventListener("click", displaySubtotal);
document.querySelector('#update-cart').addEventListener("click", updateSummarySubtotal);
document.querySelector('#update-cart').addEventListener("click", updateSummaryGST);
document.querySelector('#update-cart').addEventListener("click", updateSummaryTotal);