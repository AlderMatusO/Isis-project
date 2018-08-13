<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El/La :attribute debe ser aceptado.',
    'active_url'           => 'El/La :attribute no es un URL valido.',
    'after'                => 'El/La :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El/La :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El/La :attribute solo puede contener letras.',
    'alpha_dash'           => 'El/La :attribute solo puede contener letras, números, y guiónes.',
    'alpha_num'            => 'El/La :attribute solo puede contener letras y números.',
    'array'                => 'El/La :attribute debe ser un arreglo.',
    'before'               => 'El/La :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El/La :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El/La :attribute debe estar entre :min y :max.',
        'file'    => 'El/La :attribute debe ser de entre :min y :max kilobytes.',
        'string'  => 'El/La :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El/La :attribute debe contener entre :min y :max artículos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero or falso.',
    'confirmed'            => 'La confirmación :attribute no concuerda.',
    'date'                 => 'El/La :attribute no es una fecha válida.',
    'date_format'          => 'El/La :attribute no concuerda con el formato :format.',
    'different'            => 'El/La :attribute y :other deben ser diferente.',
    'digits'               => 'El/La :attribute debe ser de :digits digitos.',
    'digits_between'       => 'El/La :attribute debe contener entre :min y :max digitos.',
    'dimensions'           => 'El/La :attribute tiene dimensiones de imágen inválida.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El/La :attribute debe ser una dirección de correo válida.',
    'exists'               => 'El/La :attribute seleccionado(a) es invalido(a).',
    'file'                 => 'El/La :attribute debe ser un archivo.',
    'filled'               => 'El field :attribute debe tener al menos un valor.',
    'gt'                   => [
        'numeric' => 'El/La :attribute debe ser mayor que :value.',
        'file'    => 'El/La :attribute debe ser mayor a :value kilobytes.',
        'string'  => 'El/La :attribute debe contener más de :value caracteres.',
        'array'   => 'El/La :attribute debe tener más de :value artículos.',
    ],
    'gte'                  => [
        'numeric' => 'El/La :attribute debe ser mayor o igual a :value.',
        'file'    => 'El/La :attribute debe ser mayor o igual a :value kilobytes.',
        'string'  => 'El/La :attribute debe contener almenos :value caracteres.',
        'array'   => 'El/La :attribute debe tener :value o más artículos.',
    ],
    'image'                => 'El/La :attribute debe ser una imágen.',
    'in'                   => 'El/La :attribute seleccionado(a) es invalido(a).',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El/La :attribute debe ser un entero.',
    'ip'                   => 'El/La :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El/La :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El/La :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El/La :attribute debe ser una cadena JSON válida.',
    'lt'                   => [
        'numeric' => 'El/La :attribute debe ser menor que :value.',
        'file'    => 'El/La :attribute debe ser menor a :value kilobytes.',
        'string'  => 'El/La :attribute debe contener menos de :value caracteres.',
        'array'   => 'El/La :attribute debe contener menos de :value artículos.',
    ],
    'lte'                  => [
        'numeric' => 'El/La :attribute debe ser menor o igual a :value.',
        'file'    => 'El/La :attribute debe ser menor o igual a :value kilobytes.',
        'string'  => 'El/La :attribute debe contener :value o menos caracteres.',
        'array'   => 'El/La :attribute no debe contener más de :value artículos.',
    ],
    'max'                  => [
        'numeric' => 'El/La :attribute no puede ser mayor que :max.',
        'file'    => 'El/La :attribute no puede ser mayor a :max kilobytes.',
        'string'  => 'El/La :attribute no puede contener más de :max caracteres.',
        'array'   => 'El/La :attribute no puede contener más de :max artículos.',
    ],
    'mimes'                => 'El/La :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El/La :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El/La :attribute debe ser al menos :min.',
        'file'    => 'El/La :attribute debe ser de al menos :min kilobytes.',
        'string'  => 'El/La :attribute debe contener al menos :min caracteres.',
        'array'   => 'El/La :attribute debe contener al menos :min artículos.',
    ],
    'not_in'               => 'El/La :attribute seleccionado(a) es invalido(a).',
    'not_regex'            => 'El formato :attribute es invalido.',
    'numeric'              => 'El/La :attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato :attribute es invalido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values estén presentes.',
    'required_with_all'    => 'El campo :attribute es requerido cuando :values estén presentes.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no estén presentes.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values estén presentes.',
    'same'                 => 'El/La :attribute and :other debe  match.',
    'size'                 => [
        'numeric' => 'El/La :attribute debe ser de tamaño :size.',
        'file'    => 'El/La :attribute debe ser de :size kilobytes.',
        'string'  => 'El/La :attribute debe contener :size caracteres.',
        'array'   => 'El/La :attribute debe contener :size artículos.',
    ],
    'string'               => 'El/La :attribute debe ser una cadena.',
    'timezone'             => 'El/La :attribute debe ser una zona válida.',
    'unique'               => 'El/La :attribute ya ha sido tomado(a).',
    'uploaded'             => 'El/La :attribute falló en cargar.',
    'url'                  => 'El formato :attribute es invalido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you can specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
