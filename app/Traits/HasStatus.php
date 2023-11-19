<?php

namespace App\Traits;

trait HasStatus
{
    public function scopeStatus($status)
    {
        return $this->where('status', $status);
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->save();
    }
}
