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