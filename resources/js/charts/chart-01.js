import ApexCharts from "apexcharts";
const chart01 = () => {
    const {
        dates = [],
        loanData = [],
        returnData = [],
    } = window.chartData || [];

    const options = {
        chart: {
            type: "area",
            height: 360,
            toolbar: { show: false },
        },
        colors: ["#3B82F6", "#A855F7"],
        series: [
            { name: "Loan", data: loanData },
            { name: "Return", data: returnData },
        ],
        fill: {
            type: "gradient",
            gradient: {
                shade: "light", // "dark" atau "light"
                type: "vertical", // "horizontal" / "vertical"
                shadeIntensity: 0.5,
                gradientToColors: ["#3B82F6", "#A855F7"], // warna gradasi ke bawah
                inverseColors: false,
                opacityFrom: 0.7, // mulai agak transparan
                opacityTo: 0.3, // makin transparan ke bawah
                stops: [0, 90, 100], // titik gradasi
            },
        },
        stroke: {
            curve: "smooth",
            width: 3,
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            categories: dates,
        },
        tooltip: {
            shared: true,
            intersect: false,
            theme: "dark",
            style: {
                fontSize: "10px",
                fontFamily: "Inter",
            },
            marker: {
                show: true,
            },
            custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                const date = w.globals.categoryLabels[dataPointIndex];
                return `
                    <div class="bg-white dark:bg-gray-900 px-5 py-4 rounded-lg border-1 dark:border-gray-200/10 border-gray-600/10 text-left">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-4">${date}</div>
                        <div class="flex items-center gap-2.5 mb-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            <span class="text-gray-800 dark:text-white text-xs">Loan: ${series[0][dataPointIndex]}</span>
                        </div>
                        <div class="flex items-center gap-2.5 mb-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                            <span class="text-gray-800 dark:text-white text-xs">Return: ${series[1][dataPointIndex]}</span>
                        </div>
                    </div>
                `;
            },
        },
        legend: {
            position: "top",
            horizontalAlign: "left",
            labels: {
                colors: "#374151",
            },
        },
    };

    if (document.querySelector("#chartOne")) {
        const chart = new ApexCharts(
            document.querySelector("#chartOne"),
            options
        );
        chart.render();
    }
};

export default chart01;
