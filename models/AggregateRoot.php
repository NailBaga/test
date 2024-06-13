<?php

namespace app\models;

interface AggregateRoot
{
    /**
     * @return array
     */
    public function releaseEvents(): array;
}