let currentPage = 1;
const searchInput = $('#search');
const showSelect = $('#show');
const dataContainer = $('#data-container');
const pagination = $('#pagination');
const alertMsg = $('.alert');

function loadData(page) {
    currentPage = page;
    let search = searchInput.val().trim();
    let recordsPerPage = showSelect.val();

    $.ajax({
        url: '/php/fetch_jadwal_temu.php',
        type: 'POST',
        dataType: 'json',
        data: {
            search: search,
            page: currentPage,
            records_per_page: recordsPerPage,
        },
        success: function (response) {
            renderData(response);
        },
        error: function () {
            alertMsg
                .css('display', 'block')
                .addClass('failure')
                .text('Failed to fetch data.');
        },
    });
}

function renderData(response) {
    dataContainer.empty(); // Clear previous data

    $.each(response.data, function (index, row) {
        // Format appointment_date into Indonesian date format
        let appointmentDate = formatDateIndonesian(row.appointment_date);

        let rowData = `
            <tr>
                <td data-label="No">${
                    index + 1 + (currentPage - 1) * response.records_per_page
                }</td>
                <td data-label="Nama">${row.name}</td>
                <td data-label="Alamat">${row.address}</td>
                <td data-label="Jenis Kelamin">${
                    row.gender === 'l' ? 'Laki-laki' : 'Perempuan'
                }</td>
                <td data-label="Telepon">${row.phone}</td>
                <td data-label="Bertemu Dengan">${row.meeting_with}</td>
                <td data-label="Keperluan">${row.purpose}</td>
                <td data-label="Jam Masuk">${row.appointment_time}</td>
                <td data-label="Tanggal">${appointmentDate}</td>
                <td data-label="Jumlah Orang">${row.people_amount}</td>
                <td data-label="Foto Tamu"><img src="${
                    row.guest_photo
                }" alt="Foto Tamu"></td>
                <td data-label="Edit"><button>Setujui</button></td>
                <td data-label="Hapus"><button class="decline">Tolak</button></td>
            </tr>
        `;
        dataContainer.append(rowData);
    });

    pagination.empty(); // Clear previous pagination

    // Previous Button
    if (currentPage > 1) {
        let prevPage = currentPage - 1;
        let prevLink = `<a href="#" onclick="loadData(${prevPage})">&laquo;</a>`;
        pagination.append(prevLink);
    }

    // Page Links with Ellipses
    const totalPages = response.total_pages;
    const maxPagesToShow = 5;

    if (totalPages <= maxPagesToShow) {
        for (let i = 1; i <= totalPages; i++) {
            let pageLink = `<a href="#" class="${
                currentPage === i ? 'active' : ''
            }" onclick="loadData(${i})">${i}</a> `;
            pagination.append(pageLink);
        }
    } else {
        if (currentPage <= Math.ceil(maxPagesToShow / 2)) {
            for (let i = 1; i <= maxPagesToShow - 1; i++) {
                let pageLink = `<a href="#" class="${
                    currentPage === i ? 'active' : ''
                }" onclick="loadData(${i})">${i}</a> `;
                pagination.append(pageLink);
            }
            pagination.append('<span>...</span>');
            let lastPageLink = `<a href="#" onclick="loadData(${totalPages})">${totalPages}</a> `;
            pagination.append(lastPageLink);
        } else if (currentPage >= totalPages - Math.floor(maxPagesToShow / 2)) {
            let firstPageLink = `<a href="#" onclick="loadData(1)">1</a> `;
            pagination.append(firstPageLink);
            pagination.append('<span>...</span>');
            for (
                let i = totalPages - (maxPagesToShow - 2);
                i <= totalPages;
                i++
            ) {
                let pageLink = `<a href="#" class="${
                    currentPage === i ? 'active' : ''
                }" onclick="loadData(${i})">${i}</a> `;
                pagination.append(pageLink);
            }
        } else {
            let firstPageLink = `<a href="#" onclick="loadData(1)">1</a> `;
            pagination.append(firstPageLink);
            pagination.append('<span>...</span>');
            for (
                let i = currentPage - Math.floor((maxPagesToShow - 2) / 2);
                i <= currentPage + Math.floor((maxPagesToShow - 2) / 2);
                i++
            ) {
                let pageLink = `<a href="#" class="${
                    currentPage === i ? 'active' : ''
                }" onclick="loadData(${i})">${i}</a> `;
                pagination.append(pageLink);
            }
            pagination.append('<span>...</span>');
            let lastPageLink = `<a href="#" onclick="loadData(${totalPages})">${totalPages}</a> `;
            pagination.append(lastPageLink);
        }
    }

    // Next Button
    if (currentPage < response.total_pages) {
        let nextPage = currentPage + 1;
        let nextLink = `<a href="#" onclick="loadData(${nextPage})">&raquo;</a>`;
        pagination.append(nextLink);
    }
}

// Function to format date into Indonesian format
function formatDateIndonesian(dateStr) {
    let months = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    let dateObj = new Date(dateStr);
    let day = dateObj.getDate();
    let monthIndex = dateObj.getMonth();
    let year = dateObj.getFullYear();

    return `${day} ${months[monthIndex]} ${year}`;
}

// Initial load and event listeners
$(document).ready(function () {
    loadData(currentPage);

    searchInput.on(
        'keyup',
        debounce(function () {
            loadData(currentPage);
        }, 300)
    ); // Debounce search input to limit frequency of calls

    showSelect.on('change', function () {
        loadData(currentPage);
    });
});

// Debounce function for throttling event handlers
function debounce(func, delay) {
    let timer;
    return function () {
        clearTimeout(timer);
        timer = setTimeout(function () {
            func.apply(this, arguments);
        }, delay);
    };
}
