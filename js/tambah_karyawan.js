const form = document.getElementById('form_tambah_karyawan');
const submit = form.querySelector("button[type='submit']");
const alertMessage = document.querySelector('.alert');
const message = alertMessage.querySelector('strong');

form.onsubmit = (e) => {
    e.preventDefault();
};

submit.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/tambah_karyawan.php', true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.LOADING) {
            alertMessage.style.display = 'none';
            alertMessage.classList.remove('success');
            alertMessage.classList.remove('failure');
        }
        if (xhr.readyState === XMLHttpRequest.DONE) {
            alertMessage.style.display = 'block';
            if (xhr.responseText.toLowerCase().includes('berhasil')) {
                alertMessage.classList.add('success');
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            } else {
                alertMessage.classList.add('failure');
            }

            message.innerHTML = xhr.responseText;
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
};
