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

divisionUsers = {
    "ACD": ["Alberto, Pepito G.", "Belen, Maria Adelia C.", "Caparas, Pauline Davis E.", "De Castro, Rosemarie A.", 
    "De Guzman, Kristine Joy P.", "Deseo, Nenet B.", "Deseo, Netnet B.", "Ibarra, Alissa Carol M.", 
    "Ignacio, Rhesa Miren A.", "Lambio, Roscelia M.", "Locsin, Kimberly Zarah B.", "Lubang, Sahrie Al-Faiha A.", 
    "Lubang, Sharie Al-Faiha A.", "Macaraeg, John Aaron Mark V.", "Naval, Ervin M.", "Odejar, Fredric M.", 
    "Palma, Ireneo B.", "Panganiban, Joel Norman R.", "Penido, Eiros Colins R.", "Pelegrina, Leilani D.", 
    "Plata, Joan May B.", "Rasgo, Maria Rae Lynne J.", "Recote, Jessa May Q.", "Reyes, Lilia V.", 
    "Samson, Erika E.", "Sustrina, Brian Angelo R.", "Valencia, Erwin Cris D.", "Yebron, Renelle C.", "Not_Available"],

    "ARMRD": ["Abuan, Catherine R.", "Balbieran, Sarah Hazel M.", "De Guzman, Maria Teresa L.", "Domingo, Ofelia F.", 
    "Evangelista, Misty Mae M.", "Remoquillo, Cynthia P.", "Santiago, Romeo P.", "Villarma, Kathleen Faith Jay O."],

    "COA": ["Abordo, Cindy Faith R.", "Rosete, Edlyne A."],

    "CRD": ["Alberto, Pepito G.", "Belen, Maria Adelia C.", "Caparas, Pauline Davis E.", "De Castro, Rosemarie A.", 
    "De Guzman, Kristine Joy P.", "Deseo, Netnet B.", "Ibarra, Alissa Carol M.", "Ignacio, Rhesa Miren A.", 
    "Lambio, Roscelia M.", "Locsin, Kimberly Zarah B.", "Lubang, Sharie Al-Faiha A.", "Macaraeg, John Aaron Mark V.", 
    "Naval, Ervin M.", "Odejar, Fredric M.", "Palma, Ireneo B.", "Panganiban, Joel Norman R.", 
    "Penido, Eiros Colins R.", "Pelegrina, Leilani D.", "Plata, Joan May B.", "Rasgo, Maria Rae Lynne J.", 
    "Recote, Jessa May Q.", "Reyes, Lilia V.", "Samson, Erika E.", "Sustrina, Brian Angelo R.", 
    "Yebron, Renelle C.", "Not_Available"], 

    "DPITC-ACD": ["Borcena, Bhia Mitchie T.", "De Ramos, Marina T.", "Longamen, Juan Carlo J.", "Leron, Paul Jersey G.", 
    "Valencia, Erwin Cris D."],

    "DPITC-MISD": ["Dalisay, Richard O."],

    "DPITC-OED-ARMSS": ["No Names Available"],

    "DPITC-TTPD": ["Dalisay, Richard O."],

    "FAD-Accounting": ["Balagat, Maeanne Lois H.", "Estanislao, Jenylou A.", "Manacop, Michelin B.", "Manalang, Eugene S.", 
    "Tabadero, Jaivee Ann M"],

    "FAD-Budget": ["Banasihan, Samantha L.", "Garcia, Susan G.", "Lapitan, Ma. Eleanor S.", "Vega, Mary Jane M."],

    "FAD-Cash": ["Camposano, Rhodora G.", "Daza, Van Eric L.", "Lajara, Ma. Ester Catalina V.", "Ramos, Heidi"],

    "FAD-DO": ["Amaro, Joenard M.", "Balita, Maria Lea Preciosa E.", "Ocier, Mary Jane" ],

    "FAD-GSS": ["Anda, Zoilo E.", "Balagat, Marion Clark H.", "Gregorio, Edicel C.", "Oleta, Armand J."],
    
    "FAD-Personnel": ["Lawas, Georgia M.", "Maglalang, Jasmin Rose D.", "Reyes, Hannah Joy D.", "Sobrevega Jr., Marcelino V.", 
    "Visperas, Rommel V."],

    "FAD-Property": ["Bello, Mark Anthony M.", "Carpio, Jovenette L.", "ManabaT Jr., Narciso M.", "Manalo, Jose Raymond A.", 
    "Revera, Jovan B."],

    "FAD-Property-Stock-Room": ["Alo, Anna Marie P.", "Batalon, Juanito T.", "Dalisay, Richard O.", "Delos Reyes, Shein Ann R.", 
    "Santiago, Christine D.", "Torreta, Nimfa K."],

    "FERD": ["Almanza, Rosemarie L.", "Cabral, Dalisay E.", "Opeña, Aster H.", "Martinez, Jenna Mae R.", "Santiago, Christine D.", 
    "Torreta, Nimfa K.", "Zuñiga, John Benrich M."],

    "IARRD": ["Almazan, Cynthia V.", "Calpe, Adelaida T.", "Gahon, Shirley", "Igcasan, Mary Ann A.", "Mero, Fedelia Flor C.", 
    "Not_Available", "Olaer, Geraldin Mae D.", "Ramonan, Rizza B.", "Salac, Virna G.", "Tandang, Kristine Joy L.", 
    "Valguna, Janet Jane S."],

    "IDD": ["Alcantara, Victor P.", "Asilo, Eriza", "Baguio, Synan S.", "Buenaobra, Salvador S.", 
    "Caparas, Michelle P.", "Decena, Fezoil Luz C.", "Delos Reyes, Sherwin R.", "Lastimosa, Wilmar J.", "Laranas, Jesselle S.", 
    "Laquinon, Rowena Rita B.", "Libit, Precious D.", "Manacsa, Jemuel I.", "Oleta, Armand J.", "Paclibar, Leovil N.", 
    "Pasuquin, Donnalyn M.", "Saluta, Joseph T.", "Sumiran, Darryl C.", "Tanqueco, Ruel Carlo L."],

    "LRD": ["Alo, Anna Marie P.", "Baguio, Synan S.", "Catelo, Ariane Shane DC", "Collado, Aleli A.", "Cristobal, Adrian P.", 
    "De Castro, Ronilo O.", "Dayo, Marites R.", "Fule, Glenda P.", "Llamas, Rundolfo P.", "Mendoza, Stephen A.", 
    "Parungao, Alfredo Ryenel M.", "Perez, Eric P."],

    "MISD": ["Amansec, Richard E.", "Camposano, John Ross L.", "Cambay, Jan Andrei V.", "Dalisay, Richard O.", 
    "Diaz, Mark Anthony M.", "Leaño, Cecilia B.", "Legaspi, Paula Mari M.", "Manzanilla, Ricaredo V.", "Mulimbayan, Rick Adrian A.", 
    "Pasuquin, Marielle J.", "Supan, Kris Marion R."],

    "MRRD": ["Acedera, Mari-Ann M.", "Asajar, Jerwin D.", "Barrion, Dan Carlo B.", "Barrion, Dan Carlo N.", "Corpuz, Ma. Adela C.", 
    "De Vera, Michelle A.", "Escarez, Rosalinda D.", "Odemer, Hannah May B.", "Redera, Eileen M.", "Samonte, Preciosa C.", 
    "Trinidad, Jaypee G."],

    "OED": ["Afalla Jr., Eugenio G.", "Ebora, Reynaldo V.", "Garcia Jr., Norberto", "Leyciso, Maria Cecilia R.", 
    "Peralta, Victoria Athena D.", "Suarez, Dolores N.", "Vallejo, Martha Lois O.", 
    "Zuraek, Jobelle Mae L."],

    "OED-ARMSS": ["Adique, Micah Angelica V.", "Carlos, Melvin B.", "Centeno, Pamela Marie A.", "Falcon, Fermella Emily B.", 
    "Garcia, Marjorie M.", "Gonzaga, Janela Rances R.", "Lamano, Ronald John L.", "Lapitan, Aileen L.", "Legaspi Jr., Pascasio", 
    "Limosinero, Renelaine E.", "Nuñez, Mia M.", "Panganiban, Jeremie", "Palacpac, Lyanne B.", "Surara, Christie A."],

    "OED-RD": ["Afalla, Monaliza B.", "Bandong, Esther Gayle M.", "Gallarte, Lino", "Lameyra, Leandro C.", 
    "Lebornio, Charmi Uellin P.", "Reyes, Ruth Danica A.", "Samonte, Anna Cristina R.", "San Luis, Josette B.", 
    "Tandang, Jean Camille V.", "Tandang, Pamela Anne V."],


    "PCMD": ["Banganan, Azel Glory C.", "Bebis Jr., Alfredo I.", "Bondoc, Lilian G.", "Lim, Cyrill E.", "Parducho, Rowena A.", 
    "Sabarias, Mussaenda G.", "Tamis, Alexandra E."],

    "SERD": ["Abeleda, Meliza F.", "Bandoles, Genny G.", "Bautista, Charisse C.", "Brown, Ernesto O.", "Castillo, Monica B.", 
    "Colobong, Shaliemae L. (R. Candano)", "Colobong, Shalimae L.", "Correa, Aleta Belissa D. (V. Fernandez)", 
    "Curibot, Janine P.", "Dimagiba, Ezequiel R.", "Fernandez, Vincent M.", "Gevaña, Mikaela Marie B.", 
    "Horigue, Malen Maree A.", "Inoceno, Rochelle L.", "Lapitan, Emil Rey B.", "Madrigal, El Vic R.", 
    "Manzano, Christian John M.", "Morada, Kyle Cristel D.", "Puntanar, Jennifer", "Salem, Kalthem Salem B.", 
    "Suizo, Maritoni B.", "Tamis, Alexandra E.", "Tobias, Annette M.", "Trillana, Charmaine Angela B.", "Zara, John Ceddrix."],

    "TTPD": ["Borja, Alexander John D.", "Dagaas, Mae A.", "Diaz, Analiza C.", "Lalican, Engelbert D.", "Lizaba, Ma. Alexie D.", 
    "Resuello, Rubiriza DC.", "Tandang, Imelda L.", "Tanyag, Yolanda M."],

    "Not_Available": ["Not_Available"]
};

function populateUserDropdownForEdit(division, currentUser = '') {
    const userDropdown = document.getElementById('edit_user');
    userDropdown.innerHTML = `<option selected disabled>Select User</option>`;

    const users = divisionUsers[division] || [];

    users.forEach(user => {
        const isSelected = user === currentUser ? 'selected' : '';
        userDropdown.innerHTML += `<option value="${user}" ${isSelected}>${user}</option>`;
    });

    // If the current user is not in the list, add it manually
    if (currentUser && !users.includes(currentUser)) {
        userDropdown.innerHTML += `<option value="${currentUser}" selected>${currentUser}</option>`;
    }

    userDropdown.disabled = users.length === 0;
}