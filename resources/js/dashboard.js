$(function () {
    $.ajax({
        url: '/api/statistics-this-month',
        type: 'GET',
        dataType: 'json',
        success: function (response) {

            var labels = [];

            for (let i = 0; i <= response.daysInMonth; i++) {
                labels.push(i)
            }

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu tháng này',
                    backgroundColor: '#5089C6',
                    borderColor: '#5089C6',
                    data: response.data,
                }]
            };

            const configBlockMonthlyRevenue = {
                type: 'bar',
                data: data,
                options: {}
            };

            var element = document.getElementById('blockMonthlyRevenue');

            if(element){
                new Chart(
                    element,
                    configBlockMonthlyRevenue
                );
            }
        }
    });

    $.ajax({
        url: '/api/product-top-this-month',
        type: 'GET',
        dataType: 'json',
        success: function (response) {

            let labels = [];
            let total_quantity = [];

            response.map((col) => {
                labels.push(col.name)
                total_quantity.push(col.total_quantity)
            })

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu tháng này',
                    backgroundColor: '#5089C6',
                    borderColor: '#5089C6',
                    data: total_quantity,
                }]
            };

            const configBlockMonthlyRevenueTopProduct = {
                type: 'bar',
                data: data,
                options: {
                    indexAxis: 'y',
                }
            };

            var blockMonthlyRevenueTopProduct = new Chart(
                document.getElementById('blockMonthlyRevenueTopProduct'),
                configBlockMonthlyRevenueTopProduct
            );
        }
    });

})

// blockMonthlyRevenue.canvas.parentNode.style.width = '1000px';



// blockMonthlyRevenueTopProduct.canvas.parentNode.style.width = '1000px';
