const form = document.getElementById('form_jadwal_janji_temu');
const submit = form.querySelector("button[type='submit']");
const alertMsg = document.querySelector('.alert');

form.onsubmit = (e) => {
    e.preventDefault();
};

submit.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/jadwal_temu.php', true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.LOADING) {
            alertMsg.style.display = 'none';
            alertMsg.classList.remove('failure');
            alertMsg.classList.remove('success');
        }
        if (xhr.readyState === XMLHttpRequest.DONE) {
            alertMsg.style.display = 'block';
            if (xhr.responseText.toLowerCase().includes('berhasil')) {
                alertMsg.classList.add('success');
                document.querySelectorAll('button').forEach((el) => {
                    el.disabled = true;
                });
            } else {
                alertMsg.classList.add('failure');
            }
            alertMsg.innerHTML += xhr.responseText;
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
};
