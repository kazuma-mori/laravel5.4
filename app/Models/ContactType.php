<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContactType extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'name_ch',
    ];
}
