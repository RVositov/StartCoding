<?php
// Секретный ключ, который должен совпадать с ключом в настройках GitHub Webhook
$secret = 'StartCoding'; // Укажите ваш секретный ключ

// Путь к вашему проекту на сервере
$projectPath = '/home/r/ravshan69/system/public_html';
$logFile = $projectPath . '/deploy.log';

// Получаем данные из POST-запроса
$payload = file_get_contents('php://input');

// Проверяем подпись запроса, чтобы убедиться, что он пришел от GitHub
$signature = "sha256=" . hash_hmac('sha256', $payload, $secret);

if (!hash_equals($signature, $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '')) {
    http_response_code(403);
    die("Invalid signature");
}

// Логируем запуск деплоя
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Deploy started\n", FILE_APPEND);

// Выполняем команды для обновления проекта
exec("cd $projectPath && git pull origin main && composer install --no-dev --optimize-autoloader && php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && chown -R www-data:www-data $projectPath", $output, $status);

// Логируем результат деплоя
if ($status === 0) {
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Deploy successful\n", FILE_APPEND);
} else {
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Deploy failed\n", FILE_APPEND);
}

// Отправляем успешный ответ GitHub
http_response_code(200);
?>
