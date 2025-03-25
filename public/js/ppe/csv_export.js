// Prepares and submits the export form with applied filters
function prepareCSVExport() {
    document.getElementById('export-start-date').value = document.getElementById('start-date').value;
    document.getElementById('export-end-date').value = document.getElementById('end-date').value;
    
    // Submit the form with all filter values
    document.getElementById('csvExportForm').submit();
}