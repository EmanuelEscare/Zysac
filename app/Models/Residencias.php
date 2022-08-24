<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Residencias extends Model
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero_casa',
        'nombre_dueño',
        'teléfono',
        'direccion',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['numero_casa', 'nombre_dueño', 'telefono', 'direccion'])
        ->useLogName(auth()->user()->name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." una residencia");;;
        // Chain fluent methods for configuration options
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function residentes(){
        return $this->hasMany(Residentes::class, 'id'); //HasMany Muchos UNA RESIDENCIA PUEDE TENER MUCHOS RESIDENTES 
    }
}

