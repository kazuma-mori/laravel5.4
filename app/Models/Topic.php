<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Topic extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'title_ch',
        'body',
        'body_en',
        'body_ch',
        'open_date',
        'close_date'
    ];
}
