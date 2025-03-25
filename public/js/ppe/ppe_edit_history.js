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