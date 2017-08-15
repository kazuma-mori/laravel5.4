<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProjectCategory extends Model
{
    protected $fillable = [
        'main_project_id',
        'name',
        'name_en',
        'name_ch',
    ];
}
