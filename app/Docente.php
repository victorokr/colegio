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
        'nombres','documento','telefono','direccion',
        'email'  , 'password','lugarDeResidencia','id_escalafon','id_nivel','id_perfil',
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


     public function setPasswordAttribute($password)//modifica el password encriptandolo
    {
        $this->attributes['password']=bcrypt($password);
    }




    public function hasRoles(array $roles)
    {
        foreach ($roles as $role)
         {
             foreach ($this->roles as $empleadoRol)//$this->role hace referencia al campo rol en la abase de datos
             {

                if ($empleadoRol->Nombre === $role)
                {
                    return true;
                }


             }
            
         }



        return false;
    }

    

    public function roles()
    {
        return $this->belongsToMany('App\Role','docente_role','id_docente','id_role');
    }


    public function gradoEscalafon()
    {
        return $this->belongsTo('App\Gradoescalafon','id_escalafon');
    }

    public function areaDeEstudio()
    {
        return $this->belongsToMany('App\Areadeestudio','Areadeestudio_docente','id_docente','id_areaDeEstudio');
    }

    public function perfil()
    {
        return $this->belongsTo('App\Perfil','id_perfil');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Nivel','id_nivel');
    }


    public function scopeDocente($query, $nombreDocente)
    {
        if($nombreDocente)
        return $query->where('nombres','LIKE',"%$nombreDocente%")
        ->orWhere('documento','LIKE',"%$nombreDocente%");
    }

}
