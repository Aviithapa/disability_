<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'name_nepali',
        'name_english',
        'designation',
        'phone_number',
        'red_signature',
        'black_signature',
        'stamp',
        'status',
        'photo'
    ];

    public function getProfileImage()
    {
        if (isset($this->photo)) {
            return Storage::url('photo/' . $this->photo);
        } else {
            return imageNotFound();
        }
    }

    public function getRedSignatureImage()
    {
        if (isset($this->red_signature)) {
            return Storage::url('photo/' . $this->red_signature);
        } else {
            return imageNotFound();
        }
    }

    public function getBlackSignatureImage()
    {
        if (isset($this->black_signature)) {
            return Storage::url('photo/' . $this->black_signature);
        } else {
            return imageNotFound();
        }
    }

    public function getStampImage()
    {
        if (isset($this->stamp)) {
            return Storage::url('photo/' . $this->stamp);
        } else {
            return imageNotFound();
        }
    }
}
