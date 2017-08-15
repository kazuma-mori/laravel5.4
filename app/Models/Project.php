<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    protected $fillable = [
        'project_category_id',
        'name',
        'name_en',
        'name_ch',
        'body',
        'body_en',
        'body_ch',
        'access',
        'access_en',
        'access_ch',
        'tel',
        'open_date',
        'close_date'
    ];
}