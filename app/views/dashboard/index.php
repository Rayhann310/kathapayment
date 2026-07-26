<?php ob_start(); ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <!-- Card 1 -->
    <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Revenue</h3>
            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= $total_revenue ?></span>
            <p class="flex items-center text-base font-normal text-green-500">
                <i class="fa-solid fa-arrow-up w-3 h-3 mr-1"></i>
                12.5%
            </p>
        </div>
        <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center text-primary-600 dark:text-primary-300">
            <i class="fa-solid fa-rupiah-sign text-xl"></i>
        </div>
    </div>
    
    <!-- Card 2 -->
    <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Transactions</h3>
            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= $total_transactions ?></span>
            <p class="flex items-center text-base font-normal text-green-500">
                <i class="fa-solid fa-arrow-up w-3 h-3 mr-1"></i>
                3.4%
            </p>
        </div>
        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-600 dark:text-green-300">
            <i class="fa-solid fa-chart-line text-xl"></i>
        </div>
    </div>
    
    <!-- Card 3 -->
    <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Active Merchants</h3>
            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= $active_merchants ?></span>
            <p class="flex items-center text-base font-normal text-red-500">
                <i class="fa-solid fa-arrow-down w-3 h-3 mr-1"></i>
                1.2%
            </p>
        </div>
        <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-600 dark:text-purple-300">
            <i class="fa-solid fa-store text-xl"></i>
        </div>
    </div>
    
    <!-- Card 4 -->
    <div class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
            <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Success Rate</h3>
            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white"><?= $success_rate ?></span>
            <p class="flex items-center text-base font-normal text-green-500">
                <i class="fa-solid fa-arrow-up w-3 h-3 mr-1"></i>
                0.5%
            </p>
        </div>
        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300">
            <i class="fa-solid fa-check-circle text-xl"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Revenue Overview</h3>
        <div id="revenue-chart"></div>
    </div>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Recent Transactions</h3>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Transaction ID</th>
                        <th scope="col" class="px-6 py-3">Amount</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch recent transactions directly for dashboard simplicity
                    $db = \App\Providers\Database::getInstance()->getConnection();
                    $stmt = $db->query("SELECT invoice_number, amount, status FROM invoices ORDER BY created_at DESC LIMIT 5");
                    while($row = $stmt->fetch()):
                        $statusColor = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                        if ($row['status'] === 'paid') $statusColor = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                        if ($row['status'] === 'expired') $statusColor = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['invoice_number']) ?></th>
                        <td class="px-6 py-4">Rp <?= number_format($row['amount'], 0, ',', '.') ?></td>
                        <td class="px-6 py-4"><span class="<?= $statusColor ?> text-xs font-medium mr-2 px-2.5 py-0.5 rounded"><?= ucfirst($row['status']) ?></span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const options = {
            chart: {
                type: 'area',
                height: 300,
                fontFamily: "Inter, sans-serif",
                toolbar: { show: false }
            },
            series: [{
                name: 'Revenue',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            },
            colors: ['#3b82f6'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth' }
        }

        const chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
        chart.render();
    });
</script>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
