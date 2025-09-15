<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'options'];

    protected $casts = [
        'options' => 'json',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
