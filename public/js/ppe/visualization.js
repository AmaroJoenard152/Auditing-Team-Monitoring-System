(async function () {
    try {
        // Register zoom plugin
        if (window['chartjs-plugin-zoom']) {
            Chart.register(window['chartjs-plugin-zoom']);
        } else {
            console.error("Zoom plugin not loaded.");
        }

        // Fetch PPE by Division
        async function fetchPpeData() {
            const response = await fetch('/ppe-division-count');
            return await response.json();
        }

        // Fetch PPE by Year
        async function fetchPpeYearData() {
            const response = await fetch('/ppe-year-count');
            return await response.json();
        }

        // Common zoom/pan options
        const zoomPanOptions = {
            responsive: true,
            plugins: {
                zoom: {
                    pan: {
                        enabled: true,
                        mode: 'x', // horizontal panning
                        modifierKey: null, // don't require Shift/Ctrl
                        onPanStart: ({chart}, event) => console.log('pan start', event),
                        onPan: ({chart}) => console.log('panning'),
                        onPanComplete: ({chart}) => console.log('pan complete')
                    },
                    zoom: {
                        wheel: { enabled: true },
                        pinch: { enabled: true },
                        mode: 'x'
                    }
                }
            }
        };


        // PPE by Division Chart
        async function renderPpeChart() {
            const data = await fetchPpeData();
            const divisions = data.map(item => item.division);
            const counts = data.map(item => item.count);

            new Chart(document.getElementById('ppeDivisionChart'), {
                type: 'bar',
                data: {
                    labels: divisions,
                    datasets: [{
                        label: 'Number of PPEs',
                        data: counts,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: zoomPanOptions
            });
        }

        // PPE by Year Chart
        async function renderPpeYearChart() {
            const data = await fetchPpeYearData();
            const years = data.map(item => item.year);
            const counts = data.map(item => item.count);

            new Chart(document.getElementById('ppeYearChart'), {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Number of PPEs per Year',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: zoomPanOptions
            });
        }

        // Condition Pie Chart
        function displayConditionPieChart() {
            if (!window.allData) {
                console.warn("allData not found for condition pie chart");
                return;
            }
            const conditionCounts = {};
            window.allData.forEach(ppe => {
                if (ppe.condition) {
                    conditionCounts[ppe.condition] = (conditionCounts[ppe.condition] || 0) + 1;
                }
            });

            new Chart(document.getElementById('conditionPieChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(conditionCounts),
                    datasets: [{
                        data: Object.values(conditionCounts),
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56',
                            '#4BC0C0', '#9966FF', '#FF9F40'
                        ]
                    }]
                }
            });
        }

        // Status Pie Chart
        function displayStatusPieChart() {
            if (!window.allData) {
                console.warn("allData not found for status pie chart");
                return;
            }
            const statusCounts = {};
            window.allData.forEach(ppe => {
                if (ppe.status) {
                    statusCounts[ppe.status] = (statusCounts[ppe.status] || 0) + 1;
                }
            });

            new Chart(document.getElementById('statusPieChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(statusCounts),
                    datasets: [{
                        data: Object.values(statusCounts),
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56',
                            '#4BC0C0', '#9966FF', '#FF9F40'
                        ]
                    }]
                }
            });
        }

        // Render all charts
        await renderPpeChart();
        await renderPpeYearChart();
        displayConditionPieChart();
        displayStatusPieChart();

    } catch (err) {
        console.error("Chart rendering error:", err);
    }
})();
