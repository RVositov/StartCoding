<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
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
      'updated_at'
    ];
    public function GroupStatus()
    {
        return $this->belongsTo(GroupStatus::class, 'status_id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_groups',  'group_id', 'student_id');
    }
    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'group_id');
    }

}

