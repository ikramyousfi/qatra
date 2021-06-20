
//var stock= document.getElementsByClassName('stock');
//var percentage = document.getElementsByClassName('percentage');

window.onload = function() {

    $('.mychart').each(function(){
        var chart= $(this)[0];
        var ct = chart.getContext('2d');
        chart = new Chart(ct, {
            type: 'doughnut',
            data: {
                datasets: [{
                    label: '# of Votes',
                    data: [50,50],
                    backgroundColor: [
                        'red',
                        'lightgrey',
                    ],
                    borderColor: [
                        'red',
                        'lightgrey',
                    ]
                }]
            },
            options: {
                responsive: true,
                cutout: '80%',
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                }
            }
        })
    })
}

