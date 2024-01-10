<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'status_id',
        'name',
        'price',
        'start_date',
        'end_date',
        'shift',
        'created_at',
        'updated_at',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function status()
    {
        return $this->belongsTo(GroupStatus::class, 'status_id');
    }
}
