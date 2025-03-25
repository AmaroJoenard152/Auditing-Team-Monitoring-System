<!DOCTYPE html>
<html>
<head>

    <!-- DV ---->
    <link rel="stylesheet" href="{{ asset('css/monitoring/disbursement-voucher.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/daterange/dv-daterange.css') }}">
    <!-- End Header -->

    <!-- Pagination ---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{ asset('js/pagination/pagination.js') }}" defer></script>
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
        <div class="input-wrapper">  
            <h1 class="h1-date">DV Monitoring</h1>       
            <button class="popup-button" onclick="inputDvModal()">Add New DV</button>
        </div>
        <!-- Title and Pop-up Button --->


        <!-- Date Range, Drop Down, Download Form --->

        <div class="date-range-wrapper">  
            <div class="date-row">
                <div class="date-flex-container">
                    <!-- Left Side: Sort and Search Form -->
                    <div class="left-form-container">
                        <div class="date-container">
                            <div class="daterange-group">
                                <label for="docDropdownSort" class="date-form-label">Sort Data</label>
                                <select name="doc" class="date-form-input">
                                    <option value="">Select Sort</option>
                                    <option value="ascending">Ascending</option>
                                    <option value="descending">Descending</option>
                                </select>
                            </div>
                            
                            <div class="daterange-group">
                                <label for="search_voucher" class="date-form-label">Search</label>
                                <input type="text" id="search_voucher" name="search_voucher" class="date-form-input">
                                <button id="search-btn" class="form-btn submit">Search</button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Filter Form -->
                    <div class="right-form-container">
                        <form id="filterForm" method="GET" action="{{ route('dv-export.csv') }}" class="date-form-wrapper">
                            <div class="daterange-group">
                                <label for="start_date" class="date-form-label">Start Date:</label>
                                <input type="date" id="div_start_date" name="start_date" class="date-form-input">
                            </div>

                            <div class="daterange-group">
                                <label for="end_date" class="date-form-label">End Date:</label>
                                <input type="date" id="div_end_date" name="end_date" class="date-form-input">
                            </div>

                            <div class="daterange-group">
                                <label for="docDropdown" class="date-form-label">Document Type</label>
                                <select id="docDropdown" name="doc" class="date-form-input">
                                    <option value="">Select Doc</option>
                                    <option value="CD" title="Check Disbursement">CD</option>
                                    <option value="RCD" title="Report on Collections and Deposits">RCD</option>
                                    <option value="LCA" title="Liquidation of Cash Advances">LCA</option>
                                    <option value="GJ" title="General Journal">GJ</option>
                                    <option value="RCI" title="Report on Checks Issued">RCI</option>
                                    <option value="MCB" title="Magna Carta Benefits">MCB</option>
                                    <option value="SPR" title="Salary, PERA, and RATA">SPR</option>
                                </select>
                                
                                <div id="tooltip" class="tooltip"></div>

                                <button type="button" onclick="dvsearchByDateRange()" class="form-btn submit">Apply</button>
                                <button onclick="dvDownloadCSV()" class="form-btn submit">Download</button>
                                <button type="button" id="dvReloadBtn" class="date-form-btn cancel" onclick="resetFilters()">Reset</button>
                            </div>
                        </form>
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
                        <th>Month</th>
                        <th>Document Type</th>
                        <th>Code</th>
                        <th>Folder No.</th>
                        <th>Account No.</th>
                        <th>RADAI/RCI Report No.</th>
                        <th>LDDAP-ADA / Check No.</th>
                        <th>Total Amount</th>
                        <th>Date Received</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{$voucher->month_}}</td>
                            <td>{{$voucher->doc_}}</td>
                            <td>{{$voucher->code_no}}</td>
                            <td>{{$voucher->folder}}</td>
                            <!-- Check if the value is 'N/A', if so display an empty string -->
                            <td>{{ $voucher->account_no !== 'N/A' ? $voucher->account_no : '' }}</td>
                            <td>{{ $voucher->radai !== 'N/A' ? $voucher->radai : '' }}</td>
                            <td>{{ $voucher->lddap !== 'N/A' ? $voucher->lddap : '' }}</td>
                            <td>{{ $voucher->total_amount !== 'N/A' ? $voucher->total_amount : '' }}</td>
                            <td>{{$voucher->date_received}}</td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete this?');" href="{{url('deleteVoucher', $voucher->id)}}">
                                    <!-- Delete SVG -->
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="openEditModal({
                                    id: {{$voucher->id}},
                                    month_: '{{$voucher->month_}}',
                                    doc_: '{{$voucher->doc_}}',
                                    code_no: '{{$voucher->code_no}}',
                                    folder: '{{$voucher->folder}}',
                                    account_no: '{{$voucher->account_no}}',
                                    radai: '{{$voucher->radai}}',
                                    lddap: '{{$voucher->lddap}}',
                                    total_amount: '{{$voucher->total_amount}}',
                                    date_received: '{{$voucher->date_received}}'
                                }, event)"> <!-- Pass the event object here -->
                                    <!-- Edit SVG -->
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

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
            <form id="dv-input" action="{{url('/submitVoucher')}}" method="Post">
                @csrf
                <input type="hidden" name="id" id="voucherId">

                <div class="input-dv-container">
                    <span class="close" onclick="closeInputPopup()">&times;</span>
                    <br>
                    <div class="form-row-input">
                        <div class="form-column-input">
                            <label>Month</label>
                            <select id="month_" name="month_" class="input-type-text">
                                <option selected>Choose Month</option>
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
                            <select id="doc_" name="doc_" class="input-type-text">
                                <option value="">Choose Document</option>
                                <option value="CD" id="CD" title="Check Disbursement">CD</option>
                                <option value="RCD" id="RCD" title="Report on Collections and Deposits">RCD</option>
                                <option value="LCA" id="LCA" title="Liquidation of Cash Advances">LCA</option>
                                <option value="GJ" id="GJ" title="General Journal">GJ</option>
                                <option value="RCI" id="RCI" title="Report on Checks Issued">RCI</option>
                                <option value="MCB" id="MCB" title="Magna Carta Benefits">MCB</option>
                                <option value="SPR" id="SPR" title="Salary, PERA, and RATA">SPR</option>
                            </select>
                            <div id="tooltip" class="tooltip"></div>

                            <label>Code</label>
                            <input type="text" id="code_no" name="code_no" class="input-type-text">

                            <label>Folder No.</label>
                            <input type="text" id="folder" name="folder" class="input-type-text">

                            <label>Account No.</label>
                            <input type="text" id="account_no" name="account_no" class="input-type-text">
                        </div>

                        <div class="form-column-input">
                            <label>RADAI/RCI Report No.</label>
                            <input type="text" id="radai" name="radai" class="input-type-text">

                            <label>LDDAP-ADA / Check No.</label>
                            <input type="text" id="lddap" name="lddap" class="input-type-text">

                            <label>Total Amount</label>
                            <input type="text" id="total_amount" name="total_amount" class="input-type-text">

                            <label>Date Received</label>
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
            <form id="editForm" method="POST" action="/saveVoucher/{{ $voucher->id }}">
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












