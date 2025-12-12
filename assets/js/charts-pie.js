/**
 * Pie Chart - Distribution of Content
 */
const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [
          // ⚡ FIX: Use the exact keys from your console log
          window.dashboardData.totalArticles,
          window.dashboardData.totalUsers,
          window.dashboardData.pendingComments,
        ],
        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
        label: 'Dataset 1',
      },
    ],
    labels: ['Articles', 'Users', 'Pending Comments'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    legend: {display: false},
  },
};

const pieCtx = document.getElementById('pie');
if (pieCtx) {
  window.myPie = new Chart(pieCtx, pieConfig);
}
