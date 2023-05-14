<?php

require 'vendor/autoload.php';

use EcoFinance\Api\PushRequest;
use EcoFinance\Dto\ErrorDto;
use EcoFinance\Error\EcoFinanceError;

try {
    $request = new PushRequest();
    $request->handle();
} catch (EcoFinanceError $e) {
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Server error']);
}
