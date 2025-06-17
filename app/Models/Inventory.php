<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'inventory_id'; // ini WAJIB jika primary key bukan 'id'
    public $incrementing = true;
    protected $fillable = ['name', 'code', 'total', 'status'];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'inventory_id');
    }

    public function getRouteKeyName()
{
    return 'inventory_id';
}

}

