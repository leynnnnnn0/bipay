const showRequestListOptions = (id) => {
    const options = document.getElementById(id);
    options.classList.toggle("hidden");
    console.log(id)
}

const approveRequest = (id, status) => {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('status', status);
    fetch('/approve-request', {
        method: "POST",
        body: formData
    }).then(response => response.json()).then(result => console.log(result)).catch(err => console.log(err));
}