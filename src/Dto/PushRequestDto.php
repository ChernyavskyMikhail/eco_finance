<?php

namespace EcoFinance\Dto;

use Exception;

class PushRequestDto
{
    private ReadingDto $readingDto;

    /**
     * @param ReadingDto $readingDto
     */
    public function __construct(ReadingDto $readingDto)
    {
        $this->readingDto = $readingDto;
    }

    /**
     * @return ReadingDto
     */
    public function getReadingDto(): ReadingDto
    {
        return $this->readingDto;
    }
}