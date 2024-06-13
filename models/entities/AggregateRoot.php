<?php

namespace app\models\entities;

interface AggregateRoot
{
    /**
     * @return array
     */
    public function releaseEvents(): array;
}