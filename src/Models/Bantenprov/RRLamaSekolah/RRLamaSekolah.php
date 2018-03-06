<?php

namespace Bantenprov\RRLamaSekolah\Models\Bantenprov\RRLamaSekolah;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RRLamaSekolah extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'rr_lama_sekolahs';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
