document.addEventListener("DOMContentLoaded", () => {
    let errors = [];
    const addEmployeeButton = document.getElementById("addEmployeeButton");
    const addEmployeeContainer = document.getElementById("addEmployeeContainer");
    const addEmployeeCancelButton = document.getElementById("addEmployeeCancelButton");
    const addEmployeeForm = document.getElementById("addEmployeeForm");

    addEmployeeButton.addEventListener('click', () => {
        addEmployeeContainer.classList.toggle('hidden');
    });
    addEmployeeCancelButton.addEventListener('click', () => {
        addEmployeeContainer.classList.toggle('hidden');
    });

    addEmployeeForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(addEmployeeForm);
          fetch('/employee', {
            method: 'POST',
            body: formData
        })
             .then(response => response.json())
             .then(result => {
                 return result;
             })
             .then(errors => {
                 displayErrorMessage(errors.firstName, "firstName");
                 displayErrorMessage(errors.lastName, "lastName");
                 displayErrorMessage(errors.streetAddress, "streetAddress");
                 displayErrorMessage(errors.city, "city");
                 displayErrorMessage(errors.state, "state");
                 displayErrorMessage(errors.zipCode, "zipCode");
                 displayErrorMessage(errors.email, "email");
                 displayErrorMessage(errors.phoneNumber, "phoneNumber");
             })
             .catch(err => console.log(err));
    });
});

const displayErrorMessage = (error, element) => {
    if(error){
        document.getElementById(element + "Error").innerText = error[0];
        document.getElementById(element).classList.add("border-red-500");
    }else {
        document.getElementById(element + "Error").innerText = "";
        document.getElementById(element).classList.remove("border-red-500");
    }
}




