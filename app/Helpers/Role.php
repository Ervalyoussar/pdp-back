<?php

namespace App\Helpers;

use App\Models\Role as RoleModel;
use Illuminate\Support\ItemNotFoundException;

class HelperRole
{
    public function getRoleID(string $roleName) : null|int
    {
        try
        {
            $id = RoleModel::all()->where('name', '=', $roleName)->firstOrFail()->id;
        }
        catch (ItemNotFoundException $e)
        {
            return null;
        }

        return $id;
    }
}
