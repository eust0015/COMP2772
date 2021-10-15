function fillShippingDetails(){
    const shippingAddressItems = document.querySelectorAll(".shipping-address");
    const shippingAddressDiv = document.querySelector("#shippingAddressDiv");

    if(shippingAddressCheckBox.checked){
        const billingAddressItems = document.querySelectorAll(".billing-address");
        
        for (i = 0; i < shippingAddressItems.length; ++i) {
            shippingAddressItems[i].value = billingAddressItems[i].value;
            shippingAddressItems[i].disabled = true;
        }

        shippingAddressDiv.style.display = "none";

    }
    else{
        for (i = 0; i < shippingAddressItems.length; ++i) {
            shippingAddressItems[i].disabled = false;
        }
        shippingAddressDiv.style.display = "block";
    }
}

function updateTotalCost(event){
    let id = event.target.value;
    let postageCost = document.querySelector("#cost_" + id).value;
    grandTotalCost.innerHTML = "Total Amount: $" + (parseFloat(cartTotalCost.value) + parseFloat(postageCost)).toFixed(2);
}

const shippingAddressCheckBox = document.querySelector("#shippingAddressCheckBox");
shippingAddressCheckBox.addEventListener('change', fillShippingDetails);
fillShippingDetails();

const cartTotalCost = document.querySelector("#cartTotalCost");
const grandTotalCost = document.querySelector("#grandTotalCost");

const postageRadioButtons = document.getElementsByName("postage");
for (i = 0; i < postageRadioButtons.length; ++i) {
    postageRadioButtons[i].addEventListener("change", updateTotalCost);
}