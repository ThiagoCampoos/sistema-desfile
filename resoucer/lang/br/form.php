<?php

return [
    'validation' => [
        'required' => 'O campo é obrigatório.',
        'required_with' => 'O campo é obrigatório quando :values está presente.',
        'required_with_all' => 'O campo é obrigatório quando todos os :values estão presentes.',
        'required_without' => 'O campo é obrigatório quando :values não está presente.',
        'required_without_all' => 'O campo é obrigatório quando nenhum dos :values está presente.',
        'sometimes' => 'O campo é obrigatório em algumas condições específicas.',
        'string' => 'O campo deve ser um texto.',
        'max' => [
            'numeric' => 'O campo não pode ser maior que :max.',
            'file' => 'O arquivo não pode ter mais de :max kilobytes.',
            'string' => 'O campo não pode ter mais de :max caracteres.',
            'array' => 'O campo não pode ter mais de :max itens.',
        ],
        'min' => [
            'numeric' => 'O campo deve ser no mínimo :min.',
            'file' => 'O arquivo deve ter no mínimo :min kilobytes.',
            'string' => 'O campo deve ter no mínimo :min caracteres.',
            'array' => 'O campo deve ter no mínimo :min itens.',
        ],
        'size' => [
            'numeric' => 'O campo deve ter o tamanho :size.',
            'file' => 'O arquivo deve ter :size kilobytes.',
            'string' => 'O campo deve ter :size caracteres.',
            'array' => 'O campo deve conter :size itens.',
        ],
        'email' => 'O campo deve ser um endereço de email válido.',
        'unique' => 'O valor do campo já está em uso.',
        'confirmed' => 'A confirmação do campo não corresponde.',
        'date' => 'O campo deve ser uma data válida.',
        'date_format' => 'O campo não corresponde ao formato :format.',
        'exists' => 'O campo deve ser um valor existente.',
        'in' => 'O campo deve ser um dos seguintes valores: :values.',
        'integer' => 'O campo deve ser um número inteiro.',
        'numeric' => 'O campo deve ser um número.',
        'boolean' => 'O campo deve ser verdadeiro ou falso.',
        'array' => 'O campo deve ser uma lista.',
        'file' => 'O campo deve ser um arquivo.',
        'image' => 'O campo deve ser uma imagem.',
        'mimes' => 'O campo deve ser um arquivo do tipo: :values.',
        'mimetypes' => 'O campo deve ser um arquivo do tipo: :values.',
        'url' => 'O campo deve ser uma URL válida.',
        'active_url' => 'O campo não é uma URL ativa.',
        'alpha' => 'O campo deve conter apenas letras.',
        'alpha_dash' => 'O campo deve conter apenas letras, números e traços.',
        'alpha_num' => 'O campo deve conter apenas letras e números.',
        'json' => 'O campo deve ser uma string JSON válida.',
        'timezone' => 'O campo deve ser um fuso horário válido.',
    ],
];
