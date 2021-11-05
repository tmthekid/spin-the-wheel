<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'status'];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function distributor()
    {
        return $this->hasOne(Distributor::class);
    }

    public function code()
    {
        return $this->hasOne(Code::class);
    }
}