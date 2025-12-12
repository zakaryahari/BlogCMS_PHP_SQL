/**
 * Line Chart (Bar Style) - Comparing Metrics
 */
const lineConfig = {
  type: 'bar', // Using bar chart to compare totals
  data: {
    labels: ['Users', 'Articles', 'Pending Comments'],
    datasets: [
      {
        label: 'Counts',
        backgroundColor: '#0694a2',
        borderWidth: 1,
        data: [
          // ⚡ FIX: Use the exact keys from your console log
          window.dashboardData.totalUsers,
          window.dashboardData.totalArticles,
          window.dashboardData.pendingComments,
        ],
      },
    ],
  },
  options: {
    responsive: true,
    legend: {display: false},
    scales: {
      yAxes: [
        {
          ticks: {beginAtZero: true},
        },
      ],
    },
  },
};

const lineCtx = document.getElementById('line');
if (lineCtx) {
  window.myLine = new Chart(lineCtx, lineConfig);
}