let currentPage = 1;
const rowsPerPage = 10;  // Adjust the number of rows you want to display per page
const maxPaginationButtons = 3; // Maximum number of pagination buttons to display

let filteredData = [];  // To hold the filtered data
const initialData = @json($vouchers);  // Original data from server


function sortDataByDateAndCode(data) {
    return data.sort((a, b) => {
        // Compare year and month of date_received in descending order
        const dateA = new Date(a.date_received);
        const dateB = new Date(b.date_received);

        const yearA = dateA.getFullYear();
        const monthA = dateA.getMonth();
        const yearB = dateB.getFullYear();
        const monthB = dateB.getMonth();

        // Sort by date (year and month)
        if (yearA > yearB || (yearA === yearB && monthA > monthB)) return -1;
        if (yearA < yearB || (yearA === yearB && monthA < monthB)) return 1;

        // Sort by code_no in the specified format
        return compareCodeNo(a.code_no, b.code_no);
    }); 
}


function compareCodeNo(codeA, codeB) {
    // Split code into parts and handle the decimal values
    const partsA = codeA.split('-').map(part => part.includes('.') ? parseFloat(part) : parseInt(part));
    const partsB = codeB.split('-').map(part => part.includes('.') ? parseFloat(part) : parseInt(part));

    for (let i = 0; i < Math.max(partsA.length, partsB.length); i++) {
        const partA = partsA[i] !== undefined ? partsA[i] : 0;  // Default to 0 if undefined
        const partB = partsB[i] !== undefined ? partsB[i] : 0;  // Default to 0 if undefined

        if (partA > partB) return 1;  // Sort A after B
        if (partA < partB) return -1;  // Sort A before B
    }

    return 0;  // Codes are equal
}

