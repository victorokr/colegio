<?php

namespace App;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPasswordNotificationEs;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Docente extends Authenticatable
{
    
    use Notifiable;

    protected $table = 'docente';
    protected $primaryKey = 'id_docente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres','apellidos','documento','telefono','direccion',
        'email'  , 'password','lugarDeResidencia','id_escalafon','id_categoria','id_perfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotificationEs($token));
    }


    //  public function setPasswordAttribute($password)//modifica el password encriptandolo
    // {
    //     $this->attributes['password']=bcrypt($password);
    // }




    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role','empleado_role','id_empleado','id_role');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
    // }


    // public function hasRoles(array $roles)
    // {
    //     foreach ($roles as $role)
    //      {
    //          foreach ($this->roles as $empleadoRol)//$this->role hace referencia al campo rol en la abase de datos
    //          {

    //             if ($empleadoRol->Nombre === $role)
    //             {
    //                 return true;
    //             }


    //          }
            
    //      }



    //     return false;
    // }

}
