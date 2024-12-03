<!DOCTYPE html>
<html>
<head>

    <!-- DV ---->
    <link rel="stylesheet" href="{{ asset('css/monitoring/ppe.css') }}">
    <script src="{{ asset('js/monitoring/disbursement-voucher.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- End DV ---->

    <!-- Side Nav -->
    <link rel="stylesheet" href="{{ asset('css/sidenav/sidenav.css') }}">
    <script src="{{ asset('js/sidenav/sidenav.js') }}"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- End Side Nav -->

    <!-- Header -->
    <link rel="stylesheet" href="{{ asset('css/header/header.css') }}">
    <script src="{{ asset('js/header/header.js') }}"></script>
    <!-- End Header -->

    <!-- Date Range -->
    <link rel="stylesheet" href="{{ asset('css/daterange/ppe-daterange.css') }}">
    <!-- End Header -->

    <!-- Pagination ---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Pagination ---->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!-- Header --->
    <div class="head-nav-wrapper">
        <div class="head-logo-container">
            <img src="{{ asset('img/dost.png') }}" class="dost-logo">
            <div class="head-text-container">
                DOST-PCAARRD Auditing Team Monitoring System
            </div>
        </div>
        <div class="head-nav-container">
            <div class="icon-container">
                <!-- Notification Icon -->
                <svg class="iconNotif" viewBox="0 0 24 24" fill="none">
                    <g>
                        <path d="M9.5 19C8.89555 19 7.01237 19 5.61714 19C4.87375 19 4.39116 18.2177 4.72361 17.5528L5.57771 15.8446C5.85542 15.2892 6 14.6774 6 14.0564C6 13.2867 6 12.1434 6 11C6 9 7 5 12 5C17 5 18 9 18 11C18 12.1434 18 13.2867 18 14.0564C18 14.6774 18.1446 15.2892 18.4223 15.8446L19.2764 17.5528C19.6088 18.2177 19.1253 19 18.382 19H14.5M9.5 19C9.5 21 10.5 22 12 22C13.5 22 14.5 21 14.5 19M9.5 19C11.0621 19 14.5 19 14.5 19" stroke="#000000" stroke-linejoin="round"/>
                        <path d="M12 5V3" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                </svg>

                <!-- Fullscreen Icon -->
                <svg class="iconFullScreen" id="fullscreen-icon" viewBox="0 0 512 512" width="40" height="40" onclick="toggleFullScreen()">
                    <g>
                        <polygon class="st0" points="345.495,0 394.507,49.023 287.923,155.607 356.384,224.086 462.987,117.493 511.991,166.515 511.991,0"/>
                        <polygon class="st0" points="155.615,287.914 49.022,394.507 0.009,345.494 0.009,512 166.515,512 117.493,462.978 224.087,356.375"/>
                        <polygon class="st0" points="356.384,287.914 287.923,356.375 394.507,462.978 345.495,512 511.991,512 511.991,345.485 462.977,394.507"/>
                        <polygon class="st0" points="166.505,0 0.009,0 0.009,166.506 49.022,117.493 155.615,224.086 224.087,155.607 117.501,49.023"/>
                    </g>
                </svg>

                <!-- Windowed Icon (initially hidden) -->
                <svg id="windowed-icon" class="iconWindowed" viewBox="0 0 512 512" style="display: none;" onclick="toggleFullScreen()">
                    <g>
                        <polygon class="st0" points="461.212,314.349 314.342,314.349 314.342,461.205 357.596,417.973 451.591,511.985 512,451.599 417.973,357.581"/>
                        <polygon class="st0" points="50.788,197.667 197.659,197.667 197.659,50.797 154.42,94.043 60.394,0.025 0,60.417 94.027,154.428"/>
                        <polygon class="st0" points="94.035,357.588 0.016,451.599 60.394,511.992 154.42,417.973 197.668,461.205 197.668,314.349 50.788,314.349"/>
                        <polygon class="st0" points="417.99,154.428 512,60.401 451.591,0.008 357.58,94.035 314.342,50.797 314.342,197.651 461.212,197.651"/>
                    </g>
                </svg>

                <!-- Logout Icon -->
                <svg class="iconLogout" viewBox="0 0 24 24">
                    <path d="M0 9.875v12.219c0 1.125 0.469 2.125 1.219 2.906 0.75 0.75 1.719 1.156 2.844 1.156h6.125v-2.531h-6.125c-0.844 0-1.5-0.688-1.5-1.531v-12.219c0-0.844 0.656-1.5 1.5-1.5h6.125v-2.563h-6.125c-1.125 0-2.094 0.438-2.844 1.188-0.75 0.781-1.219 1.75-1.219 2.875zM6.719 13.563v4.875c0 0.563 0.5 1.031 1.063 1.031h5.656v3.844c0 0.344 0.188 0.625 0.5 0.781 0.125 0.031 0.25 0.031 0.313 0.031 0.219 0 0.406-0.063 0.563-0.219l7.344-7.344c0.344-0.281 0.313-0.844 0-1.156l-7.344-7.313c-0.438-0.469-1.375-0.188-1.375 0.563v3.875h-5.656c-0.563 0-1.063 0.469-1.063 1.031z"/>
                </svg>
            </div>
        </div>
    </div>
    <!-- Header --->


    <!--- Side Nav --->
    <div class="sidebar">
        <div class="side_logo_details">
            <div class="side_logo_name">Main Menu</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="side_nav-list">
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <span class="sidenav_tooltip">Dashboard</span>
            </li>
            <li>
                <a href="" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Disbursement Vouchers</span>
                </a>
                <span class="sidenav_tooltip">Disbursement Vouchers</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Reports on Collections and Deposits</span>
                </a>
                <span class="sidenav_tooltip">Reports on Collections and Deposits</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">MMRI</span>
                </a>
                <span class="sidenav_tooltip">MMRI</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">General Journal</span>
                </a>
                <span class="sidenav_tooltip">General Journal</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Reports on Checks Issued</span>
                </a>
                <span class="sidenav_tooltip">Reports on Checks Issued</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Magna Carta Benefits</span>
                </a>
                <span class="sidenav_tooltip">Magna Carta Benefits</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Salary, PERA, and RATA</span>
                </a>
                <span class="sidenav_tooltip">Salary, PERA, and RATA</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Logbook</span>
                </a>
                <span class="sidenav_tooltip">Logbook</span>
            </li>
        </ul>

    </div>
    <!--- Side Nav --->

    
    <!-- DV Wrapper --->
    <div class="entire-dv-wrapper">

    
        <!-- Title and Pop-up Button --->
        <div class="dv-input-wrapper">  
            <h1 class="h1-date">One Time-Cleansing (PPE)</h1>       
            <button class="newDvButton" onclick="inputDvModal()">Add New Property</button>
        </div>
        <!-- Title and Pop-up Button --->



        <!-- Date Range, Drop Down, Download Form --->

        <div class="date-range-wrapper">  
            <div class="date-row">
                <div class="date-flex-container">
                    <!-- Left Side: Sort and Search Form -->
                    <div class="left-form-container">
                    <form id="filterForm" method="GET" action="{{ route('export.csv') }}" class="date-form-wrapper">
                            <div class="daterange-group">
                                <label for="search_voucher" class="date-form-label">Search</label>
                                <input type="text" id="search_voucher" name="search_voucher" class="date-form-input">
                                <button id="search-btn" class="form-btn submit">Search</button>
                            </div>
                            <div class="daterange-group">
                                <label for="start_date" class="date-form-label">Start Date:</label>
                                <input type="date" id="div_start_date" name="start_date" class="date-form-input">
                            </div>

                            <div class="daterange-group">
                                <label for="end_date" class="date-form-label">End Date:</label>
                                <input type="date" id="div_end_date" name="end_date" class="date-form-input">
                            </div>
                        </form>
                    </div>

                    <!-- Right Side: Filter Form -->
                    <div class="right-form-container">

                    <div class="date-container">

                            <div class="daterange-group">
                                <label for="docDropdownSort" class="date-form-label">Division</label>
                                <select id="docDropdown" name="doc" class="date-form-input">
                                    <option value="">Select Doc</option>
                                    <option value="FAD-Personnel" title="FAD-Personnel">FAD-Personnel</option>
                                    <option value="FAD-Accounting" title="FAD-Accounting">FAD-Accounting</option>
                                    <option value="FAD-DO" title="FAD-DO">FAD-DO</option>
                                    <option value="FAD-Property" title="FAD-Property">FAD-Property</option>
                                </select>
                            </div>


                            <div class="daterange-group">
                                <label for="docDropdownSort" class="date-form-label">Property Type</label>
                                <select id="docDropdown" name="doc" class="date-form-input">
                                    <option value="">Select Doc</option>
                                    <option value="ICT" title="ICT">ICT</option>
                                    <option value="Office Equipment" title="Office Equipment">Office Equipment</option>
                                </select>
                            </div>


                            <div class="daterange-group">
                                <label for="docDropdown" class="date-form-label">Condition</label>
                                <select id="docDropdown" name="doc" class="date-form-input">
                                    <option value="">Select Doc</option>
                                    <option value="Good Condition" title="Good Condition">Good Condition</option>
                                    <option value="Unserviceable" title="Unserviceable">Unserviceable</option>
                                </select>
                                
                                <div id="tooltip" class="tooltip"></div>

                                <button type="button" onclick="" class="form-btn submit">Apply</button>
                                <button onclick="" class="form-btn submit">Download</button>
                                <button type="button" id="dvReloadBtn" class="date-form-btn cancel" onclick="">Reset</button>
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Range, Drop Down, Download Form --->




        <!-- DV TABLE --->

        <div class="div-table-container">
            <table class="table-content" id="voucher-table">
                <thead>
                    <tr>
                        <th>Division</th>
                        <th>User</th>
                        <th>Article/Item</th>
                        <th>Description</th>
                        <th>Property Type</th>
                        <th>Old PN Number</th>
                        <th>New PN Number</th>
                        <!-- <th>Unit of Meas.</th> -->
                        <th>Unit Value</th>
                        <th>Quantity (Property Card)</th> 
                        <!-- <th>Quantity (Physical Count)</th> -->
                        <!-- <th>Previous Location/Whereabouts -->
                        <th>Current Location/Whereabouts
                        <th>Condition</th>
                        <!-- <th>Remarks</th> -->
                        <!-- <th>Date Acquired</th> -->
                        <th>View</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>


            </table>
        </div>

        <!-- DV TABLE --->


        <div id="pagination-btns" class="pagination"></div>


    </div>

    <!-- DV Wrapper --->




    <!-- Input Form Modal Pop-up --->
    <div class="overlay" id="inputOverlay"></div>
    <div id="inputDvModal" class="modal">
        <div class="modal-content">  
            <form id="dv-input" action="" method="Post">
                @csrf
                <input type="hidden" name="id" id="voucherId">

                <div class="input-dv-container">
                    <span class="close" onclick="closeInputPopup()">&times;</span>
                    <!-- <br> -->
                    <div class="form-row-input">
                        
                        <!-- First Column -->
                        <div class="form-column-input"> 
                            <label for="month_">Division</label>
                            <select id="month_" name="month_" class="input-type-text">
                                <option selected>Select Division</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Property">FAD-Property</option>
                            </select>

                            <label for="code_no">User</label>
                            <input type="text" id="code_no" name="code_no" class="input-type-text">

                            <label for="doc_">Property Type</label>
                            <select id="doc_" name="doc_" class="input-type-text">
                                <option selected>Select Property Type</option>
                                <option value="ICT">ICT</option>
                                <option value="Office Equipment">Office Equipment</option>
                            </select>

                            <label for="doc_">Article/Item</label>
                            <select id="doc_" name="doc_" class="input-type-text">
                                <option selected>Select Article/Item</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Desktop">Desktop</option>
                            </select>
                        </div>

                        <!-- Second Column -->
                        <div class="form-column-input"> 
                            <label for="folder">Description</label>
                            <input type="text" id="folder" name="folder" class="input-type-text">

                            <label for="account_no">Old PN Number</label>
                            <input type="text" id="account_no" name="account_no" class="input-type-text">

                            <label for="radai">New PN Number</label>
                            <input type="text" id="radai" name="radai" class="input-type-text">

                            <label for="lddap">Unit of Meas.</label>
                            <input type="text" id="lddap" name="lddap" class="input-type-text">
                        </div>



                        <!-- Third Column -->
                        <div class="form-column-input"> 
                            <label for="folder">Unit Value</label>
                            <input type="text" id="folder" name="folder" class="input-type-text">

                            <label for="account_no">Quantity (Property Card)</label>
                            <input type="text" id="account_no" name="account_no" class="input-type-text">

                            <label for="radai">Quantity (Physical Count)</label>
                            <input type="text" id="radai" name="radai" class="input-type-text">

                            <label for="doc_">Location/Whereabouts</label>
                            <select id="doc_" name="doc_" class="input-type-text">
                                <option selected>Select Location/Whereabouts</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Property">FAD-Property</option>
                            </select>
                        </div>



                        <!-- Fourth Column -->
                        <div class="form-column-input"> 
                            <label for="doc_">Condition</label>
                            <select id="doc_" name="doc_" class="input-type-text">
                                <option selected>Select Condition</option>
                                <option value="Good Condition">Good Condition</option>
                                <option value="Unserviceable">Unserviceable</option>
                            </select>

                            <label for="account_no">Remarks</label>
                            <input type="text" id="account_no" name="account_no" class="input-type-text">

                            <label for="date_received">Date Acquired</label>
                            <input type="date" id="date_received" name="date_received" class="input-type-date">

                            <button type="button" id="dvReloadBtn" class="date-form-btn-cancel" onclick="resetDVInput()">Reset</button>
                            <input type="submit" value="Submit" class="dv-submit-button">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Input Form Modal Pop-up --->



    
    <!-- Edit Modal -->
    <div class="overlay" id="editOverlay"></div>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <form id="editForm" method="POST" action="">
                @csrf
                <input type="hidden" name="id" id="editVoucherId">

                <div class="editForm-input-container">
                    <span class="close" onclick="closeEditPopup()">&times;</span>
                    <div class="editForm-row-input">
                        <div class="editForm-column-input">
                            <label>Month</label>
                            <select id="edit_month_" name="month_" class="input-type-text">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>

                            <label>Document Type</label>
                            <select id="edit_doc_" name="doc_" class="input-type-text">
                                <option value="CD">CD</option>
                                <option value="RCD">RCD</option>
                                <option value="LCA">LCA</option>
                                <option value="GJ">GJ</option>
                                <option value="RCI">RCI</option>
                                <option value="MCB">MCB</option>
                                <option value="SPR">SPR</option>
                            </select>


                            <label>Code</label>
                            <input type="text" id="edit_code_no" name="code_no" class="input-type-text">

                            <label>Folder No.</label>
                            <input type="text" id="edit_folder" name="folder" class="input-type-text">

                            <label>Account No.</label>
                            <input type="text" id="edit_account_no" name="account_no" class="input-type-text">
                        </div>

                        <div class="editForm-column-input">
                            <label>RADAI/RCI Report No.</label>
                            <input type="text" id="edit_radai" name="radai" class="input-type-text">

                            <label>LDDAP-ADA / Check No.</label>
                            <input type="text" id="edit_lddap" name="lddap" class="input-type-text">

                            <label>Total Amount</label>
                            <input type="text" id="edit_total_amount" name="total_amount" class="input-type-text">

                            <label>Date Received</label>
                            <input type="date" id="edit_date_received" name="date_received" class="input-type-date">

                            <input type="submit" value="Save" class="dv-submit-button">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Modal -->


