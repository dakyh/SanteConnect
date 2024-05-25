<?php

namespace App\Traits;

use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function ($model) {
            $model->createAudit('created');
        });

        static::updated(function ($model) {
            $model->createAudit('updated');
        });

        static::deleted(function ($model) {
            $model->createAudit('deleted');
        });
    }

    public function createAudit($action)
    {
        $user = Auth::user();
        $oldValues = json_encode($this->getOriginal());
        $newValues = json_encode($this->getAttributes());

        Audit::create([
            'user_id' => $user ? $user->id : null,
            'action' => $action,
            'auditable_type' => get_class($this),
            'auditable_id' => $this->id,
            'old_values' => $oldValues,
            'new_values' => $newValues,
        ]);
    }
}
