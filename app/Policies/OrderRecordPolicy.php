<?php

namespace App\Policies;

use App\Models\OrderRecord;
use App\Models\User;

class OrderRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OrderRecord $orderRecord): bool
    {
        $order = $orderRecord->order;
        return $order::where('user_id', $user->id)->exists() || $user->is_admin;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OrderRecord $orderRecord): bool
    {
        $order = $orderRecord->order;
        return $order::where('user_id', $user->id)->exists() || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OrderRecord $orderRecord): bool
    {
        $order = $orderRecord->order;
        return $order::where('user_id', $user->id)->exists() || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OrderRecord $orderRecord): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OrderRecord $orderRecord): bool
    {
        return false;
    }
}
