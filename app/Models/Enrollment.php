<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // Tên bảng (nếu không theo quy ước Laravel là enrollments)
    protected $table = 'enrollments';

    // Các trường được phép gán (mass assignable)
    protected $fillable = [
        'user_id',
        'course_id',
        'registered_at',
        'status',
        'note',
    ];

    // Nếu bạn muốn tự động convert 'registered_at' thành Carbon instance
    protected $dates = [
        'registered_at',
        'created_at',
        'updated_at',
    ];

    // Quan hệ Enrollment thuộc về User (nên khai báo nếu bạn có model User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ Enrollment thuộc về Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
