<?php

namespace App\Models;
use App\Models\Request as ModelsRequest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function requests()
    {
        return $this->hasMany(ModelsRequest::class, 'module_id', 'id');
    }

    protected $fillable = [
        'name',
        'project_id',
        'description',
        'developers',
    ];
}
