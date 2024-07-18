document.addEventListener("DOMContentLoaded", () => {
    const addEmployeeButton = document.getElementById("addEmployeeButton");
    const addEmployeeContainer = document.getElementById("addEmployeeContainer");
    const addEmployeeCancelButton = document.getElementById("addEmployeeCancelButton");
    addEmployeeButton.addEventListener('click', () => {
        addEmployeeContainer.classList.remove('hidden');
    });
    addEmployeeCancelButton.addEventListener('click', () => {
        addEmployeeContainer.classList.add('hidden');
    })
});


