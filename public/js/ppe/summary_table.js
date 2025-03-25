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
    let grandUnchecked = 0;
    let grandTotalAmount = 0;

    // Iterate over each property type and calculate sums for each status and Total Amount
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

        const uncheckedSum = allData
            .filter(ppe => ppe.property_type === type && ppe.status === 'Unchecked')
            .reduce((sum, ppe) => sum + parseFloat(ppe.unit_value || 0), 0);

        // Calculate Total Amount using the formula: Checked + Found + Missing + Unchecked
        const totalAmount = checkedSum + foundSum + missingSum + uncheckedSum;

        // Update grand totals
        grandChecked += checkedSum;
        grandFound += foundSum;
        grandMissing += missingSum;
        grandUnchecked += uncheckedSum;
        grandTotalAmount += totalAmount;

        // Create and append row to the table
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${type}</td>
            <td>${checkedSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>${foundSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>${missingSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>${uncheckedSum.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
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
        <td><strong>${grandUnchecked.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
        <td><strong>${grandTotalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</strong></td>
    `;
    grandTotalRow.style.fontWeight = 'bold'; // Make the row visually distinct
    tableBody.appendChild(grandTotalRow);
}

displaySummary();