window.addEventListener('load', () => {
   // Apex Pie Chart
   (function () {
     buildChart('#pie', () => ({
       chart: {
         height: '100%',
         type: 'pie',
         zoom: {
           enabled: true
         }
       },
       series: [70, 18, 12],
       labels: ['Direct', 'Organic search', 'Referral'],
       title: {
         show: true
       },
       dataLabels: {
         style: {
           fontSize: '20px',
           fontFamily: 'Inter, ui-sans-serif',
           fontWeight: '400',
           colors: ['#fff', '#fff', '#1f2937']
         },
         dropShadow: {
           enabled: true
         },
         formatter: (value) => `${value.toFixed(1)} %`
       },
       plotOptions: {
         pie: {
           dataLabels: {
             offset: -15
           }
         }
       },
       legend: {
         show: false
       },
       stroke: {
         width: 4
       },
       grid: {
         padding: {
           top: -10,
           bottom: -8,
           left: -9,
           right: -9
         }
       },
       tooltip: {
         enabled: true
       },
       states: {
         hover: {
           filter: {
             type: 'none'
           }
         }
       }
     }), {
       colors: ['#3b82f6', '#22d3ee', '#e5e7eb'],
       stroke: {
         colors: ['rgb(255, 255, 255)']
       }
     }, {
       colors: ['#3b82f6', '#22d3ee', '#404040'],
       stroke: {
         colors: ['rgb(38, 38, 38)']
       }
     });
   })();
 });
