<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function requestor()
    {
        return $this->hasOne(User::class, 'id', 'requested_by');
    }

    public function developer()
    {
        return $this->hasOne(User::class, 'id', 'developer_id');
    }

    public function module()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }

    public function approval_status()
    {
        return $this->hasOne(ApprovalStatus::class, 'id', 'approval_status_id');
    }

    public function work_status()
    {
        return $this->hasOne(WorkStatus::class, 'id', 'work_status_id');
    }


    protected $fillable = [
        'title',
        'description',
        'requested_by',
        'module_id',
        'developer_id',
        'approval_status_id',
        'approved_by',
        'work_status_id',
        'project_id',
        'viewed_by',
    ];
}
