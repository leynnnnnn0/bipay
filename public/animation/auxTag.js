document.addEventListener('DOMContentLoaded', () => {
    document.getElementById("aux").addEventListener('change', (event) => {
        const formData = new FormData();
        formData.append('aux', event.target.value)
        fetch('/aux', {
            method: 'POST',
            body: formData
        }).catch(err => console.log(err))
    })
})


