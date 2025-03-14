async function fetchPpeData() {
    const response = await fetch('/ppe-division-count');
    return await response.json();
}

async function renderPpeChart() {
    const data = await fetchPpeData();

    const divisions = data.map(item => item.division);
    const counts = data.map(item => item.count);

    const ctx = document.getElementById('ppeDivisionChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: divisions,
            datasets: [{
                label: 'Number of PPEs',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of PPEs'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Divisions'
                    }
                }
            }
        }
    });
}

renderPpeChart();

async function fetchPpeYearData() {
    const response = await fetch('/ppe-year-count');
    return await response.json();
}

async function renderPpeYearChart() {
    const data = await fetchPpeYearData();

    const years = data.map(item => item.year);
    const counts = data.map(item => item.count);

    const ctx = document.getElementById('ppeYearChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Number of PPEs per Year',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of PPEs'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Year'
                    }
                }
            }
        }
    });
}

renderPpeYearChart();

function displayConditionPieChart() {
    const conditionCounts = {};

    allData.forEach(ppe => {
        if (ppe.condition) {
            conditionCounts[ppe.condition] = (conditionCounts[ppe.condition] || 0) + 1;
        }
    });

    const conditions = Object.keys(conditionCounts);
    const counts = Object.values(conditionCounts);

    const ctx = document.getElementById('conditionPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: conditions,
            datasets: [{
                data: counts,
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                            const percentage = ((context.raw / total) * 100).toFixed(2);
                            return `${context.label}: ${context.raw} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

displayConditionPieChart();

function displayStatusPieChart() {
    const statusCounts = {};

    allData.forEach(ppe => {
        if (ppe.status) {
            statusCounts[ppe.status] = (statusCounts[ppe.status] || 0) + 1;
        }
    });

    const statuses = Object.keys(statusCounts);
    const counts = Object.values(statusCounts);

    if (window.statusPieChartInstance) {
        window.statusPieChartInstance.destroy();
    }

    const ctx = document.getElementById('statusPieChart').getContext('2d');
    window.statusPieChartInstance = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: statuses,
            datasets: [{
                label: 'Status Percentage',
                data: counts,
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: '#000',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                            const percentage = ((context.raw / total) * 100).toFixed(2);
                            return `${context.label}: ${context.raw} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

displayStatusPieChart();