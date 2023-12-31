function getChartColorsArray(e) {
    e = $(e).attr("data-colors");
    return (e = JSON.parse(e)).map(function (e) {
        e = e.replace(" ", "");
        if (-1 == e.indexOf("--")) return e;
        e = getComputedStyle(document.documentElement).getPropertyValue(e);
        return e || void 0;
    });
}
var barchartColors = getChartColorsArray("#task-chart"),
    options = {
        chart: {
            height: 280,
            type: "line",
            stacked: !1,
            toolbar: { show: !1 },
        },
        stroke: { width: [0, 2, 5], curve: "smooth" },
        plotOptions: { bar: { columnWidth: "20%", endingShape: "rounded" } },
        colors: barchartColors,
        series: [
            {
                name: "Complete Tasks",
                type: "column",
                data: [45, 26, 36, 27, 40, 28, 52],
            },
            {
                name: "All Tasks",
                type: "line",
                data: [45, 26, 46, 27, 40, 50, 62],
            },
        ],
        fill: {
            gradient: {
                inverseColors: !1,
                shade: "light",
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100],
            },
        },
        labels: ["Mon", "Tue", "Wed", "The", "Fri", "Sat", "Sun"],
        markers: { size: 0 },
        yaxis: { min: 0 },
    },
    chart = new ApexCharts(document.querySelector("#task-chart"), options);
chart.render();
