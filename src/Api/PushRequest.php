<?php

namespace EcoFinance\Api;

use EcoFinance\Connection;
use EcoFinance\Dto\PushRequestDto;
use EcoFinance\Dto\ReadingDto;
use EcoFinance\Error\EcoFinanceError;
use Exception;
use PDOException;

class PushRequest
{
    public function __construct() {
    }

    /**
     * @throws EcoFinanceError|Exception
     */
    public function handle(): void
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode( $inputJSON, TRUE );

        $this->validateData($input);

        $readingDto = new ReadingDto(
            $input['reading']['sensor_uuid'],
            $input['reading']['temperature']
        );
        $pushRequestDto = new PushRequestDto($readingDto);

        $this->saveData($pushRequestDto);
    }

    /**
     * @param PushRequestDto $pushRequestDto
     * @return void
     */
    private function saveData(PushRequestDto $pushRequestDto): void
    {
        try {
            $conn = Connection::get()->connect();
        } catch (PDOException $e) {
            throw new EcoFinanceError('Error connect to DB');
        }

        $sql = "INSERT INTO sensor (sensor_uuid, temperature, created_at)
VALUES (" . $pushRequestDto->getReadingDto()->getSensorUuid() . ", " . $pushRequestDto->getReadingDto()->getTemperature() . ", '" . date("Y-m-d H:i:s") . "');";

        try {
            $conn->query($sql);
        } catch (PDOException $e) {
            throw new EcoFinanceError($e->getMessage());
        }
    }

    /**
     * @param array $inputJSON
     * @return void
     */
    private function validateData(array $inputJSON): void
    {
        //TODO
    }
}