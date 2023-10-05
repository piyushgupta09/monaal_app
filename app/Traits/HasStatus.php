<?php

namespace App\Traits;

trait HasStatus
{
    public function scopeStatus($status)
    {
        return $this->where('status', $status);
    }

    public function status($status)
    {
        $this->status = $status;
        $this->save();
    }
}
