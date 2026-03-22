<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type',
        'technology',
        'year',
        'file'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function isPdf()
    {
        return str_ends_with($this->file, '.pdf');
    }

    public function isExcel()
    {
        return str_ends_with($this->file, '.xlsx') || str_ends_with($this->file,'.xls');
    }

    public function getFileNameAttribute()
    {
        return basename($this->file);
    }
}
