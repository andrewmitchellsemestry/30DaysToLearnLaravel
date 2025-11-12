<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{

    use HasFactory;

    protected $table = 'job_listings';

    protected $guarded = [];
    //  We can remove the need for the fillable fields to be entered by using the guarded array
    //  protected $fillable = [
    //     'employer_id',
    //     'title',
    //     'salary'
    // ];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}