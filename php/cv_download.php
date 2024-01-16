<?php
// Путь к файлам
$filePath = ($_SERVER['DOCUMENT_ROOT'] . '/cv/');
$fileName = $_GET['filename'];

// Проверка наличия файла
if (file_exists($filePath . $fileName)) {
    // Установка заголовков для скачивания файла
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath . $fileName));

    // Открытие файла для чтения и отправка его содержимого клиенту
    readfile($filePath . $fileName);
    exit;
} else {
    // Если файл не найден, выведите сообщение об ошибке
    echo 'Файл не найден.';
}
?>