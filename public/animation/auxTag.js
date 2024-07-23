document.addEventListener('DOMContentLoaded', () =>  {

    document.getElementById("punchIn").addEventListener('click', function()  {
        this.disabled = true;
        const formData = new FormData();
        formData.append('tag', 'PUNCH IN');
        fetch('/punch-in', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
            .then(result => {
                console.log(result)
                document.getElementById("punchInTime").innerText = result.time
                document.getElementById("taggingContainer").classList.remove("hidden");
            })
            .catch(err => console.log(err));

    })

    document.getElementById("punchOut").addEventListener('click', function()  {
        this.disabled = true;
        const formData = new FormData();
        formData.append('tag', 'PUNCH OUT');
        fetch('/punch-out', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
            .then(result => {
                document.getElementById("punchOutTime").innerText = result.time
                document.getElementById("taggingContainer").classList.add("hidden");
            })
            .catch(err => console.log(err));

    })



    document.getElementById("aux").addEventListener('change', (event) => {
        const formData = new FormData();
        formData.append('aux', event.target.value)
        formData.append('tag', event.target.value)
        fetch('/aux', {
            method: 'POST',
            body: formData
        }).then(response => {
            console.log(response.text())
            clearTimer()
            startCounting(timerElement)
        }).catch(err => console.log(err))
    })
    const timerElement = document.getElementById('timer');
    // Function to start or resume counting
    function startCounting(timerElement) {
        // Retrieve the stored start time from localStorage
        const storedStartTime = localStorage.getItem('startTime');
        let startTime;

        if (storedStartTime) {
            // If start time exists, use it
            startTime = parseInt(storedStartTime, 10);
        } else {
            // If no start time, initialize and store it
            startTime = Date.now();
            localStorage.setItem('startTime', startTime);
        }
        const intervalId = setInterval(() => {
            const currentTime = Date.now();
            const elapsedTime = currentTime - startTime;

            const seconds = Math.floor(elapsedTime / 1000);
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;

            // Format time as HH:MM:SS
            const formattedTime = [
                hours.toString().padStart(2, '0'),
                minutes.toString().padStart(2, '0'),
                secs.toString().padStart(2, '0')
            ].join(':');

            timerElement.textContent = formattedTime;

            // Store the current time in localStorage to keep track of the latest state
            localStorage.setItem('startTime', startTime);
        }, 1000); // Update every 1 second

        return intervalId; // Optional: Return intervalId if you want to stop the timer later
    }

    // Function to clear the timer
    function clearTimer() {
        localStorage.removeItem('startTime');
    }

})


