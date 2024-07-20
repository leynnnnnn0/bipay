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

const deleteEmployee = (event, id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData();
            formData.append('_method', "DELETE");
            formData.append('id', id);
            fetch('/employee', {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if(result.success)
                    {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        }).then(result => window.location.reload());
                    }else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Internal Server Error!",
                        });
                    }
                })
                .catch(err => console.log(err))
        }
    });
}