</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

// Input Modal Handling
var inputModal = document.getElementById("inputDvModal");
var inputOverlay = document.getElementById("inputOverlay");

function inputDvModal() {
    inputModal.style.display = "block";
    inputOverlay.style.display = "block";
}

function closeInputPopup() {
    inputModal.style.display = "none";
    inputOverlay.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == inputOverlay) {
        closeInputPopup();
    }
}

// Edit Modal Handling
var editModal = document.getElementById("editModal");
var editOverlay = document.getElementById("editOverlay");

function editVoucher(voucher) {
    document.getElementById('editVoucherId').value = voucher.id;
    document.getElementById('edit_month_').value = voucher.month_;
    document.getElementById('edit_doc_').value = voucher.doc_;
    document.getElementById('edit_code_no').value = voucher.code_no;
    document.getElementById('edit_folder').value = voucher.folder;
    document.getElementById('edit_account_no').value = voucher.account_no;
    document.getElementById('edit_radai').value = voucher.radai;
    document.getElementById('edit_lddap').value = voucher.lddap;
    document.getElementById('edit_total_amount').value = voucher.total_amount;
    document.getElementById('edit_date_received').value = voucher.date_received;

    // Set the form action dynamically
    document.getElementById('editForm').action = `/saveVoucher/${voucher.id}`;

    editModal.style.display = "block";
    editOverlay.style.display = "block";
}


function closeEditPopup() {
    editModal.style.display = "none";
    editOverlay.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == editOverlay) {
        closeEditPopup();
    }
}


</script>

</html>