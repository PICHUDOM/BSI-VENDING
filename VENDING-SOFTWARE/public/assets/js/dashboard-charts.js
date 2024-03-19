var saleschart = document.getElementById("sales");
var myChart2 = new Chart(saleschart, {
    type: "bar",
    data: {
        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        datasets: [
            {
                label: "Income",
                data: [
                    "280",
                    "300",
                    "400",
                    "600",
                    "450",
                    "400",
                    "500",
                    "550",
                    "450",
                    "650",
                    "950",
                    "1000",
                ],
                backgroundColor: "rgba(76, 175, 80, 0.5)",
                borderColor: "#6da252",
                borderWidth: 1,
            },
            {
                label: "Expense",
                data: [
                    "200",
                    "220",
                    "250",
                    "300",
                    "280",
                    "300",
                    "320",
                    "350",
                    "300",
                    "380",
                    "400",
                    "420",
                ],
                backgroundColor: "rgba(244, 67, 54, 0.5)",
                borderColor: "#f44336",
                borderWidth: 1,
            },
        ],
    },
    options: {
        animation: {
            duration: 2000,
            easing: "easeOutQuart",
        },
        plugins: {
            legend: {
                display: true,
                position: "top",
            },
            title: {
                display: true,
                text: "Income vs Expense",
                position: "left",
            },
        },
        scales: {
            y: {
                beginAtZero: true
            }
        },
        aspectRatio: 1,
        maintainAspectRatio: false,
    },
});
//Piechart
var pieChartElement = document.getElementById("pieChart");
var myPieChart;

function updatePieChart(labels, data) {
    if (myPieChart) {
        myPieChart.data.labels = labels;
        myPieChart.data.datasets[0].data = data;
        myPieChart.update();
    } else {
        myPieChart = new Chart(pieChartElement, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [
                    {
                        data: data,
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#4CAF50",
                            "#FF9800",
                        ],
                    },
                ],
            },
            options: {
                animation: {
                    duration: 2000,
                    easing: "easeOutQuart",
                },
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    title: {
                        display: true,
                        text: "Distribution of Categories",
                        position: "left",
                    },
                },
                aspectRatio: 1,
                maintainAspectRatio: false,
            },
        });
    }
}

fetch("/api/patient")
    .then((response) => response.json())
    .then((response) => {
        const data = response.data;
        const labels = data.map((item) => item["Type Gategories"]);
        const values = data.map((item) => parseInt(item["count same slot"]));
        updatePieChart(labels, values);
    })
    .catch((error) => {
        console.error("Error fetching data:", error);
    });
//Top product
function fetchData() {
    fetch("/api/update")
        .then((response) => response.json())
        .then((data) => {
            const sortedData = data.data.sort(
                (a, b) => a["Top Number"] - b["Top Number"]
            );

            let html = "";
            sortedData.slice(0, 5).forEach((product, index) => {
                const topNumber = index + 1;
                html += `<span id="product_${index}" class="number-top" style="display: ${
                    index === 0 ? "inline" : "none"
                };">${topNumber}<span style="font-size: 15px;">. ${
                    product["Product Name"]
                } (${product["count same slot"]})</span></span>`;
            });
            document.getElementById("productData").innerHTML = html;
            switchProducts();
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
}

function switchProducts() {
    let currentProductIndex = 0;
    const products = document.querySelectorAll(".number-top");

    setInterval(() => {
        products[currentProductIndex].style.display = "none";
        currentProductIndex = (currentProductIndex + 1) % products.length;
        products[currentProductIndex].style.display = "inline";
    }, 3000);
}
fetchData();
