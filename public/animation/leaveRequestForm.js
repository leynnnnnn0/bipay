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
    const formData = new FormData(leaveRequestForm);
    const leaveRequestForm = document.getElementById("leaveRequestForm");
    fetch('/leave-request', {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(result => {
            if(result.success)
            {
                leaveRequestForm.classList.add("hidden")
                alertify.success("Request Submitted", function ()  {
                    window.location.reload();
                })
            }
            if(!result.success)
            {
                alertify.error("Error");
                leaveRequestForm.classList.add("hidden")
            }
    }).catch(err => console.log(err));

}
