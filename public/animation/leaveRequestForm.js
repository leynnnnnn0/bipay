const leaveRequestFormContainer = document.getElementById("leaveRequestContainer");

const showRequestForm = () => {
    leaveRequestFormContainer.classList.remove("hidden");
}
const hideRequestForm = (event) => {
    event.preventDefault();
    leaveRequestFormContainer.classList.add("hidden");
}

const sendForm = async (e) => {
    e.preventDefault();
    const leaveRequestForm = document.getElementById("leaveRequestForm");
    const formData = new FormData(leaveRequestForm);
    fetch('/leave-request', {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(result => {
            if(result.success)
            {
                window.location.reload();
                alertify.success("Request Submitted")
            }
            if(!result.success)
                alertify.error("Request failed to submit.")
    }).catch(err => console.log(err));

}
