<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class FichaPaciente extends Model {

//    use SoftDeletes;

    public static $sintomas = [
        'TOS'                                   => 'TOS',
        'FIEBRE Y ESCALOFRÍOS'                  => 'FIEBRE Y ESCALOFRÍOS',
        'DOLOR DE GARGANTA'                     => 'DOLOR DE GARGANTA',
        'DOLOR DEL CUERPO'                      => 'DOLOR DEL CUERPO',
        'MALESTAR GENERAL'                      => 'MALESTAR GENERAL',
        'PERDIDA DEL OLFATO Y/O GUSTO'          => 'PERDIDA DEL OLFATO Y/O GUSTO',
        'DIARREA'                               => 'DIARREA',
        'ERUPCCIÓN EN LA PIEL'                  => 'ERUPCCIÓN EN LA PIEL',
        'OTROS'                                 => 'OTROS',
        'DIFICULTAD PARA RESPIRAR'              => 'DIFICULTAD PARA RESPIRAR',
        'TIEMPO DE EVOLUCIÓN DE LOS SINTOMAS'   => 'TIEMPO DE EVOLUCIÓN DE LOS SINTOMAS',
        'MEDICACIÓN QUE TOMO PARA LOS SINTOMAS' => 'MEDICACIÓN QUE TOMO PARA LOS SINTOMAS'
    ];
    
    
    public static $diagnostico = [
        'NO COVID19'                                => 'NO COVID19',
        'PROBABLE COVID SINTOMAS LEVES A MODERADOS' => 'PROBABLE COVID SINTOMAS LEVES A MODERADOS',
        'PROBABLE COVID SINTOMAS SEVEROS'           => 'PROBABLE COVID SINTOMAS SEVEROS'
    ];
    
//    protected $dates = ['deleted_at'];
//    protected $hidden = ['deleted_at'];
    public $incrementing = false;

    protected $fillable = [
        'fecha_registro',
        'medico_id',
        'paciente_id',
        'municipio_id',
        'enfermedades_antecedentes',
        'medicacion_actual',
        'seguro_salud',
        'convivientes',
        'contacto_personas',
        'sintomas',
        'diagnostico',
        'conducta',
        'seguimiento_paciente',
        'observaciones',
        'calles_frecuentadas',
        'calles_lat_lng'
    ];
    
    public static function rules($update = false, $id = null) {
        $commun = [
            'fecha_registro'            => 'required|date',
            'medico_id'                 => "required|exists:medicos,id",
            'paciente_id'               => "required|exists:pacientes,id",
            'municipio_id'              => "required|exists:municipios,id",
            'enfermedades_antecedentes' => "required|string",
            'medicacion_actual'         => "string",
            'seguro_salud'              => "string",
            'convivientes'              => "required|string",
            'contacto_personas'         => "required|string",
            'sintomas'                  => "required|string",
            'diagnostico'               => "required|string",
            'conducta'                  => "required|string",
            'seguimiento_paciente'      => "required|string",
            'observaciones'             => "required|string",
            'calles_frecuentadas'       => "required|string",
        ];
        
        return $commun;
    }
    
    /**
     * Boot the Model.
     */
    public static function boot() {
        parent::boot();

        static::creating(function ($instance) {
            $instance->id = uuid4();
        });
    }
    
    public function paciente() {
        return $this -> belongsTo( 'App\Paciente' );
    }
    
    public function medico() {
        return $this -> belongsTo( 'App\Medico' );
    }
    
    public function municipio() {
        return $this -> belongsTo( 'App\Municipio' );
    }
}