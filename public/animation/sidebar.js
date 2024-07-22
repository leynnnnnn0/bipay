document.addEventListener("DOMContentLoaded", () => {
    const showLeaveOptionsButton = document.getElementById("leaveOptions");
    showLeaveOptionsButton.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("leaveOptionsContainer").classList.toggle("hidden");
    })
});

