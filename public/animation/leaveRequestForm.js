const leaveRequestFormContainer = document.getElementById("leaveRequestContainer");

const showRequestForm = () => {
    leaveRequestFormContainer.classList.remove("hidden");
}
const hideRequestForm = (event) => {
    event.preventDefault();
    leaveRequestFormContainer.classList.add("hidden");
}
