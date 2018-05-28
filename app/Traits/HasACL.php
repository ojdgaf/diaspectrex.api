<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Traits\HasRoles;

/**
 * Trait HasACL
 *
 * Wrapper around HasRoles trait for managing user permissions and roles in a database.
 *
 * @package App\Traits
 */
trait HasACL
{
    use HasRoles;

    /**
     * Attach full Access control list to model
     * including relationships and arrays of names.
     *
     * @param bool $deleteRelations
     * @return $this
     */
    public function loadACL(bool $deleteRelations = false)
    {
        $this->loadRoleNames()->loadPermissionNames();

        if ($deleteRelations)
            unset($this->roles, $this->permissions);

        return $this;
    }

    /**
     * Attach array of names of associated roles to model.
     *
     * @return $this
     */
    public function loadRoleNames()
    {
        $this->role_names = $this->getRoleNames();

        return $this;
    }

    /**
     * Get array of names of associated permissions.
     *
     * @param bool $directly
     * @return Collection
     */
    public function getPermissionNames(bool $directly = false)
    {
        $permissions = $directly ? $this->getDirectPermissions() : $this->getAllPermissions();

        return $permissions->pluck('name');
    }

    /**
     * Attach array of names of associated permissions to model.
     *
     * @param bool $directly
     * @return $this
     */
    public function loadPermissionNames(bool $directly = false)
    {
        $this->permission_names = $this->getPermissionNames($directly);

        return $this;
    }


    /**
     * Return all the permissions the model has via roles.
     *
     * Overridden for loading only missing relationships.
     *
     * @return Collection
     */
    public function getPermissionsViaRoles(): Collection
    {
        return $this->loadMissing('roles', 'roles.permissions')
            ->roles->flatMap(function ($role) {
                return $role->permissions;
            })->sort()->values();
    }
}