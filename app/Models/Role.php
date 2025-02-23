<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'active'];

    
    protected static function boot()
    {
        parent::boot();

        // Evitar la eliminación (física o lógica) del rol 'admin'
        static::deleting(function ($role) {
            if ($role->name === 'admin') {
                throw new \Exception('No se puede eliminar el rol admin.');
            }
        });

        // Evitar la eliminación permanente del rol 'admin'
        static::forceDeleting(function ($role) {
            if ($role->name === 'admin') {
                throw new \Exception('No se puede eliminar permanentemente el rol admin.');
            }
        });
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_role',  'role_id', 'user_id');
    }

}
