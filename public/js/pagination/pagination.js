// Update table rows based on initial data and pagination
function updateTableRows() {
    const tableBody = document.querySelector('#crimeReportTable tbody');
    tableBody.innerHTML = ''; // Clear existing rows

    const startIndex = (currentPage - 1) * rowsPerPage;
    const endIndex = startIndex + rowsPerPage;
    const dataToShow = initialData.slice(startIndex, endIndex);

    dataToShow.forEach(rowData => {
        const newRow = createRow(rowData);
        if (newRow) {
            tableBody.appendChild(newRow);
        }
    });
}

function generatePaginationButtons() {
    const paginationContainer = document.getElementById('pagination-btns');
    paginationContainer.innerHTML = ''; // Clear existing pagination

    const dataToPaginate = filteredData.length > 0 ? filteredData : initialData; // Use filtered data if available

    const totalPages = Math.ceil(dataToPaginate.length / rowsPerPage);

    if (totalPages <= maxVisiblePages) {
        // If total pages are less than or equal to maxVisiblePages, show all pages
        for (let i = 1; i <= totalPages; i++) {
            addPaginationButton(paginationContainer, i);
        }
    } else {
        let startPage, endPage;
        if (currentPage <= Math.ceil(maxVisiblePages / 2)) {
            startPage = 1;
            endPage = maxVisiblePages;
        } else if (currentPage >= totalPages - Math.floor(maxVisiblePages / 2)) {
            startPage = totalPages - maxVisiblePages + 1;
            endPage = totalPages;
        } else {
            startPage = currentPage - Math.floor(maxVisiblePages / 2);
            endPage = currentPage + Math.floor(maxVisiblePages / 2);
        }

        if (startPage < 1) {
            startPage = 1;
        }
        if (endPage > totalPages) {
            endPage = totalPages;
        }

        if (startPage > 1) {
            addPaginationButton(paginationContainer, 1); // Always show first page
            if (startPage > 2) {
                paginationContainer.appendChild(createEllipsis());
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            addPaginationButton(paginationContainer, i);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationContainer.appendChild(createEllipsis());
            }
            addPaginationButton(paginationContainer, totalPages); // Always show last page
        }
    }

    const prevButton = document.createElement('button');
    prevButton.textContent = '«';
    prevButton.onclick = () => {
        if (currentPage > 1) {
            goToPage(currentPage - 1);
        }
    };
    if (currentPage === 1) {
        prevButton.disabled = true;
    }
    paginationContainer.insertBefore(prevButton, paginationContainer.firstChild);

    const nextButton = document.createElement('button');
    nextButton.textContent = '»';
    nextButton.onclick = () => {
        if (currentPage < totalPages) {
            goToPage(currentPage + 1);
        }
    };
    if (currentPage === totalPages) {
        nextButton.disabled = true;
    }
    paginationContainer.appendChild(nextButton);

    highlightActivePage(currentPage);
}


function addPaginationButton(container, pageNumber) {
    const button = document.createElement('button');
    button.textContent = pageNumber;
    button.onclick = () => goToPage(pageNumber);
    if (pageNumber === currentPage) {
        button.classList.add('active');
    }
    container.appendChild(button);
}

function createEllipsis() {
    const ellipsis = document.createElement('span');
    ellipsis.textContent = '...';
    ellipsis.classList.add('ellipsis');
    return ellipsis;
}

// Navigate to a specific page
function goToPage(pageNumber) {
    currentPage = pageNumber;
    if (filteredData.length > 0) {
        updateTableRowsFiltered(); // Update table rows with filtered data
    } else {
        updateTableRows(); // Update table rows with initial data
    }
    generatePaginationButtons(); // Regenerate pagination buttons
}


// Highlight active page in pagination
function highlightActivePage(pageNumber) {
    const paginationButtons = document.querySelectorAll('.pagination-btns button');
    paginationButtons.forEach(button => {
        button.classList.remove('active');
        if (parseInt(button.textContent) === pageNumber) {
            button.classList.add('active');
        }
    });
}
