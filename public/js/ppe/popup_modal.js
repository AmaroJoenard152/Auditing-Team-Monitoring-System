// Input Modal Handling
var inputModal = document.getElementById("inputPPEModal");
var inputOverlay = document.getElementById("inputOverlay");


function inputPPEModal() {
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

// View Modal Handling
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


