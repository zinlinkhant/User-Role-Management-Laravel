<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'features';
    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->hasOne(Permission::class, 'permission_features', 'feature_id', 'permission_id');
    }
}
