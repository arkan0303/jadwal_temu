/* Karyawan Select */
function phoneNumberFill() {
    const karyawanSelect = document.getElementById('karyawan');
    const selectedOption = karyawanSelect.options[karyawanSelect.selectedIndex];
    const phoneNumberInp = document.getElementById('telepon');

    const phoneNumber = selectedOption.getAttribute('data-phone');
    phoneNumberInp.value = phoneNumber;
}

/* Form Buku Tamu */
const form = document.getElementById('form_jadwal_buku_tamu');
const alertMsg = document.querySelector('.alert');
const msg = alertMsg.querySelector('strong');

form.onsubmit = (e) => {
    e.preventDefault();
    console.log('Form submission prevented');

    let isValid = true;
    form.querySelectorAll('[required]').forEach((input) => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    if (!isValid) {
        alertMsg.style.display = 'block';
        alertMsg.classList.add('failure');
        msg.innerHTML = 'Please fill out all required fields.';
        console.log('Form validation failed');
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/reservasi_tamu.php', true);
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
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            } else {
                alertMsg.classList.add('failure');
            }
            msg.innerHTML = xhr.responseText;
        }
    };

    let formData = new FormData(form);
    formData.append('tipe_reservasi', 'buku_tamu');
    xhr.send(formData);
    console.log('Form data sent');
};
