<?php

namespace App\Traits;

trait HasFormattedDateTime
{
    public function getFormattedDateTimeAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d F Y H.i.s');
    }
}
