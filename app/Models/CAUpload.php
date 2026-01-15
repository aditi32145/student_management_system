<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CAUpload extends Model
{
    use HasFactory;

    protected $table = 'ca_uploads';

    protected $fillable = [
        'teacher_id',
        'subject',
        'course',
        'ca_type',
        'upload_type',
        'text_content',
        'pdf_file',
        'instructions',
        'editable',
        'start_date',
        'end_date'
    ];
}
