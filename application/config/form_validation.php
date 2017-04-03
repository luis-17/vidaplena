<?php
$config = array
(   
    //this array key matches what you passed into run()
    'reg_usuario' => array
    (
        array(
            'field' => 'nombres',
            'label' => 'Nombres',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'apellidos',
            'label' => 'Apellidos',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'fechanac',
            'label' => 'Fecha de Nacimiento',
            'rules' => 'required|trim|validDate'
        ),
        array(
            'field' => 'correo',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email'
        ),
        array(
            'field' => 'contrasena',
            'label' => 'Clave',
            'rules' => 'required|trim|min_length[6]'
        )
        // array(
        //     'field' => 'fechanac',
        //     'label' => 'Fecha de Nacimiento',
        //     'rules' => 'required|trim|validDate'
        // )

    )
    //you would add more run() routines here, for separate form submissions.
);