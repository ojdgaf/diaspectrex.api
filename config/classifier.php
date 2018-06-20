<?php

return [
    'aws machine learning' => [
        'client' => [
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
            'version'     => 'latest',
            'region'      => 'eu-west-1',
        ],

        'types' => [
            'child' => [
                'groups' => [],
            ],
            'adult' => [
                'groups' => [
                    'bronchitis' => [
                        'MLModelId'       => 'ml-MsqH0SFgckb',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                        'EvaluationId'    => 'ev-8yuVXm5nyBu',
                    ],
                    'pneumonia'  => [
                        'MLModelId'       => 'ml-J9bd1OQW3O1',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                        'EvaluationId'    => 'ev-2gGbdjg44FM',
                    ],
                    'standard'   => [
                        'MLModelId'       => 'ml-Wxp861rELAy',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                        'EvaluationId'    => 'ev-DOKUC1kD2qa',
                    ],
                ],
            ],
        ],
    ],

    'discriminant analysis' => [

        'types' => [
            'child' => [
                'selection' => ['selection', 'for', 'children'],
                'groups'    => [
                    'standard'   => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                    'bronchitis' => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                    'pneumonia'  => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                ],
            ],
            'adult' => [
                'selection' => ['selection', 'for', 'adults'],
                'groups'    => [
                    'standard'   => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                    'bronchitis' => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                    'pneumonia'  => [
                        'constant'     => 0,
                        'coefficients' => [],
                    ],
                ],
            ],
        ],
    ],
];