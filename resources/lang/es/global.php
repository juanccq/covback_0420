<?php

return [
    'user-management' => [
        'title' => 'Administración',
        'created_at' => 'Creación',
        'fields' => [
        ],
    ],
    'permissions' => [
        'title' => 'Permisos',
        'created_at' => 'Creación',
        'fields' => [
            'name' => 'Nombre',
        ],
    ],
    'roles' => [
        'title' => 'Roles',
        'created_at' => 'Creación',
        'fields' => [
            'name' => 'Nombre',
            'permission' => 'Permisos',
        ],
    ],
    'users' => [
        'title' => 'Usuarios',
        'created_at' => 'Creación',
        'fields' => [
            'name' => 'Nombre',
            'email' => 'Correo',
            'password' => 'Contraseña',
            'roles' => 'Roles',
            'remember-token' => 'Remember token',
        ],
    ],
    'settings' => [
        'title' => 'Datos Dosificación',
        'created_at' => 'Creación',
        'fields' => [
            'name' => 'Nombre',
            'email' => 'Correo',
            'password' => 'Contraseña',
            'roles' => 'Roles',
            'remember-token' => 'Remember token',
        ],
    ],
    'medicos' => [
        'title' => 'Médicos',
        'created_at' => 'Creación',
        'fields' => [
            'nombre' => 'Nombre',
            'paterno' => 'Apellido Paterno',
            'materno' => 'Apellido Materno',
            'especialidad'  => 'Especialidad',
            'telefono'      => 'Teléfono',
            'ci'            => 'C.I.'
        ],
    ],
    'pacientes' => [
        'title' => 'Pacientes',
        'created_at' => 'Registro de pacientes',
        'fields' => [
            'nombre'        => 'Nombre',
            'paterno'       => 'Apellido Paterno',
            'materno'       => 'Apellido Materno',
            'telefono'      => 'Teléfono',
            'celular'       => 'Celular',
            'direccion'     => 'Dirección',
            'zona'          => 'Zona',
            'edad'          => 'Edad',
            'sexo'          => 'Sexo'
        ],
    ],
    'registro-pacientes' => [
        'title' => 'Registro Paciente',
        'created_at' => 'Creación',
        'fields' => [
            'fecha_registro'    => 'Fecha Registro',
            'medico_id'         => 'Médico',
            'paciente_id'       => 'Paciente',
            'municipio_id'      => 'Municipio',
            'sintomas'          => 'Síntomas',
            'diagnostico'       => 'Diagnóstico',
            'enfermedades_antecedentes' => 'Enfermedades de Base y Antecedentes',
            'medicacion_actual' => 'Medicación Actual',
        ],
    ],
    'app_create' => 'Nuevo',
    'app_save' => 'Guardar',
    'app_edit' => 'Editar',
    'app_view' => 'View',
    'app_update' => 'Actualizar',
    'app_list' => 'Listado',
    'app_no_entries_in_table' => 'No hay registros',
    'custom_controller_index' => 'Custom controller index.',
    'app_logout' => 'Salir',
    'app_add_new' => 'Nuevo',
    'app_are_you_sure' => '¿Estas seguro?',
    'app_back_to_list' => 'Volver al listado',
    'app_dashboard' => 'Inicio',
    'app_delete' => 'Eliminar',
    'global_title' => 'Macondo Art - '
];
