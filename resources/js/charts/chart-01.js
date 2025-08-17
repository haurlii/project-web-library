import ApexCharts from "apexcharts";
const chart01 = () => {
    const {
        dates = [],
        loanData = [],
        returnData = [],
    } = window.chartData || [];

    const options = {
        series: [
            { name: "Peminjaman", data: loanData },
            { name: "Pengembalian", data: returnData },
        ],
        chart: { type: "bar", height: 360, toolbar: { show: false } },
        colors: ["#3b82f6", "#10b981"],
        plotOptions: { bar: { columnWidth: "5%", borderRadius: 4 } },
        stroke: { width: 4, colors: ["transparent"] },
        dataLabels: { enabled: false },
        xaxis: { categories: dates },
        yaxis: { title: { text: "Jumlah" } },
        tooltip: { shared: true, intersect: false },
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
