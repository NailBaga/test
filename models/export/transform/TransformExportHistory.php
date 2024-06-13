<?php

namespace app\models\export\transform;

use app\events\EventFactoryCreator;
use app\models\History;


class TransformExportHistory implements Transform
{
    public function getTransformData(array $data): array
    {
        $cellMap[] = ['Date', 'User', 'Type', 'Event', 'Message'];
        /** @var History $item */
        foreach ($data as $item) {
            $cellMap[] =
                [
                    $item->ins_ts,
                    isset($item->user) ? $item->user->username : 'System',
                    $item->object,
                    EventFactoryCreator::getEvent($item)->getEventText(),
                    strip_tags(EventFactoryCreator::getEvent($item)->getBody())
                ];
        }
        return $cellMap;
    }
}
