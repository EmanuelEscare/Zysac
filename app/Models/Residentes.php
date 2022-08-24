<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Residentes extends Model
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'teléfono',
        'titular',
        'id_casa',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nombre', 'email', 'telefono', 'titular', 'id_casa'])
        ->useLogName(auth()->user()->name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." un residente");;;
        // Chain fluent methods for configuration options
    }

    public function residencia(){
        return $this->belongsTo(Residencias::class, 'id_casa'); //belongsTo Uno  UN RESIDENTE PUEDE TENER SOLO UNA RESIDENCIA
    }

}
