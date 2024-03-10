<?php

namespace App\Http\ApiV1\Support\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseJsonResource extends JsonResource
{
    /** @var string */
    public const DATE_TIME_FORMAT = 'Y-m-d\TH:i:s.u\Z';

    public function dateTimeToIso(?DateTime $datetime): ?string
    {
        return $datetime?->format(static::DATE_TIME_FORMAT);
    }
}