// Function to filter data based on date range and document type, then sort by date_received and code_no
function filterDataByDateRange() {
    const startDate = new Date(document.getElementById('div_start_date').value);
    const endDate = new Date(document.getElementById('div_end_date').value);
    const selectedDoc = document.getElementById('docDropdown').value;

    // Case 1: User selected a document type but no valid date range
    if ((isNaN(startDate) || isNaN(endDate)) && selectedDoc) {
        filteredData = initialData.filter(voucher => {
            return voucher.doc_ === selectedDoc;  // Filter only by document type
        });
    }
    // Case 2: User selected a valid date range and possibly a document type
    else if (!isNaN(startDate) && !isNaN(endDate)) {
        filteredData = initialData.filter(voucher => {
            const dateReceived = new Date(voucher.date_received);
            const matchesDateRange = dateReceived >= startDate && dateReceived <= endDate;
            const matchesDocType = !selectedDoc || voucher.doc_ === selectedDoc;  // Check if doc matches or no doc type selected
            return matchesDateRange && matchesDocType;
        });
    }
    // Case 3: No filters applied, use the original data
    else {
        filteredData = initialData;
    }

    // Sort the filtered data by date_received (year and month only) and then by code_no
    filteredData = sortDataByDateAndCode(filteredData);

    // Update the table with the filtered data and generate pagination
    currentPage = 1;  // Reset to the first page
    updateTableRows();
    generatePaginationButtons();
}

// Ensure sorting when the user doesn't apply any filters (on initial load or reset)
function resetToSortedData() {
    filteredData = [...initialData];  // Reset to the initial data
    sortDataByDateAndCode();  // Always sort by date and then by code
}

// Initial load: Set the filteredData to the original data and sort by date and code
window.onload = function() {
    filteredData = [...initialData];  // Spread operator to clone the array

    // Automatically sort the data by date_received (year and month) and code_no
    filteredData = sortDataByDateAndCode(filteredData);
    
    updateTableRows();
    generatePaginationButtons();

    // Sidebar toggle functionality
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", function () {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    searchBtn.addEventListener("click", function () {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
};


function updateTableRows() {
    const tableBody = document.getElementById('table-body');
    tableBody.innerHTML = '';  // Clear current table rows

    const sortedData = sortDataByDateAndCode(filteredData);

    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedData = sortedData.slice(start, end);  // Paginate the sorted data

    // Generate rows for the current page
    paginatedData.forEach(voucher => {
        const row = document.createElement('tr');

        // Replace 'N/A' values with empty strings for all fields
        const month = voucher.month_ === 'N/A' ? '' : voucher.month_;
        const doc = voucher.doc_ === 'N/A' ? '' : voucher.doc_;
        const codeNo = voucher.code_no === 'N/A' ? '' : formatCodeNo(voucher.code_no);
        const folder = voucher.folder === 'N/A' ? '' : voucher.folder;
        const accountNo = voucher.account_no === 'N/A' ? '' : voucher.account_no;
        const radai = voucher.radai === 'N/A' ? '' : voucher.radai;
        const lddap = voucher.lddap === 'N/A' ? '' : voucher.lddap;
        const totalAmount = voucher.total_amount === 'N/A' ? '' : voucher.total_amount.toLocaleString(undefined, { minimumFractionDigits: 2 });
        const dateReceived = voucher.date_received === 'N/A' ? '' : voucher.date_received;

        row.innerHTML = `
            <td>${month}</td>
            <td>${doc}</td>
            <td>${codeNo}</td>
            <td>${folder}</td>
            <td>${accountNo}</td>
            <td>${radai}</td>
            <td>${lddap}</td>
            <td>${totalAmount}</td>
            <td>${dateReceived}</td>
            <td>
                <a onclick="return confirm('Are you sure you want to delete this?');" href="/deleteVoucher/${voucher.id}">
                    <!-- Delete SVG -->
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </td>
            <td>
                <a href="javascript:void(0);" onclick='editVoucher(${JSON.stringify(voucher)})'>
                    <!-- Edit SVG -->
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </td>
        `;
        tableBody.appendChild(row);
    });
}


