//Search function
// Setup CSRF and search button click event
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

// Search function with AJAX
function performSearch(searchValue) {
    $.ajax({
        url: '/api/ppe',
        type: 'GET',
        data: { search_ppe: searchValue },
        success: function(response) {
            console.log(response); // Debugging to verify response

            // Update global filteredData used for pagination
            filteredData = response;

            $('#table-body').empty(); // Clear the table before appending new rows

            let totalPpe = 0;
            let totalAmount = 0;

            response.forEach(function(ppe, index) {
                totalPpe++; // Count each row
                totalAmount += parseFloat(ppe.unit_value) || 0;

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

            // Update totals
            $('#totalPpe').val(totalPpe); 
            $('#totalAmount').val(formatNumber(totalAmount));

            // Reset pagination and update table rows
            currentPage = 1;
            generatePaginationButtons();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
