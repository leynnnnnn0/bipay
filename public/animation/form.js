document.addEventListener("DOMContentLoaded", () => {
    const addEmployeeButton = document.getElementById("addEmployeeButton");
    const addEmployeeContainer = document.getElementById("addEmployeeContainer");
    const addEmployeeCancelButton = document.getElementById("addEmployeeCancelButton");
    const firstNameField = document.getElementById("firstName");
    const lastNameField = document.getElementById("lastName");
    const streetAddressField = document.getElementById("streetAddress");
    const cityField = document.getElementById("city");
    const stateField = document.getElementById("state");
    const zipCodeField = document.getElementById("zipCode");
    const emailField = document.getElementById("email");
    const phoneNumberField = document.getElementById("phoneNumber");
    inputFieldValidation(firstNameField);
    inputFieldValidation(lastNameField);
    inputFieldValidation(streetAddressField);
    inputFieldValidation(cityField);
    inputFieldValidation(stateField);
    inputFieldValidation(zipCodeField);
    inputFieldValidation(emailField);
    inputFieldValidation(phoneNumberField);
    addEmployeeButton.addEventListener('click', () => {
        addEmployeeContainer.classList.remove('hidden');
    });
    addEmployeeCancelButton.addEventListener('click', () => {
        addEmployeeContainer.classList.add('hidden');
    });


});

const inputFieldValidation = (inputField) => {
    inputField.addEventListener("focusout", () => {
        let inputFieldValue = inputField.value;
        if(inputFieldValue.length > 1){
            inputField.classList.remove("border-red-500");

        }else {
            inputField.classList.add("border-red-500");
        }
    })
}



