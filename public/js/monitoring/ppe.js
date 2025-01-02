function toggleFullScreen() {
    const fullscreenIcon = document.getElementById('fullscreen-icon');
    const windowedIcon = document.getElementById('windowed-icon');

    if (!document.fullscreenElement) {
        // Enter fullscreen mode
        document.documentElement.requestFullscreen().catch(err => {
            console.log(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
        });

        // Show windowed icon and hide fullscreen icon
        fullscreenIcon.style.display = 'none';
        windowedIcon.style.display = 'block';

    } else {
        // Exit fullscreen mode
        if (document.exitFullscreen) {
            document.exitFullscreen();

            // Show fullscreen icon and hide windowed icon
            fullscreenIcon.style.display = 'block';
            windowedIcon.style.display = 'none';
        }
    }
}


function resetFilters() {
    // Reset the date inputs
    document.getElementById("div_start_date").value = "";
    document.getElementById("div_end_date").value = "";
    document.getElementById("search_voucher").value = "";

    // Reset the dropdown to its default value
    document.getElementById("docDropdown").selectedIndex = 0;

    // Optionally, trigger the function to reload all data
    dvsearchByDateRange();
}




function generatePaginationButtons() {
    const paginationContainer = document.getElementById('pagination-btns');
    paginationContainer.innerHTML = '';  // Clear current pagination buttons

    const pageCount = Math.ceil(filteredData.length / rowsPerPage);  // Use filteredData to get page count

    // Always show pagination (even if there's only one page)
    if (pageCount === 1) {
        const btn = document.createElement('button');
        btn.innerText = '1';
        btn.classList.add('pagination-btn', 'active');
        paginationContainer.appendChild(btn);
        return;
    }

    // Previous button
    const prevBtn = document.createElement('button');
    prevBtn.innerText = 'Previous';
    prevBtn.classList.add('pagination-btn');
    prevBtn.disabled = currentPage === 1;
    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updateTableRows();
            generatePaginationButtons();
        }
    });
    paginationContainer.appendChild(prevBtn);

    // Calculate the range of pagination buttons
    let startPage = Math.max(1, currentPage - Math.floor(maxPaginationButtons / 2));
    let endPage = Math.min(pageCount, startPage + maxPaginationButtons - 1);

    // Ensure we always show exactly maxPaginationButtons
    if (endPage - startPage + 1 < maxPaginationButtons && startPage > 1) {
        startPage = Math.max(1, endPage - maxPaginationButtons + 1);
    }

    // Generate pagination buttons for the calculated range
    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.innerText = i;
        btn.classList.add('pagination-btn');
        btn.classList.toggle('active', i === currentPage);

        btn.addEventListener('click', () => {
            currentPage = i;
            updateTableRows();
            generatePaginationButtons();
        });

        paginationContainer.appendChild(btn);
    }

    // Next button
    const nextBtn = document.createElement('button');
    nextBtn.innerText = 'Next';
    nextBtn.classList.add('pagination-btn');
    nextBtn.disabled = currentPage === pageCount;
    nextBtn.addEventListener('click', () => {
        if (currentPage < pageCount) {
            currentPage++;
            updateTableRows();
            generatePaginationButtons();
        }
    });
    paginationContainer.appendChild(nextBtn);
}






