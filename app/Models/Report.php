<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_type',
        'generated_by',
        'date_generated',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
