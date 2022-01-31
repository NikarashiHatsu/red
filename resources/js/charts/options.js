const { Chart } = require("chart.js/dist/chart");

chartHelper = Chart.helpers;

window.optionBar = {
    normalized: true,
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 16/9,
    scales: {
        y: {
            beginAtZero: true,
        },
        x: {
            ticks:{
                font: {
                    size: 10
                },
            },
        },
    },
    plugins: {
        datalabels: {
            align: 'end',
            offset: 6
        },
        tooltip: {
            callbacks: {
                title: (context) => {
                    return context[0].label.replaceAll(",", " ");
                },
            },
        },
    },
};

window.optionBarHorizontal = {
    indexAxis: 'y',
    normalized: true,
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 16/7,
    scales: {
        x: {
            beginAtZero: true,
        },
        y: {
            ticks:{
                font: {
                    size: 10
                },
            },
        },
    },
    plugins: {
        datalabels: {
            align: 'end',
            offset: 6
        },
        tooltip: {
            callbacks: {
                title: (context) => {
                    return context[0].label.replaceAll(",", " ");
                },
            },
        },
    },
};

window.optionPie = {
    normalized: true,
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 1,
    plugins: {
        legend: {
            position: 'bottom',
            labels: {
                generateLabels: function(chart) {
                    var data = chart.data;

                    if (data.labels.length && data.datasets.length) {
                        return data.labels.map(function(label, i) {
                            var meta = chart.getDatasetMeta(0);
                            var ds = data.datasets[0];
                            var arc = meta.data[i];
                            var custom = arc && arc.custom || {};
                            var valueOrDefault = chartHelper.valueOrDefault;
                            var arcOpts = chart.options.elements.arc;
                            var fill = custom.backgroundColor
                                ? custom.backgroundColor
                                : valueOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);

                            return {
                                text: label + ': ' + ds.data[i],
                                fillStyle: fill[i],
                                lineWidth: 0,
                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                index: i,
                            }
                        });
                    }

                    return [];
                },
            },
        },
    },
};

window.optionLine = {
    normalized: true,
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 16/9,
    scales: {
        y: {
            beginAtZero: true,
        },
        x: {
            ticks:{
                font: {
                    size: 10
                },
            },
        },
    },
    plugins: {
        datalabels: {
            align: 'end',
        },
        tooltip: {
            callbacks: {
                title: (context) => {
                    return context[0].label.replaceAll(",", " ");
                },
            },
        },
    },
};