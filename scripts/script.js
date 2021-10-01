// Functions

function getProductPrice(){
    productPrice = document.querySelector('#product-price').textContent;
}

function getQuantity(){
    productQuantity = document.querySelector('#quantity-amount').value;
}

function displaySubtotal(){
    getProductPrice();
    getQuantity();
    subtotal = productPrice * productQuantity;
    document.querySelector('#diaplayProductSubtotal').textContent = "$" + subtotal;
}
displaySubtotal();

function updateSummarySubtotal(){
    document.querySelector('#summarySubtotal').textContent = "$" + subtotal;
}
updateSummarySubtotal();

function updateSummaryGST(){
    let gst = subtotal / 10;
    document.querySelector('#summaryGST').textContent = "$" + gst;
}

function updateSummaryTotal(){
    document.querySelector('#summaryTotal').textContent = "$" + subtotal;
}


// Event Listners

document.querySelector('#update-cart').addEventListener("click", displaySubtotal);
document.querySelector('#update-cart').addEventListener("click", updateSummarySubtotal);
document.querySelector('#update-cart').addEventListener("click", updateSummaryGST);
document.querySelector('#update-cart').addEventListener("click", updateSummaryTotal);