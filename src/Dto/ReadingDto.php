<?php

namespace EcoFinance\Dto;

class ReadingDto
{
    private int $sensorUuid;
    private float $temperature;

    /**
     * @param int $sensorUuid
     * @param float $temperature
     */
    public function __construct(int $sensorUuid, float $temperature)
    {
        $this->sensorUuid = $sensorUuid;
        $this->temperature = $temperature;
    }

    /**
     * @return int
     */
    public function getSensorUuid(): int
    {
        return $this->sensorUuid;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }
}