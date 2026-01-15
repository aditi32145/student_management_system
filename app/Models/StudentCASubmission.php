<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class StudentCASubmission extends Model
{
    protected $table = 'student_ca_submissions';


    protected $fillable = [
        'student_id',
        'ca_upload_id',
        'pdf_file',
        'status',
        'uploaded_at'
    ];


    public function ca()
    {
        return $this->belongsTo(CAUpload::class, 'ca_upload_id');
    }
}
