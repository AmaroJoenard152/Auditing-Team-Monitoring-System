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

function resetPPEFilters() {
    // Reset the date inputs
    document.getElementById("start-date").value = "";
    document.getElementById("end-date").value = "";
    document.getElementById("search_ppe").value = "";

    // Reset dropdowns to default
    document.getElementById("divisionDropdown").selectedIndex = 0;
    document.getElementById("ptDropdown").selectedIndex = 0;
    document.getElementById("conditionDropdown").selectedIndex = 0;
    document.getElementById("statusDropdown").selectedIndex = 0;
    
    // Optionally, trigger the function to reload all data
    // ppeSearchByDateRange();
}


function resetPPEInput() {
    // Reset text inputs
    document.getElementById("article_item").value = "";
    document.getElementById("description").value = "";
    document.getElementById("old_pn").value = "";
    document.getElementById("new_pn").value = "";
    document.getElementById("unit_meas").value = "";
    document.getElementById("unit_value").value = "";
    document.getElementById("quantity_property").value = "";
    document.getElementById("quantity_physical").value = "";
    document.getElementById("remarks").value = "";
    document.getElementById("date_acq").value = "";
    
    // Reset dropdowns to default
    document.getElementById("division").selectedIndex = 0;
    document.getElementById("user").selectedIndex = 0;
    document.getElementById("property_type").selectedIndex = 0;
    document.getElementById("location").selectedIndex = 0;
    document.getElementById("condition").selectedIndex = 0;
    document.getElementById("status").selectedIndex = 0;
    
    // Disable user dropdown
    document.getElementById("user").disabled = true;
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





function populateUserDropdownForEdit(selectedDivision) {
    const userDropdown = document.getElementById("edit_user");
    userDropdown.innerHTML = '<option selected disabled>Select User</option>'; // Reset dropdown
    userDropdown.disabled = true; // Disable dropdown initially

    // Define division-to-user mapping
    const usersByDivision = {
        "ACD": ["Alberto, Pepito G.", "Belen, Maria Adelia C.", "Caparas, Pauline Davis E."],
        "ARMRD": ["Abuan, Catherine R.", "Balbieran, Sarah Hazel M.", "De Guzman, Maria Teresa L."],
        "COA": ["Abordo, Cindy Faith R.", "Rosete, Edlyne A."],
        "CRD": ["Alberto, Pepito G.", "Belen, Maria Adelia C.", "Caparas, Pauline Davis E."],
        "DPITC-ACD": ["Borcena, Bhia Mitchie T.", "De Ramos, Marina T.", "Longamen, Juan Carlo J."],
        "DPITC-MISD": ["Dalisay, Richard O."],
        "DPITC-OED-ARMSS": ["No Names Available"],
        "DPITC-TTPD": ["Dalisay, Richard O."],
        "FAD-Accounting": ["Balagat, Maeanne Lois H.", "Estanislao, Jenylou A.", "Manacop, Michelin B."],
        "FAD-Budget": ["Banasihan, Samantha L.", "Garcia, Susan G.", "Lapitan, Ma. Eleanor S."],
        "FAD-Cash": ["Camposano, Rhodora G.", "Daza, Van Eric L.", "Lajara, Ma. Ester Catalina V."],
        "FAD-DO": ["Amaro, Joenard M.", "Balita, Maria Lea Preciosa E.", "Ocier, Mary Jane"],
        "FAD-GSS": ["Anda, Zoilo E.", "Balagat, Marion Clark H.", "Gregorio, Edicel C."],
        "FAD-Personnel": ["Lawas, Georgia M.", "Maglalang, Jasmin Rose D.", "Reyes, Hannah Joy D."],
        "FAD-Property": ["Bello, Mark Anthony M.", "Carpio, Jovenette L.", "Manabat Jr., Narciso M."],
        "FAD-Property-Stock-Room": ["Alo, Anna Marie P.", "Batalon, Juanito T.", "Dalisay, Richard O."],
        "FERD": ["Almanza, Rosemarie L.", "Cabral, Dalisay E.", "Opeña, Aster H."],
        "IARRD": ["Almazan, Cynthia V.", "Calpe, Adelaida T.", "Gahon, Shirley"],
        "IDD": ["Alcantara, Victor P.", "Asilo, Eriza", "Baguio, Synan S."],
        "LRD": ["Alo, Anna Marie P.", "Baguio, Synan S.", "Catelo, Ariane Shane DC"],
        "MISD": ["Amansec, Richard E.", "Camposano, John Ross L.", "Cambay, Jan Andrei V."],
        "MRRD": ["Acedera, Mari-Ann M.", "Asajar, Jerwin D.", "Barrion, Dan Carlo B."],
        "OED": ["Afalla Jr., Eugenio G.", "Ebora, Reynaldo V.", "Garcia Jr., Norberto"],
        "OED-ARMSS": ["Adique, Micah Angelica V.", "Carlos, Melvin B.", "Centeno, Pamela Marie A."],
        "OED-RD": ["Afalla, Monaliza B.", "Bandong, Esther Gayle M.", "Gallarte, Lino"],
        "PCMD": ["Name1", "Name2"],
        "SERD": ["Name1", "Name2"],
        "TTPD": ["Name1", "Name2"],
        "Not_Available": ["Not Available"]
    };

    // Get users for the selected division
    const users = usersByDivision[selectedDivision] || [];

    // Add users to dropdown
    users.forEach(user => {
        const option = document.createElement("option");
        option.value = user;
        option.textContent = user;
        userDropdown.appendChild(option);
    });

    // Enable dropdown if users are available
    if (users.length > 0) {
        userDropdown.disabled = false;
    }
}
