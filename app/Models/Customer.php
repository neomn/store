<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;


/**
 * Class Customer
 * @package App
 * @mixin Builder
 */
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='customer';
    public $timestamps=true;

    protected $fillable=[
        'firstName',
        'lastName',
        'phoneNumber',
        'emailAddress'
    ];
}
