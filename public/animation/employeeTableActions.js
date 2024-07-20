const viewEmployeeContainer = document.getElementById("viewEmployeeContainer");
const hideEmployeeDetails = () => {
    viewEmployeeContainer.classList.add("hidden")
}
const viewEmployeeAction = (event, id) => {
    const params = new URLSearchParams({ id: id });
    fetch(`/employee?${params.toString()}`, {
        method: "GET",
    }).then(response => response.text())
        .then(result => {
            viewEmployeeContainer.innerHTML = result;
        })

    viewEmployeeContainer.classList.remove("hidden");
}

