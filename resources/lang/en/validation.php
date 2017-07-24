<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El/La following language lines contain El/La default error messages used by
    | El/La validator class. Some of El/Lase rules have multiple versions such
    | as El/La size rules. Feel free to tweak each of El/Lase messages here.
    |
    */

    'accepted'             => 'El/La :attribute debe ser acceptado.',
    'active_url'           => 'El/La :attribute no es un URL válido.',
    'after'                => 'El/La :attribute debe ser una fecha despues de :date.',
    'after_or_equal'       => 'El/La :attribute debe ser una fecha igual o después a :date.',
    'alpha'                => 'El/La :attribute unicamente puede contener letras.',
    'alpha_dash'           => 'El/La :attribute unicamente puede contener letras, números, y guiones.',
    'alpha_num'            => 'El/La :attribute unicamente puede contener letras y números.',
    'array'                => 'El/La :attribute debe ser un arreglo.',
    'before'               => 'El/La :attribute debe ser una fecha antes de :date.',
    'before_or_equal'      => 'El/La :attribute debe ser una fecha igual o después a  :date.',
    'between'              => [
        'numeric' => 'El/La :attribute debe estar entre :min y :max.',
        'file'    => 'El/La :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El/La :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El/La :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El/La :attribute No marcó la confirmación.',
    'date'                 => 'El/La :attribute no es una fecha válida.',
    'date_format'          => 'El/La :attribute no marca el formato :format.',
    'different'            => 'El/La :attribute y :other debe ser diferente.',
    'digits'               => 'El/La :attribute debe ser :digits dígitos.',
    'digits_between'       => 'El/La :attribute debe estar entre :min y :max dígitos.',
    'dimensions'           => 'El/La :attribute imagen con dimensiones no válidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El/La :attribute debe ser un correo válido.',
    'exists'               => 'El/La selected :attribute es incorrecto.',
    'file'                 => 'El/La :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'image'                => 'El/La :attribute debe ser una imagen.',
    'in'                   => 'El/La selected :attribute es incorrecto.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El/La :attribute debe ser un entero.',
    'ip'                   => 'El/La :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El/La :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El/La :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El/La :attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El/La :attribute no puede ser mayor que :max.',
        'file'    => 'El/La :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El/La :attribute no puede ser mayor que :max caracteres.',
        'array'   => 'El/La :attribute may not have more than :max items.',
    ],
    'mimes'                => 'El/La :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El/La :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El/La :attribute debe tener al menos :min.',
        'file'    => 'El/La :attribute debe tener al menos :min kilobytes.',
        'string'  => 'El/La :attribute debe tener al menos :min caracteres.',
        'array'   => 'El/La :attribute debe haber al menos :min items.',
    ],
    'not_in'               => 'El/La :attribute seleccionado no es válido.',
    'numeric'              => 'El/La :attribute debe ser a número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El/La :attribute formato es inválido.',
    'required'             => 'El campo :attribute es obligatiorio.',
    'required_if'          => 'El campo :attribute obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute obligatorio a no ser que :other sea :values.',
    'required_with'        => 'El/La :attribute field is required when :values is present.',
    'required_with_all'    => 'El/La :attribute field is required when :values is present.',
    'required_without'     => 'El/La :attribute field is required when :values is not present.',
    'required_without_all' => 'El/La :attribute field is required when none of :values are present.',
    'same'                 => 'El/La :attribute and :oEl/Lar must match.',
    'size'                 => [
        'numeric' => 'El/La :attribute debe ser :size.',
        'file'    => 'El/La :attribute debe ser :size kilobytes.',
        'string'  => 'El/La :attribute debe ser :size caracteres.',
        'array'   => 'El/La :attribute debe contener :size items.',
    ],
    'string'               => 'El/La :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El/La :attribute debe ser una zona válida.',
    'unique'               => 'El/La :attribute ya se ha usado.',
    'uploaded'             => 'El/La :attribute falló la subida.',
    'url'                  => 'El/La :attribute el formato es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using El/La
    | convention "attribute.rule" to name El/La lines. This makes it quick to
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
    | El/La following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
