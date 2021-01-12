<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Бюджет за определенный период времени
function totalBudget($api, $dateFrom, $dateTo)
{
    $crm_user_id = null;
    $status = Array(142);
    $budget = 0;

    try {
        $result = $api->lead->getAll($crm_user_id, $status);
        foreach ($result['result'] as $key => $value) {
            if (($value['date_close'] >= $dateFrom) && ($value['date_close'] <= $dateTo) && (!is_null($value['price']))) {
                $budget += $value['price'];
            }
        }
        return $budget;
    } catch (Exception $e) {
        echo 'Exception when calling lead->getAll: ', $e->getMessage(), PHP_EOL;
    }
}

//Список клиентов
function getClients()
{
    return [
        [
            'id' => 1,
            'name' => 'intrdev',
            'api' => '23bc075b710da43f0ffb50ff9e889aed'
        ],
        [
            'id' => 2,
            'name' => 'artedegrass0',
            'api' => '',
        ],

    ];
}



$dateFrom = htmlspecialchars($_GET['date_from']);
$dateTo = htmlspecialchars($_GET['date_to']);
$clients = getClients();

echo '<table>' .
    '<tr>' .
    '<th>ID клиента в Ядре</th>' .
    '<th>Название клиента</th>' .
    '<th>Сумма успешных сделок за период</th>' .
    '</tr>';

foreach ($clients as $value) {
    Introvert\Configuration::getDefaultConfiguration()->setApiKey('key', $value['api']);

    $api = new Introvert\ApiClient();
    $budget = 0;
    $totalBudget = 0;

    try {
        $result = $api->account->info();
        if (!is_null($result)) {
            $budget = totalBudget($api, $dateFrom, $dateTo);
            $totalBudget += $budget;
            echo
                '<tr>' .
                '<td>' . $value['id'] . '</td>' .
                '<td>' . $value['name'] . '</td>' .
                '<td>' . $budget . '</td>' .
                '<tr>';
        }
    } catch (Exception $e) {
        echo 'Exception when calling account->info: ', $e->getMessage(), PHP_EOL;
    }
}
echo '</table>';

echo '<br>Сумма по всем клиентам за период: ' . $totalBudget;