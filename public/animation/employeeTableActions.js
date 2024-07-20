const viewEmployeeContainer = document.getElementById("viewEmployeeContainer");
// const viewEmployeeAction = document.getElementById("viewEmployeeAction");
const hideEmployeeDetails = document.getElementById("hideEmployeeDetails");

const viewEmployeeAction = (event, id) => {
    event.preventDefault();
    viewEmployeeContainer.classList.remove("hidden")
}
hideEmployeeDetails.addEventListener('click', () => {
    viewEmployeeContainer.classList.add("hidden")

})

