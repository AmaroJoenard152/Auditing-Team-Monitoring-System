<!DOCTYPE html>
<html>
<head>

    <!-- DV ---->
    <link rel="stylesheet" href="{{ asset('css/monitoring/ppe.css') }}">
    <script src="{{ asset('js/monitoring/ppe.js') }}"></script>
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
            <div class="button-wrapper">
                <button class="newDvButton" onclick="inputDvModal()">Add New Property</button>
                <button class="newDvButton" onclick="openViewEditHistory()">View Edit History</button>
            </div>
        </div>

        <!-- Title and Pop-up Button --->


        <!-- Date Range, Drop Down, Download Form --->

        <div class="date-range-wrapper">  
            <div class="date-row">
                <div class="date-flex-container">
                    <!-- Left Side: Sort and Search Form -->
                    <div class="left-form-container">
                        <form id="filterForm" class="date-form-wrapper">
                            <div class="daterange-group">
                                <label for="search_ppe" class="date-form-label">Search</label>
                                <input type="text" id="search_ppe" name="search_ppe" class="date-form-input">
                                <button type="button" id="search-btn" class="form-btn submit">Search</button>
                            </div>
                            <div class="daterange-group">
                                <label for="start_date" class="date-form-label">Start Date:</label>
                                <input type="date" id="start-date" name="start-date" class="date-form-input">
                            </div>
                            <div class="daterange-group">
                                <label for="end_date" class="date-form-label">End Date:</label>
                                <input type="date" id="end-date" name="end-date" class="date-form-input">
                            </div>
                        </form>
                    </div>


                    <!-- Right Side: Filter Form -->
                    <div class="right-form-container">
                        <form id="csvExportForm" method="GET" action="{{ route('export.csv') }}" class="date-form-wrapper">
                            <div class="date-container">
                                <div class="daterange-group">
                                    <label for="divisionDropdown" class="date-form-label">Division</label>
                                    <select id="divisionDropdown" name="division" class="date-form-input">
                                        <option selected disabled>Select Division</option>
                                        <option value="--All Divisions--">--All Divisions--</option>
                                        <option value="ACD">ACD</option>
                                        <option value="ARMRD">ARMRD</option>
                                        <option value="COA">COA</option>
                                        <option value="CRD">CRD</option>
                                        <option value="DPITC-ACD">DPITC-ACD</option>
                                        <option value="DPITC-MISD">DPITC-MISD</option>
                                        <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                                        <option value="DPITC-TTPD">DPITC TTPD</option>
                                        <option value="FAD-Accounting">FAD-Accounting</option>
                                        <option value="FAD-Budget">FAD-Budget</option>
                                        <option value="FAD-Cash">FAD-Cash</option>
                                        <option value="FAD-GSS">FAD-GSS</option>
                                        <option value="FAD-DO">FAD-DO</option>
                                        <option value="FAD-Personnel">FAD-Personnel</option>
                                        <option value="FAD-Property">FAD-Property</option>
                                        <option value="FAD-Property-Stock-Room">FAD-Prop-Stock-Room</option>
                                        <option value="FERD">FERD</option>
                                        <option value="IARRD">IARRD</option>
                                        <option value="IDD">IDD</option>
                                        <option value="LRD">LRD</option>
                                        <option value="MISD">MISD</option>
                                        <option value="MRRD">MRRD</option>
                                        <option value="OED">OED</option>
                                        <option value="OED-ARMSS">OED-ARMSS</option>
                                        <option value="OED-RD">OED-RD</option>
                                        <option value="PCMD">PCMD</option>
                                        <option value="SERD">SERD</option>
                                        <option value="TTPD">TTPD</option>
                                        <option value="Not_Available">Not_Available</option>
                                    </select>
                                </div>

                                <div class="daterange-group">
                                    <label for="ptDropdown" class="date-form-label">Property Type</label>
                                    <select id="ptDropdown" name="property_type" class="date-form-input">
                                        <option value="">Select Property Type</option>
                                        <option value="Building" title="Building">Bldng.</option>
                                        <option value="Communication Equipment" title="Communication Equipment">CE</option>
                                        <option value="Furniture and Fixture" title="Furniture and Fixture">FF</option>
                                        <option value="ICT" title="Information Communication Technology">ICT</option>
                                        <option value="Motor Vehicles" title="Motor Vehicles">MV</option>
                                        <option value="Office Equipment" title="Office Equipment">OE</option>
                                        <option value="Other Land Improvement" title="Other Land Improvement">OLI</option>
                                        <option value="Other Machineries" title="Other Machineries Equipment">OME</option>
                                        <option value="Other Structures" title="Other Structures">OS</option>
                                        <option value="Technical Science Equipment" title="Technical Science Equipment">TSE</option>
                                    </select>
                                </div>

                                <div class="daterange-group">
                                    <label for="conditionDropdown" class="date-form-label">Condition</label>
                                    <select id="conditionDropdown" name="condition" class="date-form-input">
                                        <option value="">Select Condition</option>
                                        <option value="">Select Condition</option>
                                        <option value="Disposed" title="Disposed">Disposed</option>
                                        <option value="Fair Condition" title="Fair Condition">Fair Condition</option>
                                        <option value="For Disposal" title="For Disposal">For Disposal</option>
                                        <option value="For Donation" title="For Donation">For Donation</option>
                                        <option value="Good Condition" title="Good Condition">Good Condition</option>
                                        <option value="Need Repair" title="Need Repair">Need Repair</option>
                                        <option value="No Longer Needed" title="No Longer Needed">No Longer Needed</option>
                                        <option value="Poor Condition" title="Poor Condition">Poor Condition</option>
                                        <option value="Unserviceable" title="Unserviceable">Unserviceable</option>
                                        <option value="Very Good" title="Very Good">Very Good</option>
                                        <option value="Not_Available" title="Not Available">Not_Available</option>
                                    </select>
                                </div>

                                <div class="daterange-group">
                                    <label for="statusDropdown" class="date-form-label">Status</label>
                                    <select id="statusDropdown" name="status" class="date-form-input">
                                        <option value="">Select Status</option>
                                        <option value="Checked">Checked</option>
                                        <option value="Found">Found</option>
                                        <option value="Missing">Missing</option>
                                        <option value="Unchecked">Unchecked</option>
                                    </select>

                                    <!-- Hidden inputs for dates -->
                                    <input type="hidden" id="export-start-date" name="start_date">
                                    <input type="hidden" id="export-end-date" name="end_date">

                                    <button type="button" onclick="filterByDateRange()" class="form-btn submit">Apply</button>
                                    <button type="button" onclick="prepareCSVExport()" class="form-btn submit">Download</button>
                                    <button type="button" id="dvReloadBtn" class="date-form-btn cancel" onclick="resetPPEFilters()">Reset</button>
                                </div>

                                <div id="tooltip" class="tooltip"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Range, Drop Down, Download Form --->


        <!-- DV TABLE --->

        <div class="div-table-container">
        <table class="table-content" id="ppe-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Division</th>
                    <th>User</th>
                    <th>Property Type</th>
                    <th>Article/Item</th>
                    <th>Description</th>
                    <!-- <th>Old PN Number</th> -->
                    <th>New PN Number</th>
                    <!-- <th>Unit of Meas.</th> -->
                    <th>Unit Value</th>
                    <th>Qty (Property Card)</th>
                    <th>Qty (Physical Count)</th>
                    <!-- <th>Previous Location/Whereabouts</th> -->
                    <!-- <th>Current Location/Whereabouts</th> -->
                    <th>Condition</th>
                    <th>Status</th>
                    <!-- <th>Remarks</th> -->
                    <!-- <th>Date Acquired</th> -->
                    <th>View</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>

            <tbody id="table-body">
                @foreach($ppes as $ppe)
                <tr>
                    <td>${ppe.division || ''}</td>
                    <td>${ppe.user || ''}</td>
                    <td>${ppe.property_type || ''}</td>
                    <td>${ppe.article_item || ''}</td>
                    <td>${ppe.description || ''}</td>
                    <!-- <td>${ppe.old_pn || ''}</td> -->
                    <td>${ppe.new_pn || ''}</td>
                    <!-- <td>${ppe.unit_meas || ''}</td> -->
                    <td>${ppe.unit_value || ''}</td>
                    <td>${ppe.quantity_property || ''}</td>
                    <td>${ppe.quantity_physical || ''}</td>
                    <!-- <td>${ppe.location || ''}</td> -->
                    <td>${ppe.condition || ''}</td>
                    <td>${ppe.status || ''}</td>

                    <td>
                        <a href="javascript:void(0)" onclick="showPpeDetails(${JSON.stringify(ppe).replace(/"/g, '&quot;')})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </a>
                    </td>

                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this?');" href="/deletePpe/${ppe.id}">
                            <!-- Delete SVG -->
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 7H20" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </td>


                    <td>
                        <a href="javascript:void(0);" onclick='editPpe(${JSON.stringify(ppe)})'>
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


    <!-- Footer --->
    <div class="footer-container">
        <div class="autoValues">
            <label for="totalPpe">Total PPE</label>
            <input type="text" id="totalPpe" name="totalPpe" class="autoValue" disabled>

            <label for="totalAmount">Total Amount</label>
            <input type="text" id="totalAmount" name="totalAmount" class="autoValue" disabled>
        </div>

        <div id="pagination-btns" class="pagination"></div>
    </div>


    </div>

    <!-- DV Wrapper --->


    <!-- Input Form Modal Pop-up --->
    <div class="overlay" id="inputOverlay"></div>
    <div id="inputDvModal" class="modal">
        <div class="modal-content">  
            <form id="dv-input" action="{{url('/submitPpe')}}" method="Post">
                @csrf
                <input type="hidden" name="id" id="voucherId">

                <div class="input-dv-container">
                    <span class="close" onclick="closeInputPopup()">&times;</span>
                    <div class="form-row-input">

                        <!-- First Column -->
                        <div class="form-column-input"> 
                            <label for="division">Division</label>
                            <select id="division" name="division" class="input-type-text" onchange="updateUserDropdown()">
                                <option selected disabled>Select Division</option>
                                <option value="ACD">ACD</option>
                                <option value="ARMRD">ARMRD</option>
                                <option value="COA">COA</option>
                                <option value="CRD">CRD</option>
                                <option value="DPITC-ACD">DPITC-ACD</option>
                                <option value="DPITC-MISD">DPITC-MISD</option>
                                <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                                <option value="DPITC-TTPD">DPITC TTPD</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-Budget">FAD-Budget</option>
                                <option value="FAD-Cash">FAD-Cash</option>
                                <option value="FAD-GSS">FAD-GSS</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Property">FAD-Property</option>
                                <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                                <option value="FERD">FERD</option>
                                <option value="IARRD">IARRD</option>
                                <option value="IDD">IDD</option>
                                <option value="LRD">LRD</option>
                                <option value="MISD">MISD</option>
                                <option value="MRRD">MRRD</option>
                                <option value="OED">OED</option>
                                <option value="OED-ARMSS">OED-ARMSS</option>
                                <option value="OED-RD">OED-RD</option>
                                <option value="PCMD">PCMD</option>
                                <option value="SERD">SERD</option>
                                <option value="TTPD">TTPD</option>
                                <option value="Not_Available">Not_Available</option>

                            </select>

                            <label for="user">User</label>
                            <select id="user" name="user" class="input-type-text" disabled>
                                <option selected disabled>Select User</option>
                            </select>

                            <label for="property_type">Property Type</label>
                            <select id="property_type" name="property_type" class="input-type-text">
                                <option selected disabled>Select Property Type</option>
                                <option value="Building" title="Building">Bldng.</option>
                                <option value="Communication Equipment" title="Communication Equipment">CE</option>
                                <option value="Furniture and Fixture" title="Furniture and Fixture">FF</option>
                                <option value="ICT" title="Information Communication Technology">ICT</option>
                                <option value="Motor Vehicles" title="Motor Vehicles">MV</option>
                                <option value="Office Equipment" title="Office Equipment">OE</option>
                                <option value="Other Land Improvement" title="Other Land Improvement">OLI</option>
                                <option value="Other Machineries" title="Other Machineries">OM</option>
                                <option value="Other Structures" title="Other Structures">OS</option>
                                <option value="Technical Science Equipment" title="Technical Science Equipment">TSE</option>
                            </select>


                            <label for="article_item">Article/Item</label>
                            <input type="text" id="article_item" name="article_item" class="input-type-text">
                        </div>

                        <!-- Second Column -->
                        <div class="form-column-input"> 
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="input-type-text">

                            <label for="old_pn">Old PN Number</label>
                            <input type="text" id="old_pn" name="old_pn" class="input-type-text">

                            <label for="new_pn">New PN Number</label>
                            <input type="text" id="new_pn" name="new_pn" class="input-type-text">

                            <label for="unit_meas">Unit of Meas.</label>
                            <input type="text" id="unit_meas" name="unit_meas" class="input-type-text">
                        </div>

                        <!-- Third Column -->
                        <div class="form-column-input"> 
                            <label for="unit_value">Unit Value</label>
                            <input type="text" id="unit_value" name="unit_value" class="input-type-text">

                            <label for="quantity_property">Quantity (Property Card)</label>
                            <input type="text" id="quantity_property" name="quantity_property" class="input-type-text">

                            <label for="quantity_physical">Quantity (Physical Count)</label>
                            <input type="text" id="quantity_physical" name="quantity_physical" class="input-type-text">

                            <label for="location">Location/Whereabouts</label>
                            <select id="location" name="location" class="input-type-text">
                            <option selected disabled>Select Location/Whereabouts</option>
                                <option value="ACD">ACD</option>
                                <option value="ARMRD">ARMRD</option>
                                <option value="AR-TANCO-HALL">AR-TANCO-HALL</option>
                                <option value="BPI-Grounds">BPI-Grounds</option>
                                <option value="BPK">BPK</option>
                                <option value="COA">COA</option>
                                <option value="CRD">CRD</option>
                                <option value="DPITC">DPITC</option>
                                <option value="DPITC-ACD">DPITC-ACD</option>
                                <option value="DPITC-MISD">DPITC-MISD</option>
                                <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                                <option value="DPITC-TTPD">DPITC-TTPD</option>
                                <option value="E.O-TAN-HALL">E.O-TAN-HALL</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-Budget">FAD-Budget</option>
                                <option value="FAD-Cash">FAD-Cash</option>
                                <option value="FAD-GSS">FAD-GSS</option>
                                <option value="FAD-GSS-Canteen">FAD-GSS-Canteen</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Property">FAD-Property</option>
                                <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                                <option value="FERD">FERD</option>
                                <option value="GSS-Building">GSS-Building</option>
                                <option value="Grounds-Motorpool">Grounds-Motorpool</option>
                                <option value="Grounds-Staff Housing">Grounds-Staff Housing</option>
                                <option value="Grounds-Main">Grounds-Main</option>
                                <option value="Grounds-Near-Executive-Housing">Grounds-Near-Executive-Housing</option>
                                <option value="IARRD">IARRD</option>
                                <option value="IDD">IDD</option>
                                <option value="LRD">LRD</option>
                                <option value="MAIN-GATE">MAIN-GATE</option>
                                <option value="MISD">MISD</option>
                                <option value="MRRD">MRRD</option>
                                <option value="Near-Executive-House#3">Near-Executive-House#3</option>
                                <option value="Near-Main-Gate">Near-Main-Gate</option>
                                <option value="OED">OED</option>
                                <option value="OED-ARMSS">OED-ARMSS</option>
                                <option value="OED-RD">OED-RD</option>
                                <option value="PCAARRD-Main">PCAARRD-Main</option>
                                <option value="PCMD">PCMD</option>
                                <option value="Regional-NARC">Regional-NARC</option>
                                <option value="SERD">SERD</option>
                                <option value="Service-Area">Service-Area</option>
                                <option value="Staff-Housing">Staff-Housing</option>
                                <option value="TTPD">TTPD</option>
                                <option value="Not_Available">Not_Available</option>
                            </select>

                        </div>

                        <!-- Fourth Column -->
                        <div class="form-column-input"> 
                            <label for="condition">Condition</label>
                                <select id="condition" name="condition" class="input-type-text">
                                <option selected>Select Condition</option>
                                <option value="Disposed" title="Disposed">Disposed</option>
                                <option value="Fair Condition" title="Fair Condition">Fair Condition</option>
                                <option value="For Disposal" title="For Disposal">For Disposal</option>
                                <option value="For Donation" title="For Donation">For Donation</option>
                                <option value="Good Condition" title="Good Condition">Good Condition</option>
                                <option value="Need Repair" title="Need Repair">Need Repair</option>
                                <option value="No Longer Needed" title="No Longer Needed">No Longer Needed</option>
                                <option value="Poor Condition" title="Poor Condition">Poor Condition</option>
                                <option value="Unserviceable" title="Unserviceable">Unserviceable</option>
                                <option value="Very Good" title="Very Good">Very Good</option>
                                <option value="Not_Available" title="Not Available">Not_Available</option>
                                </select>


                            
                                <label for="status">Status</label>
                                <select id="status" name="status" class="input-type-text">
                                    <option selected>Select Status</option>
                                    <option value="Checked">Checked</option>
                                    <option value="Found">Found</option>
                                    <option value="Missing">Missing</option>
                                    <option value="Unchecked">Unchecked</option>
                                </select>

                            <label for="remarks">Remarks</label>
                            <input type="text" id="remarks" name="remarks" class="input-type-text">

                            <label for="date_acq">Date Acquired</label>
                            <input type="date" id="date_acq" name="date_acq" class="input-type-date">

                            <button type="button" id="dvReloadBtn" class="date-form-btn-cancel" onclick="resetPPEInput()">Reset</button>
                            <input type="submit" value="Submit" class="dv-submit-button">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Input Form Modal Pop-up --->


    <!-- View Modal -->
    <div class="overlay" id="ppeModal"></div>
        <div id="viewDvModal" class="modal">
        <div class="modal-content">  
            <div class="input-dv-container">
                <span class="close" onclick="closeViewPopup()">&times;</span>
                <div class="form-row-input">
                    <!-- First Column -->
                    <div class="form-column-input"> 
                        <label for="division">Division</label>
                        <select id="view_division" name="division" class="input-type-text" disabled>
                            <option selected disabled>Select Division</option>
                            <option value="ACD">ACD</option>
                            <option value="ARMRD">ARMRD</option>
                            <option value="COA">COA</option>
                            <option value="CRD">CRD</option>
                            <option value="DPITC-ACD">DPITC-ACD</option>
                            <option value="DPITC-MISD">DPITC-MISD</option>
                            <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                            <option value="DPITC-TTPD">DPITC TTPD</option>
                            <option value="FAD-Accounting">FAD-Accounting</option>
                            <option value="FAD-Budget">FAD-Budget</option>
                            <option value="FAD-Cash">FAD-Cash</option>
                            <option value="FAD-GSS">FAD-GSS</option>
                            <option value="FAD-DO">FAD-DO</option>
                            <option value="FAD-Personnel">FAD-Personnel</option>
                            <option value="FAD-Property">FAD-Property</option>
                            <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                            <option value="FERD">FERD</option>
                            <option value="IARRD">IARRD</option>
                            <option value="IDD">IDD</option>
                            <option value="LRD">LRD</option>
                            <option value="MISD">MISD</option>
                            <option value="MRRD">MRRD</option>
                            <option value="OED">OED</option>
                            <option value="OED-ARMSS">OED-ARMSS</option>
                            <option value="OED-RD">OED-RD</option>
                            <option value="PCMD">PCMD</option>
                            <option value="SERD">SERD</option>
                            <option value="TTPD">TTPD</option>
                            <option value="Not_Available">Not_Available</option>

                        </select>


                        <label for="user">User</label>
                        <input type="text" id="view_user" name="user" class="input-type-text" disabled>

                        <label for="property_type">Property Type</label>
                        <select id="view_property_type" name="property_type" class="input-type-text" disabled>
                            <option selected disabled>Select Property Type</option>
                            <option value="Building" title="Building">Bldng.</option>
                            <option value="Communication Equipment" title="Communication Equipment">CE</option>
                            <option value="Furniture and Fixture" title="Furniture and Fixture">FF</option>
                            <option value="ICT" title="Information Communication Technology">ICT</option>
                            <option value="Motor Vehicles" title="Motor Vehicles">MV</option>
                            <option value="Office Equipment" title="Office Equipment">OE</option>
                            <option value="Other Land Improvement" title="Other Land Improvement">OLI</option>
                            <option value="Other Machineries" title="Other Machineries">OM</option>
                            <option value="Other Structures" title="Other Structures">OS</option>
                            <option value="Technical Science Equipment" title="Technical Science Equipment">TSE</option>
                        </select>

                        <label for="article_item">Article/Item</label>
                        <input type="text" id="view_article_item" name="article_item" class="input-type-text" disabled>

                    </div>

                    <!-- Second Column -->
                    <div class="form-column-input"> 
                        <label for="description">Description</label>
                        <input type="text" id="view_description" name="description" class="input-type-text" disabled>

                        <label for="old_pn">Old PN Number</label>
                        <input type="text" id="view_old_pn" name="old_pn" class="input-type-text" disabled>

                        <label for="new_pn">New PN Number</label>
                        <input type="text" id="view_new_pn" name="new_pn" class="input-type-text" disabled>

                        <label for="unit_meas">Unit of Meas.</label>
                        <input type="text" id="view_unit_meas" name="unit_meas" class="input-type-text" disabled>
                    </div>

                    <!-- Third Column -->
                    <div class="form-column-input"> 
                        <label for="unit_value">Unit Value</label>
                        <input type="text" id="view_unit_value" name="unit_value" class="input-type-text" disabled onblur="updateUnitValueDisplay(this)"> 

                        <label for="quantity_property">Quantity (Property Card)</label>
                        <input type="text" id="view_quantity_property" name="quantity_property" class="input-type-text" disabled>

                        <label for="quantity_physical">Quantity (Physical Count)</label>
                        <input type="text" id="view_quantity_physical" name="quantity_physical" class="input-type-text" disabled>

                        <label for="location">Location/Whereabouts</label>
                        <select id="view_location" name="location" class="input-type-text" disabled>
                            <option selected disabled>Select Location/Whereabouts</option>
                            <option value="ACD">ACD</option>
                            <option value="ARMRD">ARMRD</option>
                            <option value="AR-TANCO-HALL">AR-TANCO-HALL</option>
                            <option value="BPI-Grounds">BPI-Grounds</option>
                            <option value="BPK">BPK</option>
                            <option value="COA">COA</option>
                            <option value="CRD">CRD</option>
                            <option value="DPITC">DPITC</option>
                            <option value="DPITC-ACD">DPITC-ACD</option>
                            <option value="DPITC-MISD">DPITC-MISD</option>
                            <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                            <option value="DPITC-TTPD">DPITC-TTPD</option>
                            <option value="E.O-TAN-HALL">E.O-TAN-HALL</option>
                            <option value="FAD-Accounting">FAD-Accounting</option>
                            <option value="FAD-Budget">FAD-Budget</option>
                            <option value="FAD-Cash">FAD-Cash</option>
                            <option value="FAD-GSS">FAD-GSS</option>
                            <option value="FAD-GSS-Canteen">FAD-GSS-Canteen</option>
                            <option value="FAD-DO">FAD-DO</option>
                            <option value="FAD-Personnel">FAD-Personnel</option>
                            <option value="FAD-Property">FAD-Property</option>
                            <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                            <option value="FERD">FERD</option>
                            <option value="GSS-Building">GSS-Building</option>
                            <option value="Grounds-Motorpool">Grounds-Motorpool</option>
                            <option value="Grounds-Staff Housing">Grounds-Staff Housing</option>
                            <option value="Grounds-Main">Grounds-Main</option>
                            <option value="Grounds-Near-Executive-Housing">Grounds-Near-Executive-Housing</option>
                            <option value="IARRD">IARRD</option>
                            <option value="IDD">IDD</option>
                            <option value="LRD">LRD</option>
                            <option value="MAIN-GATE">MAIN-GATE</option>
                            <option value="MISD">MISD</option>
                            <option value="MRRD">MRRD</option>
                            <option value="Near-Executive-House#3">Near-Executive-House#3</option>
                            <option value="Near-Main-Gate">Near-Main-Gate</option>
                            <option value="OED">OED</option>
                            <option value="OED-ARMSS">OED-ARMSS</option>
                            <option value="OED-RD">OED-RD</option>
                            <option value="PCAARRD-Main">PCAARRD-Main</option>
                            <option value="PCMD">PCMD</option>
                            <option value="Regional-NARC">Regional-NARC</option>
                            <option value="SERD">SERD</option>
                            <option value="Service-Area">Service-Area</option>
                            <option value="Staff-Housing">Staff-Housing</option>
                            <option value="TTPD">TTPD</option>
                            <option value="Not_Available">Not_Available</option>
                        </select>
                    </div>

                    <!-- Fourth Column -->
                    <div class="form-column-input"> 
                        <label for="condition">Condition</label>
                        <select id="view_condition" name="condition" class="input-type-text" disabled>
                            <option selected>Select Condition</option>
                            <option value="Disposed" title="Disposed">Disposed</option>
                            <option value="Fair Condition" title="Fair Condition">Fair Condition</option>
                            <option value="For Disposal" title="For Disposal">For Disposal</option>
                            <option value="For Donation" title="For Donation">For Donation</option>
                            <option value="Good Condition" title="Good Condition">Good Condition</option>
                            <option value="Need Repair" title="Need Repair">Need Repair</option>
                            <option value="No Longer Needed" title="No Longer Needed">No Longer Needed</option>
                            <option value="Poor Condition" title="Poor Condition">Poor Condition</option>
                            <option value="Unserviceable" title="Unserviceable">Unserviceable</option>
                            <option value="Very Good" title="Very Good">Very Good</option>
                            <option value="Not_Available" title="Not Available">Not_Available</option>
                        </select>


                        <label for="status">Status</label>
                            <select id="view_status" name="status" class="input-type-text" disabled>
                                <option selected>Select Status</option>
                                <option value="Found">Found</option>
                                <option value="Missing">Missing</option>
                                <option value="Checked">Checked</option>
                                <option value="Unchecked">Unchecked</option>
                            </select>

                        <label for="remarks">Remarks</label>
                        <input type="text" id="view_remarks" name="remarks" class="input-type-text" disabled>

                        <label for="date_acq">Date Acquired</label>
                        <input type="date" id="view_date_acq" name="date_acq" class="input-type-date" disabled>
                    </div>
                </div>


                <div class="form-column-input-flex">
                    <div class="form-group-item">
                        <label for="created_at">Date Created</label>
                        <span id="view_created_at" class="input-type-text" disabled></span>
                    </div>
                    <div class="form-group-item">
                        <label for="updated_at">Last Updated</label>
                        <span id="view_updated_at" class="input-type-text" disabled></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Modal -->

    

    <!-- Edit Modal -->
    <div class="overlay" id="editPpeOverlay"></div>
    <div id="editPpeModal" class="modal">
        <div class="modal-content">
            <form id="editForm" method="POST" action="/savePpe/{{ $ppe->id }}">
                @csrf
                <input type="hidden" name="id" id="editPpeId">

                <div class="editForm-input-container">
                    <span class="close" onclick="closeEditPopup()">&times;</span>
                    <div class="editForm-row-input">

                        <!-- First Column -->
                        <div class="editForm-column-input">
                            <label for="division">Division</label>
                            <select id="edit_division" name="division" class="input-type-text" onchange="populateUserDropdownForEdit(this.value)">
                                <option selected disabled>Select Division</option>
                                <option value="ACD">ACD</option>
                                <option value="ARMRD">ARMRD</option>
                                <option value="COA">COA</option>
                                <option value="CRD">CRD</option>
                                <option value="DPITC-ACD">DPITC-ACD</option>
                                <option value="DPITC-MISD">DPITC-MISD</option>
                                <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                                <option value="DPITC-TTPD">DPITC TTPD</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-Budget">FAD-Budget</option>
                                <option value="FAD-Cash">FAD-Cash</option>
                                <option value="FAD-GSS">FAD-GSS</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Property">FAD-Property</option>
                                <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                                <option value="FERD">FERD</option>
                                <option value="IARRD">IARRD</option>
                                <option value="IDD">IDD</option>
                                <option value="LRD">LRD</option>
                                <option value="MISD">MISD</option>
                                <option value="MRRD">MRRD</option>
                                <option value="OED">OED</option>
                                <option value="OED-ARMSS">OED-ARMSS</option>
                                <option value="OED-RD">OED-RD</option>
                                <option value="PCMD">PCMD</option>
                                <option value="SERD">SERD</option>
                                <option value="TTPD">TTPD</option>
                                <option value="Not_Available">Not_Available</option>

                            </select>


                            <label for="user">User</label>
                            <select id="edit_user" name="user" class="input-type-text">
                                <option selected disabled>Select User</option>
                            </select>

                            <label for="property_type">Property Type</label>
                            <select id="edit_property_type" name="property_type" class="input-type-text">
                                <option selected disabled>Select Property Type</option>
                                <option value="Building" title="Building">Bldng.</option>
                                <option value="Communication Equipment" title="Communication Equipment">CE</option>
                                <option value="Furniture and Fixture" title="Furniture and Fixture">FF</option>
                                <option value="ICT" title="Information Communication Technology">ICT</option>
                                <option value="Motor Vehicles" title="Motor Vehicles">MV</option>
                                <option value="Office Equipment" title="Office Equipment">OE</option>
                                <option value="Other Land Improvement" title="Other Land Improvement">OLI</option>
                                <option value="Other Machineries" title="Other Machineries">OM</option>
                                <option value="Other Structures" title="Other Structures">OS</option>
                                <option value="Technical Science Equipment" title="Technical Science Equipment">TSE</option>
                            </select>
                                                   
                            <label for="article_item">Article/Item</label>
                            <input type="text" id="edit_article_item" name="article_item" class="input-type-text">
                        </div>

                        <!-- Second Column -->
                        <div class="editForm-column-input">
                            <label for="description">Description</label>
                            <input type="text" id="edit_description" name="description" class="input-type-text">

                            <label for="old_pn">Old PN Number</label>
                            <input type="text" id="edit_old_pn" name="old_pn" class="input-type-text">

                            <label for="new_pn">New PN Number</label>
                            <input type="text" id="edit_new_pn" name="new_pn" class="input-type-text">

                            <label for="unit_meas">Unit of Meas.</label>
                            <input type="text" id="edit_unit_meas" name="unit_meas" class="input-type-text">
                        </div>

                        <!-- Third Column -->
                        <div class="editForm-column-input">
                            <label for="unit_value">Unit Value</label>
                            <input type="text" id="edit_unit_value" name="unit_value" class="input-type-text">

                            <label for="quantity_property">Quantity (Property Card)</label>
                            <input type="text" id="edit_quantity_property" name="quantity_property" class="input-type-text">

                            <label for="quantity_physical">Quantity (Physical Count)</label>
                            <input type="text" id="edit_quantity_physical" name="quantity_physical" class="input-type-text">

                            <label for="location">Location/Whereabouts</label>
                            
                            <select id="edit_location" name="location" class="input-type-text">
                                <option selected disabled>Select Location/Whereabouts</option>
                                <option value="ACD">ACD</option>
                                <option value="ARMRD">ARMRD</option>
                                <option value="AR-TANCO-HALL">AR-TANCO-HALL</option>
                                <option value="BPI-Grounds">BPI-Grounds</option>
                                <option value="BPK">BPK</option>
                                <option value="COA">COA</option>
                                <option value="CRD">CRD</option>
                                <option value="DPITC">DPITC</option>
                                <option value="DPITC-ACD">DPITC-ACD</option>
                                <option value="DPITC-MISD">DPITC-MISD</option>
                                <option value="DPITC-OED-ARMSS">DPITC-OED-ARMSS</option>
                                <option value="DPITC-TTPD">DPITC-TTPD</option>
                                <option value="E.O-TAN-HALL">E.O-TAN-HALL</option>
                                <option value="FAD-Accounting">FAD-Accounting</option>
                                <option value="FAD-Budget">FAD-Budget</option>
                                <option value="FAD-Cash">FAD-Cash</option>
                                <option value="FAD-GSS">FAD-GSS</option>
                                <option value="FAD-GSS-Canteen">FAD-GSS-Canteen</option>
                                <option value="FAD-DO">FAD-DO</option>
                                <option value="FAD-Personnel">FAD-Personnel</option>
                                <option value="FAD-Property">FAD-Property</option>
                                <option value="FAD-Property-Stock-Room">FAD-Property-Stock-Room</option>
                                <option value="FERD">FERD</option>
                                <option value="GSS-Building">GSS-Building</option>
                                <option value="Grounds-Motorpool">Grounds-Motorpool</option>
                                <option value="Grounds-Staff Housing">Grounds-Staff Housing</option>
                                <option value="Grounds-Main">Grounds-Main</option>
                                <option value="Grounds-Near-Executive-Housing">Grounds-Near-Executive-Housing</option>
                                <option value="IARRD">IARRD</option>
                                <option value="IDD">IDD</option>
                                <option value="LRD">LRD</option>
                                <option value="MAIN-GATE">MAIN-GATE</option>
                                <option value="Near-Executive-House#3">Near-Executive-House#3</option>
                                <option value="Near-Main-Gate">Near-Main-Gate</option>
                                <option value="PCAARRD-Main">PCAARRD-Main</option>
                                <option value="Regional-NARC">Regional-NARC</option>
                                <option value="Service-Area">Service-Area</option>
                                <option value="Staff-Housing">Staff-Housing</option>
                                <option value="Not_Available">Not_Available</option>
                            </select>

                        </div>

                        <!-- Fourth Column -->
                        <div class="editForm-column-input">

                            <label for="condition">Condition</label>
                            <select id="edit_condition" name="condition" class="input-type-text">
                                <option selected>Select Condition</option>
                                <option value="Disposed" title="Disposed">Disposed</option>
                                <option value="Fair Condition" title="Fair Condition">Fair Condition</option>
                                <option value="For Disposal" title="For Disposal">For Disposal</option>
                                <option value="For Donation" title="For Donation">For Donation</option>
                                <option value="Good Condition" title="Good Condition">Good Condition</option>
                                <option value="Need Repair" title="Need Repair">Need Repair</option>
                                <option value="No Longer Needed" title="No Longer Needed">No Longer Needed</option>
                                <option value="Poor Condition" title="Poor Condition">Poor Condition</option>
                                <option value="Unserviceable" title="Unserviceable">Unserviceable</option>
                                <option value="Very Good" title="Very Good">Very Good</option>
                                <option value="Not_Available" title="Not Available">Not_Available</option>
                            </select>


                            <label for="status">Status</label>
                            <select id="edit_status" name="status" class="input-type-text">
                                <option selected>Select Status</option>
                                <option value="Found">Found</option>
                                <option value="Missing">Missing</option>
                                <option value="Checked">Checked</option>
                                <option value="Unchecked">Unchecked</option>
                            </select>

                            <label for="remarks">Remarks</label>
                            <input type="text" id="edit_remarks" name="remarks" class="input-type-text">

                            <label for="date_acq">Date Acquired</label>
                            <input type="date" id="edit_date_acq" name="date_acq" class="input-type-date">

                            <input type="submit" value="Save" class="dv-submit-button">
                        </div>



                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Modal -->


    <!-- View Edit History -->
    <div class="overlay" id="editHistoryModal"></div>
    <div id="viewEditHistory" class="modal">
        <div class="modal-content">
            <form id="dv-input">
                <div class="input-dv-container">
                    <h2 class="h1-date">PPE Edit History</h2>
                    <span class="close" onclick="closeViewEditHistory()">&times;</span>
                    <div class="form-row-input">
                        <div class="div-editTable-container">
                            <div class="viewEditHistory-range-wrapper">
                                <div class="date-row">
                                    <div class="date-flex-container">
                                        <!-- Left Side: Search Form -->
                                        <div class="viewEditHistory-form-container">
                                            <form id="filterForm" class="date-form-wrapper">
                                                <div class="editHistoryDaterange-group">
                                                    <label for="search_ppe" class="date-form-label">Search</label>
                                                    <input type="text" id="search_ppe" name="search_ppe" class="date-form-input">
                                                    <button type="button" id="search-btn" class="form-btn submit">Search</button>
                                                </div>
                                            </form>
                                        </div>
        
                                        <!-- Right Side: Date Range & Buttons -->
                                        <div class="viewEditHistory-controls">
                                            <div class="daterange-group">
                                                <label for="start_date" class="date-form-label">Start Date:</label>
                                                <input type="date" id="start-date" name="start-date" class="date-form-input">
                                            </div>
                                            <div class="daterange-group">
                                                <label for="end_date" class="date-form-label">End Date:</label>
                                                <input type="date" id="end-date" name="end-date" class="date-form-input">
                                            </div>
                                            <div class="editHistoryDaterangeButton">
                                                <button type="button" onclick="filterByDateRange()" class="form-btn submit">Apply</button>
                                                <button onclick="dvDownloadCSV()" class="form-btn submit">Download</button>
                                                <button type="button" id="dvReloadBtn" class="date-form-btn cancel" onclick="resetFilters()">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <table class="table-content" id="ppe-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Division</th>
                                        <th>User</th>
                                        <th>New PN</th> -->
                                        <th>Field Name</th>
                                        <th>Previous Value</th>
                                        <th>Updated Value</th>
                                        <th>Date Edited</th>
                                    </tr>
                                </thead>
                                <tbody id="historyTableBody">
                                @if(isset($editHistory))
                                    @foreach($editHistory as $index => $history)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $history->field_name ?? 'N/A' }}</td>
                                        <td>{{ $history->previous_value ?? 'N/A' }}</td>
                                        <td>{{ $history->updated_value ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($history->edited_at)->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- View Edit History -->



     <!-- RPCPPE Summary Table-->
    <div class="rpcppe-summary-table">
        <table class="table-content" id="rpcppe-table">
            <h1 class="h1-date">RPCPPE Summary</h1>
            <thead>
                <tr>
                    <th>Property Type</th>
                    <th>Checked</th>
                    <th>Found</th>
                    <th>Missing</th>
                    <th>Total Amount</th>
                </tr>
            </thead>

            <tbody id="rpcppe-table-body">
                <!-- Dynamic rows will be inserted here by JavaScript -->
            </tbody>
        </table>
    </div>





</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

const rowsPerPage = 20; // Number of rows to display per page
let currentPage = 1;
const maxPaginationButtons = 3; // Maximum pagination buttons to display
let allData = @json($ppes); // Original data from server
let filteredData = [...allData]; // Default to all data initially


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




// Open the View Edit History modal
var editHistoryModal = document.getElementById("editHistoryModal");
var viewEditHistory = document.getElementById("viewEditHistory");

function openViewEditHistory() {
    editHistoryModal.style.display = "block";
    viewEditHistory.style.display = "block";
}

// Close the View Edit History modal
function closeViewEditHistory() {
    editHistoryModal.style.display = "none";
    viewEditHistory.style.display = "none";
}

// Close modal if clicked outside
window.onclick = function(event) {
    if (event.target == editHistoryModal) {
        closeViewEditHistory();
    }
}

function updateEditHistoryTableRows() {
    const tableBody = document.getElementById('historyTableBody');
    tableBody.innerHTML = ''; // Clear existing table rows

    // Sort the filtered data before pagination
    const sortedData = sortDataTable(filteredData);

    // Calculate pagination range
    const startIndex = (currentPage - 1) * rowsPerPage;
    const endIndex = startIndex + rowsPerPage;
    const paginatedData = sortedData.slice(startIndex, endIndex);

    // Populate the table with paginated data
    paginatedData.forEach((history, index) => {
        const rowNumber = startIndex + index + 1; // Dynamic row numbering
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${rowNumber}</td>
            <td>${history.field_name || 'N/A'}</td>
            <td>${history.previous_value ?? 'N/A'}</td>
            <td>${history.updated_value ?? 'N/A'}</td>
            <td>${formatDateTime(history.edited_at)}</td>
        `;

        tableBody.appendChild(row);
    });
}

// Helper function to format date/time in Philippine Time (PHT)
function formatDateTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleString('en-US', { timeZone: 'Asia/Manila' });
}




// Edit Modal Handling
var editPpeModal = document.getElementById("editPpeModal");
var editPpeOverlay = document.getElementById("editPpeOverlay");

function editPpe(ppe) {
    document.getElementById('edit_division').value = ppe.division || 'Select Division';
    populateUserDropdownForEdit(ppe.division, ppe.user);  // Dynamically populate and select the user

    document.getElementById('edit_property_type').value = ppe.property_type || 'Select Property Type';
    document.getElementById('edit_article_item').value = ppe.article_item || '';
    document.getElementById('edit_description').value = ppe.description || '';
    document.getElementById('edit_old_pn').value = ppe.old_pn || '';
    document.getElementById('edit_new_pn').value = ppe.new_pn || '';
    document.getElementById('edit_unit_meas').value = ppe.unit_meas || '';
    document.getElementById('edit_unit_value').value = ppe.unit_value || '';
    document.getElementById('edit_quantity_property').value = ppe.quantity_property || '';
    document.getElementById('edit_quantity_physical').value = ppe.quantity_physical || '';
    document.getElementById('edit_location').value = ppe.location || 'Select Location/Whereabouts';
    document.getElementById('edit_condition').value = ppe.condition || 'Select Condition';
    document.getElementById('edit_status').value = ppe.status || 'Select Status';
    document.getElementById('edit_remarks').value = ppe.remarks || '';
    document.getElementById('edit_date_acq').value = ppe.date_acq || '';

    document.getElementById('editForm').action = `/savePpe/${ppe.id}`;

    editPpeModal.style.display = "block";
    editPpeOverlay.style.display = "block";
}

function closeEditPopup() {
    editPpeModal.style.display = "none";
    editPpeOverlay.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == editPpeOverlay) {
        closeEditPopup();
    }
}




// Function for PPE Table
function updateUserDropdown(event) {
    // Get the ID of the triggered division dropdown
    const divisionDropdown = event.target;
    const selectedDivision = divisionDropdown.value;

    // Determine the corresponding user dropdown
    let userDropdown;
    if (divisionDropdown.id === 'division') {
        userDropdown = document.getElementById('user');
    } else if (divisionDropdown.id === 'divisionDropdown') {
        userDropdown = document.getElementById('userDropdown');
    }

    if (!userDropdown) return;

    // Clear previous options
    userDropdown.innerHTML = '<option selected disabled>Select User</option>';

    // Enable the dropdown
    userDropdown.disabled = false;

    // Define division-to-user mapping
    const usersByDivision = {

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

    // Populate dropdown with users based on selected division
    if (usersByDivision[selectedDivision]) {
        usersByDivision[selectedDivision].forEach(user => {
            const option = document.createElement('option');
            option.value = user;
            option.textContent = user;
            userDropdown.appendChild(option);
        });
    } else {
        // Disable dropdown if no valid division is selected
        userDropdown.disabled = true;
    }
}

// Attach event listeners to both division dropdowns
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('division').addEventListener('change', updateUserDropdown);
    document.getElementById('divisionDropdown').addEventListener('change', updateUserDropdown);
});

function normalizeString(str) {
    return str
        .toString()
        .toLowerCase()
        .replace(/[^a-z0-9\s]/g, '') // Remove special characters
        .trim();
}

function sortDataTable(data) {
    return data.sort((a, b) => {
        const fieldsToSort = ['division', 'user', 'property_type', 'article_item'];

        for (const field of fieldsToSort) {
            const valA = normalizeString(a[field] || '');
            const valB = normalizeString(b[field] || '');

            if (valA > valB) return 1;
            if (valA < valB) return -1;
        }

        // Maintain original order if all fields are equal
        return 0;
    });
}

function formatNumber(value) {
    // Format number with commas and ensure two decimal places
    return new Intl.NumberFormat('en-US', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    }).format(value);
}

function updateTableRows() {
    const tableBody = document.getElementById('table-body');
    tableBody.innerHTML = ''; // Clear current table rows

    const sortedData = sortDataTable(filteredData);

    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedData = sortedData.slice(start, end);

    let totalPpe = 0; // Total PPE will count the number of rows
    let totalAmount = 0; // Total Amount will sum the unit values

    // Iterate through all data, not just the paginated portion
    filteredData.forEach((ppe) => {
        totalPpe += 1; // Count each row
        totalAmount += parseFloat(ppe.unit_value || 0); // Sum the unit values
    });

    // Display the paginated data in the table
    paginatedData.forEach((ppe, index) => {
        const rowNumber = start + index + 1; // Generates the row number dynamically
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${rowNumber}</td>
            <td>${ppe.division || ''}</td>
            <td>${ppe.user || ''}</td>
            <td>${ppe.property_type || ''}</td>
            <td>${ppe.article_item || ''}</td>
            <td>${ppe.description || ''}</td>          
            <td>${ppe.new_pn || ''}</td>
            <td>${ppe.unit_value ? formatNumber(ppe.unit_value) : ''}</td> <!-- Apply formatting -->
            <td>${ppe.quantity_property || ''}</td>
            <td>${ppe.quantity_physical || ''}</td>
            <td>${ppe.condition || ''}</td>
            <td>${ppe.status || ''}</td>
            <td>
                <a href="javascript:void(0)" onclick="showPpeDetails(${JSON.stringify(ppe).replace(/"/g, '&quot;')})">
                    <!-- View SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                    </svg>
                </a>
            </td>
            <td>
                <a onclick="return confirm('Are you sure you want to delete this?');" href="/deletePpe/${ppe.id}">
                    <!-- Delete SVG -->
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 7H20" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </td>
            <td>
                <a href="javascript:void(0);" onclick='editPpe(${JSON.stringify(ppe)})'>
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

    // Update the footer with the totals
    document.getElementById('totalPpe').value = totalPpe; // Total PPE: count of all rows
    document.getElementById('totalAmount').value = formatNumber(totalAmount); // Total Amount: sum of all unit values
}

// Assuming the input fields are dynamically updated

function updateUnitValueDisplay(inputElement) {
    const formattedValue = formatNumber(inputElement.value);
    inputElement.value = formattedValue;
}

function showPpeDetails(ppe) {
    // Populate the modal fields with PPE data
    document.getElementById('view_division').value = ppe.division || 'Select Division';
    document.getElementById('view_user').value = ppe.user || '';
    document.getElementById('view_property_type').value = ppe.property_type || 'Select Property Type';
    document.getElementById('view_article_item').value = ppe.article_item || 'Select Article/Item';
    document.getElementById('view_description').value = ppe.description || '';
    document.getElementById('view_old_pn').value = ppe.old_pn || '';
    document.getElementById('view_new_pn').value = ppe.new_pn || '';
    document.getElementById('view_unit_meas').value = ppe.unit_meas || '';
    document.getElementById('view_unit_value').value = ppe.unit_value ? formatNumber(ppe.unit_value) : '';
    document.getElementById('view_quantity_property').value = ppe.quantity_property || '';
    document.getElementById('view_quantity_physical').value = ppe.quantity_physical || '';
    document.getElementById('view_location').value = ppe.location || 'Select Location/Whereabouts';
    document.getElementById('view_condition').value = ppe.condition || 'Select Condition';
    document.getElementById('view_status').value = ppe.status || 'Select Status';
    document.getElementById('view_remarks').value = ppe.remarks || '';
    document.getElementById('view_date_acq').value = ppe.date_acq || '';
    
    // Format and populate timestamps
    document.getElementById('view_created_at').textContent = formatDateTime(ppe.created_at);
    document.getElementById('view_updated_at').textContent = formatDateTime(ppe.updated_at);

    // Show the modal
    document.getElementById('ppeModal').style.display = 'block';
    document.getElementById('viewDvModal').style.display = 'block';
}

// Function to close the modal
function closeViewPopup() {
    document.getElementById('ppeModal').style.display = 'none';
    document.getElementById('viewDvModal').style.display = 'none';
}



//Header Functions

//Search function
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('#search-btn').on('click', function(event) {
        event.preventDefault();
        const searchValue = $('#search_ppe').val();
        performSearch(searchValue);
    });
});

function performSearch(searchValue) {
    $.ajax({
        url: '/searchPpe',
        type: 'GET',
        data: { search_ppe: searchValue },
        success: function(response) {
            console.log(response); // Debugging to verify response
            $('#table-body').empty(); // Clear the table body before appending new rows

            let totalPpe = 0; // Initialize total PPE count
            let totalAmount = 0; // Initialize total Amount sum

            response.forEach(function(ppe, index) {
                totalPpe += 1; // Count each row
                totalAmount += parseFloat(ppe.unit_value) || 0; // Sum the unit values

                const rowNumber = index + 1; // Dynamic row numbering
                $('#table-body').append(
                    `<tr>
                        <td>${rowNumber}</td>
                        <td>${ppe.division || ''}</td>
                        <td>${ppe.user || ''}</td>
                        <td>${ppe.property_type || ''}</td>
                        <td>${ppe.article_item || ''}</td>
                        <td>${ppe.description || ''}</td>
                        <td>${ppe.new_pn || ''}</td>
                        <td>${ppe.unit_value ? formatNumber(ppe.unit_value) : ''}</td>
                        <td>${ppe.quantity_property || ''}</td>
                        <td>${ppe.quantity_physical || ''}</td>
                        <td>${ppe.condition || ''}</td>
                        <td>${ppe.status || ''}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="showPpeDetails(${JSON.stringify(ppe).replace(/"/g, '&quot;')})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this?');" href="/deletePpe/${ppe.id}">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 7H20" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick='editPpe(${JSON.stringify(ppe)})'>
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </td>
                    </tr>`
                );
            });

            // Update Total PPE and Total Amount fields
            $('#totalPpe').val(totalPpe); 
            $('#totalAmount').val(formatNumber(totalAmount));

            // Reset pagination (if applicable)
            currentPage = 1;
            generatePaginationButtons();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Helper function to format numbers with commas
function formatNumber(value) {
    return new Intl.NumberFormat().format(value);
}



//Date Range function
function filterByDateRange() {
    const startDateInput = document.getElementById('start-date').value;
    const endDateInput = document.getElementById('end-date').value;
    const divisionValue = document.getElementById('divisionDropdown').value || null;
    const propertyTypeValue = document.getElementById('ptDropdown').value || null;
    const conditionValue = document.getElementById('conditionDropdown').value || null;
    const statusValue = document.getElementById('statusDropdown').value || null;

    // Parse dates if inputs are provided
    let startDate = startDateInput ? new Date(startDateInput) : null;
    let endDate = endDateInput ? new Date(endDateInput) : null;

    // Ensure valid date range selection
    if (startDate && endDate && startDate > endDate) {
        alert('Start date cannot be after the end date.');
        return;
    }

    // Filter the data
    filteredData = allData.filter(item => {
        const itemDate = new Date(item.date_acq);

        // Date filtering logic
        const isDateValid =
            (!startDate && !endDate) ||
            (startDate && !endDate && itemDate >= startDate) ||
            (!startDate && endDate && itemDate <= endDate) ||
            (startDate && endDate && itemDate >= startDate && itemDate <= endDate);

        // Division filtering logic: Include all divisions if '--All Divisions--' is selected
        const isDivisionValid = !divisionValue || divisionValue === "--All Divisions--" || item.division === divisionValue;
        
        // Other dropdown filtering logic
        const isPropertyTypeValid = !propertyTypeValue || item.property_type === propertyTypeValue;
        const isConditionValid = !conditionValue || item.condition === conditionValue;
        const isStatusValid = !statusValue || item.status === statusValue;

        // Combine all filters
        return isDateValid && isDivisionValid && isPropertyTypeValid && isConditionValid && isStatusValid;
    });

    // Reset to the first page after filtering
    currentPage = 1;
    updateTableRows();
    generatePaginationButtons();
}

document.addEventListener('DOMContentLoaded', () => {
    updateTableRows();
    generatePaginationButtons(); // Ensure pagination appears at the start
});

//Reset Button function
function resetFilters() {
    document.getElementById('filterForm').reset();
    filterDataByDateRange();
}





function displaySummary() {
    const tableBody = document.getElementById('rpcppe-table-body');
    tableBody.innerHTML = ''; // Clear table

    // Extract distinct property types, remove nulls, and sort alphabetically
    const propertyTypes = [...new Set(allData.map(ppe => ppe.property_type))]
        .filter(type => type)
        .sort();

    // Variables to store grand totals
    let grandChecked = 0;
    let grandFound = 0;
    let grandMissing = 0;
    let grandTotalAmount = 0;

    // Iterate over each property type and calculate sums for Checked, Found, Missing, and Total Amount
    propertyTypes.forEach(type => {
        const checkedSum = allData
            .filter(ppe => ppe.property_type === type && ppe.status === 'Checked')
            .reduce((sum, ppe) => sum + parseFloat(ppe.unit_value || 0), 0);

        const foundSum = allData
            .filter(ppe => ppe.property_type === type && ppe.status === 'Found')
            .reduce((sum, ppe) => sum + parseFloat(ppe.unit_value || 0), 0);

        const missingSum = allData
            .filter(ppe => ppe.property_type === type && ppe.status === 'Missing')
            .reduce((sum, ppe) => sum + parseFloat(ppe.unit_value || 0), 0);

        // Calculate Total Amount using the formula: Checked + Found - Missing
        const totalAmount = checkedSum + foundSum + missingSum;

        // Update grand totals
        grandChecked += checkedSum;
        grandFound += foundSum;
        grandMissing += missingSum;
        grandTotalAmount += totalAmount;

        // Create and append row to the table
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${type}</td>
            <td>${checkedSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>${foundSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>${missingSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td><strong>${totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
        `;
        tableBody.appendChild(row);
    });

    // Append Grand Total row
    const grandTotalRow = document.createElement('tr');
    grandTotalRow.innerHTML = `
        <td><strong>Grand Total</strong></td>
        <td><strong>${grandChecked.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
        <td><strong>${grandFound.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
        <td><strong>${grandMissing.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
        <td><strong>${grandTotalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
    `;
    grandTotalRow.style.fontWeight = 'bold'; // Make the row visually distinct
    tableBody.appendChild(grandTotalRow);
}

displaySummary();




// Prepares and submits the export form with applied filters
function prepareCSVExport() {
    document.getElementById('export-start-date').value = document.getElementById('start-date').value;
    document.getElementById('export-end-date').value = document.getElementById('end-date').value;
    
    // Submit the form with all filter values
    document.getElementById('csvExportForm').submit();
}



// Initialize data and pagination
filteredData = initialData.slice(); // Clone the data
updateTableRows();
generatePaginationButtons();
</script>


</html>