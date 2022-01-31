require('./options');

import ChartDataLabels from 'chartjs-plugin-datalabels';

window.initChart = function (div, type, datasets, labels, aspectRatio = undefined) {
    let option;

    switch (type) {
        case 'bar':
            option = optionBar;
            break;
        case 'barHorizontal':
            type = 'bar';
            option = optionBarHorizontal;
            break;
        case 'pie':
            option = optionPie;
            break;
        case 'line':
            option = optionLine;
            break;
        default:
            break;
    }

    option.aspectRatio = aspectRatio;

    let chartConfig = {
        type: type,
        data: {
            labels: labels,
            datasets: datasets,
        },
        options: option,
    }

    if (type != 'pie') {
        chartConfig.plugins = [ChartDataLabels];
    }

    return new Chart(div, chartConfig);
};