// Function to format code_no properly
function formatCodeNo(code) {
    // Return the code as it is, but you can adjust the format if needed
    return code; // Modify this if you want a different display format
}


// Event listener for the Apply button
function dvsearchByDateRange() {
    event.preventDefault();  
    filterDataByDateRange();  
}



//Search function

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('#search-btn').on('click', function(event) {
        event.preventDefault();
        const searchValue = $('#search_voucher').val();
        performSearch(searchValue);
    });
});

function performSearch(searchValue) {
    $.ajax({
        url: '/searchVoucher',
        type: 'GET',
        data: {
            search_voucher: searchValue
        },
        success: function(response) {
            console.log(response);
            filteredData = response;  // Update filtered data with the search results
            $('#table-body').empty();
            response.forEach(function(voucher) {
                $('#table-body').append(
                    `<tr>
                        <td>${voucher.month_}</td>
                        <td>${voucher.doc_}</td>
                        <td>${voucher.code_no}</td>
                        <td>${voucher.folder}</td>
                        <td>${voucher.account_no !== null ? voucher.account_no : ''}</td>
                        <td>${voucher.radai !== null ? voucher.radai : ''}</td>
                        <td>${voucher.lddap !== null ? voucher.lddap : ''}</td>
                        <td>${voucher.total_amount !== null ? voucher.total_amount : ''}</td>
                        <td>${voucher.date_received}</td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this?');" href="/deleteVoucher/${voucher.id}">
                                <!-- Delete SVG -->
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick='editVoucher(${JSON.stringify(voucher)})'>
                                <!-- Edit SVG -->
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                    </tr>`
                );
            });

            // Regenerate pagination based on the search results
            currentPage = 1; // Reset to first page
            generatePaginationButtons();  // Update pagination buttons
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}




// Generalized function to check the selected document type and update input fields
function checkDocumentType(docDropdownId, account_noId, radaiId, lddapId, totalAmountId) {
    const docDropdown = document.getElementById(docDropdownId);
    const account_no = document.getElementById(account_noId);
    const radai = document.getElementById(radaiId);
    const lddap = document.getElementById(lddapId);
    const totalAmount = document.getElementById(totalAmountId);

    // Function to reset fields to their initial state (enabled and blank)
    function resetFields() {
        radai.readOnly = false;
        lddap.readOnly = false;
        totalAmount.readOnly = false;
        account_no.readOnly = false;

        radai.value = ""; 
        lddap.value = "";
        totalAmount.value = "";
        account_no.value = "";

        // Make all fields required by default
        radai.required = true;
        lddap.required = true;
        totalAmount.required = true;
        account_no.required = true;
    }

    // Function to update input fields based on the selected document type
    function updateInputFields(selectedValue) {
        resetFields(); // Ensure fields start in their initial state

        // Specific logic based on the selected document type
        if (selectedValue === 'CD' || selectedValue === 'RCI') {
            // Leave all fields enabled for 'CD' and 'RCI'
        } else {
            // Disable and set 'N/A' for 'radai', 'lddap', and 'total_amount' for other types
            radai.value = 'N/A';
            lddap.value = 'N/A';
            totalAmount.value = 'N/A';

            radai.readOnly = true;
            lddap.readOnly = true;
            totalAmount.readOnly = true;

            radai.required = false;
            lddap.required = false;
            totalAmount.required = false;
        }

        // Handle 'account_no' field for specific document types
        if (['GJ', 'MCB', 'SPR'].includes(selectedValue)) {
            account_no.readOnly = true;
            account_no.value = 'N/A'; // Set default value to 'N/A'
            account_no.required = false; // Ensure it's not required
        }
    }

    // Add event listener for changes in the dropdown selection
    docDropdown.addEventListener('change', function () {
        const selectedValue = docDropdown.value;
        updateInputFields(selectedValue);
    });

    // Ensure fields are enabled and empty on form load
    resetFields();
}

// Call the generalized function for the main form
checkDocumentType('doc_', 'account_no', 'radai', 'lddap', 'total_amount');

// Call the generalized function for the edit form
checkDocumentType('edit_doc_', 'edit_account_no', 'edit_radai', 'edit_lddap', 'edit_total_amount');




</script>
</html>