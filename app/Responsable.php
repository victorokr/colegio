<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AcudientesResetPasswordNotification;

class Responsable extends Authenticatable
{

    use Notifiable; //se llamo el trait para poder reestablecer la contraseña

    protected $table = 'responsable';
    protected $primaryKey = 'id_responsable';
    protected $fillable = ['nombres','apellidos','documento','telefono',
    'email','password','id_parentesco','id_tipoDocumento','id_matricula'];


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AcudientesResetPasswordNotification($token));
    }

}
