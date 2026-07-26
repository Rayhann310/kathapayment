<?php ob_start(); ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">System Logs</h1>
        <p class="mt-1 text-sm text-gray-500">Monitor audit trails and webhook delivery statuses.</p>
    </div>
</div>

<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="logsTab" data-tabs-toggle="#logsTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg text-primary-600 border-primary-600 dark:text-primary-500 dark:border-primary-500" id="audit-tab" data-tabs-target="#audit" type="button" role="tab" aria-controls="audit" aria-selected="true" onclick="switchTab('audit')">Audit Trail</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="webhook-tab" data-tabs-target="#webhook" type="button" role="tab" aria-controls="webhook" aria-selected="false" onclick="switchTab('webhook')">Webhook Logs</button>
        </li>
    </ul>
</div>

<div id="logsTabContent">
    <!-- Audit Logs Tab -->
    <div class="block" id="audit" role="tabpanel" aria-labelledby="audit-tab">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">Timestamp</th>
                            <th scope="col" class="px-6 py-4">Admin</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                            <th scope="col" class="px-6 py-4">Target ID</th>
                            <th scope="col" class="px-6 py-4">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($auditLogs)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No audit logs found.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($auditLogs as $log): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-mono text-xs text-gray-500">
                                    <?= date('Y-m-d H:i:s', strtotime($log['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <?= htmlspecialchars($log['admin_name']) ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        <?= htmlspecialchars($log['action']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-mono text-xs">
                                    <?= htmlspecialchars($log['target_id'] ?? '-') ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs">
                                    <?= htmlspecialchars($log['details'] ?? '-') ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Webhook Logs Tab -->
    <div class="hidden" id="webhook" role="tabpanel" aria-labelledby="webhook-tab">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">Timestamp</th>
                            <th scope="col" class="px-6 py-4">Merchant</th>
                            <th scope="col" class="px-6 py-4">Event</th>
                            <th scope="col" class="px-6 py-4">Endpoint</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($webhookLogs)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No webhook logs found.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($webhookLogs as $log): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-mono text-xs text-gray-500">
                                    <?= date('Y-m-d H:i:s', strtotime($log['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <?= htmlspecialchars($log['merchant_name']) ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-mono text-xs">
                                    <?= htmlspecialchars($log['event_type']) ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs truncate max-w-xs" title="<?= htmlspecialchars($log['endpoint']) ?>">
                                    <?= htmlspecialchars($log['endpoint']) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php 
                                    $status = (int)$log['http_status'];
                                    $class = $status >= 200 && $status < 300 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                                    ?>
                                    <span class="text-xs font-medium px-2.5 py-0.5 rounded <?= $class ?>">
                                        <?= $status ?: 'Failed' ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function switchTab(tabName) {
    document.getElementById('audit').classList.add('hidden');
    document.getElementById('webhook').classList.add('hidden');
    document.getElementById(tabName).classList.remove('hidden');
    
    document.getElementById('audit-tab').classList.remove('text-primary-600', 'border-primary-600', 'dark:text-primary-500', 'dark:border-primary-500');
    document.getElementById('audit-tab').classList.add('border-transparent');
    
    document.getElementById('webhook-tab').classList.remove('text-primary-600', 'border-primary-600', 'dark:text-primary-500', 'dark:border-primary-500');
    document.getElementById('webhook-tab').classList.add('border-transparent');
    
    document.getElementById(tabName + '-tab').classList.remove('border-transparent');
    document.getElementById(tabName + '-tab').classList.add('text-primary-600', 'border-primary-600', 'dark:text-primary-500', 'dark:border-primary-500');
}
</script>

<?php 
$content = ob_get_clean(); 
include BASE_PATH . '/app/views/layouts/main.php'; 
?>
