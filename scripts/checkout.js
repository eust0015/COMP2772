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

        /*
        document.getElementById("shipping-fname").disabled = true;
        document.getElementById("shipping-lname").disabled = true;
        document.getElementById("shipping-mobilenumber").disabled = true;
        document.getElementById("shipping-email").disabled = true;
        document.getElementById("shipping-streetAddress").disabled = true;
        document.getElementById("shipping-suburb").disabled = true;
        document.getElementById("shipping-state").disabled = true;
        document.getElementById("shipping-postcode").disabled = true;
        */
    }
    else{
        for (i = 0; i < shippingAddressItems.length; ++i) {
            shippingAddressItems[i].disabled = false;
        }
        shippingAddressDiv.style.display = "block";
    }
}

const shippingAddressCheckBox = document.querySelector("#shippingAddressCheckBox");

shippingAddressCheckBox.addEventListener('change', fillShippingDetails);
fillShippingDetails();