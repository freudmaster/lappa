$(function () {

    'use strict';

    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    // -----------------------
    // - MONTHLY SALES CHART -
    // -----------------------

    function riffleShuffle(deck) {
        const cutDeckVariant = deck.length / 2 + Math.floor(Math.random() * 9) - 4;
        const leftHalf = deck.splice(0, cutDeckVariant);
        let leftCount = leftHalf.length;
        let rightCount = deck.length - Math.floor(Math.random() * 4);
        while (leftCount > 0) {
            const takeAmount = Math.floor(Math.random() * 4);
            deck.splice(rightCount, 0, ...leftHalf.splice(leftCount, takeAmount));
            leftCount -= takeAmount;
            rightCount = rightCount - Math.floor(Math.random() * 4) + takeAmount;
        }
        deck.splice(rightCount, 0, ...leftHalf);
    }

    var color_1 = ["#37ecba", "#48c6ef", "#fa71cd", "#ffb199", "#537895", "#04befe"];
    riffleShuffle(color_1);
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');

    // This will get the first returned node in the jQuery collection.
    function countOccurrenceOfMonth(month, data) {
        let filter = data.filter(function (el) {
            let date = new Date(el.date_created);
            return date.getMonth() === month;
        });
        return filter.length;
    }

    $.get("home/chart.json", function (data, status) {
        if (data.langues) {
            var langues = data.langues;
            var datasets = [];

            var salesChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            };
            langues.forEach(langue => {
                let traductions = langue.traductions;
                let color = color_1.shift();
                datasets.push({
                    label: langue.name,
                    backgroundColor: color,
                    borderColor: color,
                    fill: true,
                    data: [countOccurrenceOfMonth(1, traductions), countOccurrenceOfMonth(2, traductions), countOccurrenceOfMonth(3, traductions), countOccurrenceOfMonth(4, traductions), countOccurrenceOfMonth(5, traductions), countOccurrenceOfMonth(6, traductions), countOccurrenceOfMonth(7, traductions)]
                })
            });
            salesChartData['datasets'] = datasets;
            const options = {
                responsive: true,
                title: {
                    display: false,
                },
                showLine:true,
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }
                }
            };
            const config = {type: 'line', data: salesChartData, options: options};
            var salesChart = new Chart(salesChartCanvas, config);

        }
    });
});

