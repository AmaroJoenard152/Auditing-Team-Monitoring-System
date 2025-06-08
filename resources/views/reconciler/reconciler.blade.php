<!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Side Nav -->
    <link rel="stylesheet" href="{{ asset('css/sidenav/sidenav.css') }}">
    <script src="{{ asset('js/sidenav/sidenav.js') }}"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Header -->
    <link rel="stylesheet" href="{{ asset('css/header/header.css') }}">
    
    <style>
        /* Wrapper Styling */
        #forms-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
            margin-left: 100px;
        }

        /* Form Container */
        #forms-wrapper .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
            margin-bottom: 20px;
            overflow-x: auto;
            align-items: center;
        }

        /* Headings */
        #forms-wrapper h2,
        #forms-wrapper h3 {
            text-align: center;
            color: #333;
            margin-bottom: 24px;
            font-size: 20px;
        }

        /* Flex Layout for Form Rows */
        #forms-wrapper .flex-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 20px;
        }

        /* Form Groups */
        #forms-wrapper .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        #forms-wrapper label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        #forms-wrapper input[type="file"],
        #forms-wrapper select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        #forms-wrapper select:focus {
            z-index: 10;
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }

        /* Button Styling */
        #forms-wrapper .button-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        #forms-wrapper button {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #forms-wrapper button:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        #forms-wrapper table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: auto; 
            font-size: 14px;
        }

        #forms-wrapper table,
        #forms-wrapper th,
        #forms-wrapper td {
            border: 1px solid #ccc;
        }

        #forms-wrapper th,
        #forms-wrapper td {
            padding: 8px;
            text-align: left;
            white-space: normal; /* Allow wrapping */
            overflow-wrap: break-word;
        }

        /* Narrow first column (for numbering) */
        #forms-wrapper th:first-child,
        #forms-wrapper td:first-child {
            width: 50px;
            text-align: center;
        }

        #forms-wrapper th {
            background-color: #f4f4f4;
            font-weight: 600;
            color: #333;
        }

        #forms-wrapper td {
            background-color: #fff;
        }

        /* Alert Styling */
        #forms-wrapper .alert {
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* Responsive Styles */
        @media (max-width: 550px) {
            #forms-wrapper .flex-row {
                flex-direction: column;
            }

            #forms-wrapper .button-row {
                justify-content: center;
            }

            #forms-wrapper .table-results-row .form-container {
                max-width: 100%;
            }
        }

        /* Two tables side by side on desktop */
        #forms-wrapper .table-results-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 16px;
            margin-top: 30px;
        }

        #forms-wrapper .table-results-row .form-container {
            flex: 1 1 350px;
            max-width: 100%;
        }

        /* Make individual tables horizontally scrollable if content overflows */
        #forms-wrapper .scrollable-table-container {
            overflow-x: auto;
        }

        /* Optional: Ensure tables have enough width to avoid squeezing columns */
        #forms-wrapper .scrollable-table-container table {
            min-width: 400px; /* Adjust this as needed */
        }

    </style>


</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <div class="reconciliation-wrapper">
        <div id="forms-wrapper">
            <!-- Upload Form -->
            <form class="form-container" method="POST" action="/upload" enctype="multipart/form-data" id="upload-form">
                @csrf
                <h2>Upload Two CSV Files</h2>
                <div class="flex-row">
                    <div class="form-group">
                        <label for="file1">File 1</label>
                        <input type="file" name="file1" id="file1" required>
                    </div>
                    <div class="form-group">
                        <label for="file2">File 2</label>
                        <input type="file" name="file2" id="file2" required>
                    </div>
                    <div class="form-group" style="align-self: flex-end;">
                        <button type="submit">Upload</button>
                    </div>
                </div>
            </form>

            <!-- Conditionally show Dropdown Form BELOW the Upload Form -->
            @if(session('columns1') && session('columns2'))
                @php
                    $columns1 = session()->pull('columns1');
                    $columns2 = session()->pull('columns2');
                    $allColumns = array_unique(array_merge($columns1, $columns2));
                    $commonColumns = array_intersect($columns1, $columns2);
                @endphp

                <form class="form-container" method="POST" action="/reconcile" id="dropdown-form" style="margin-top: 30px;">
                    @csrf
                    <h2>Select Columns to Reconcile</h2>

                    <div class="flex-row">
                        <div class="form-group">
                            <label for="column1">Select Common Column</label>
                            <select name="column1" id="column1" required>
                                @foreach($commonColumns as $col)
                                    <option value="{{ $col }}">{{ $col }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="column2">Select Column to Compare</label>
                            <select name="column2" id="column2" required>
                                @foreach($commonColumns as $col)
                                    <option value="{{ $col }}">{{ $col }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" style="flex: 0 0 auto;">
                            <button type="submit" style="margin-top: 28px;">Reconcile</button>
                        </div>
                    </div>
                </form>
            @endif


            @if(session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif

            @if(session('differences') && count(session('differences')) > 0 || session('nonExisting') && count(session('nonExisting')) > 0)
                <div class="table-results-row">
                    @if(session('differences') && count(session('differences')) > 0)
                        <div class="form-container">
                            <h3>Differences found based on "{{ session('selectedColumn') }}"</h3>
                            <div class="scrollable-table-container">
                                <table>

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ session('selectedColumn') }}</th>
                                        <th>Dataset 1 ({{ session('compareColumn') }})</th>
                                        <th>Dataset 2 ({{ session('compareColumn') }})</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('differences') as $index => $diff)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $diff['key'] }}</td>
                                            <td>{{ $diff['file1'] }}</td>
                                            <td>{{ $diff['file2'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                    </table>
                                </div>
                            </div>

                    @elseif(session('differences'))
                        <div class="form-container">
                            <h3>No differences found based on "{{ session('selectedColumn') }}"</h3>
                        </div>
                    @endif

                    @if(session('nonExisting') && count(session('nonExisting')) > 0)
                        <div class="form-container">
                            <h3>Existing and Non-Existing Records based on "{{ session('selectedColumn') }}"</h3>
                            <div class="scrollable-table-container">
                                <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ session('selectedColumn') }}</th>
                                        <th>Dataset 1 ({{ session('compareColumn') }})</th>
                                        <th>Dataset 2 ({{ session('compareColumn') }})</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('nonExisting') as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['key'] }}</td>
                                            <td>{{ $item['file1'] }}</td>
                                            <td>{{ $item['file2'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                    </table>
                                </div>
                            </div>

                    @endif
                </div>
            @endif


            @php
                session()->forget([
                    'differences',
                    'nonExisting',
                    'selectedColumn',
                    'compareColumn'
                ]);
            @endphp

        </div>
    </div>

    <script>
        // When the page loads, if the dropdown form exists, scroll to it smoothly
        $(document).ready(function() {
            if ($('#dropdown-form').length) {
                // Scroll with a small delay to ensure page is ready
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $('#dropdown-form').offset().top - 20
                    }, 700);
                }, 300);
            }
        });
    </script>
</body>

</html>