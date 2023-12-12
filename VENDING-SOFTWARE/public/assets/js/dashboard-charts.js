var trafficchart = document.getElementById("trafficflow");
var saleschart = document.getElementById("sales");

// new
var myChart1 = new Chart(trafficchart, {
    type: "line",
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
                data: [
                    "1135",
                    "1135",
                    "1140",
                    "1168",
                    "1150",
                    "1145",
                    "1155",
                    "1155",
                    "1150",
                    "1160",
                    "1185",
                    "1190",
                ],
                backgroundColor: "rgba(48, 164, 255, 0.2)",
                borderColor: "rgba(48, 164, 255, 0.8)",
                fill: true,
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
                display: false,
                position: "right",
            },
            title: {
                display: true,
                text: "Number of Visitors",
                position: "left",
            },
        },
    },
});

// new
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
        ],
    },
    options: {
        animation: {
            duration: 2000,
            easing: "easeOutQuart",
        },
        plugins: {
            legend: {
                display: false,
                position: "top",
            },
            title: {
                display: true,
                text: "Number of Sales",
                position: "left",
            },
        },
    },
});
var pieChartElement = document.getElementById("pieChart");
var myPieChart = new Chart(pieChartElement, {
    type: "pie",
    data: {
        labels: [
            "Category 1",
            "Category 2",
            "Category 3",
            "Category 4",
            "Category 5",
        ],
        datasets: [
            {
                data: [30, 20, 15, 25, 10],
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
    },
});
