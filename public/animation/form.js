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
             .then(error => {
                 if(error.success) {
                     addEmployeeContainer.classList.toggle('hidden');
                     Swal.fire({
                         title: "Success!",
                         text: "New Employee Added!",
                         icon: "success"
                     }).then(result => {
                         window.location.reload();
                         console.log("RELOAD");
                         }
                     );
                     return;
                 }
                 displayErrorMessage(error.firstName, "firstName");
                 displayErrorMessage(error.lastName, "lastName");
                 displayErrorMessage(error.streetAddress, "streetAddress");
                 displayErrorMessage(error.city, "city");
                 displayErrorMessage(error.state, "state");
                 displayErrorMessage(error.zipCode, "zipCode");
                 displayErrorMessage(error.email, "email");
                 displayErrorMessage(error.phoneNumber, "phoneNumber");
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




