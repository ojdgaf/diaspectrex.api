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

        'trees' => [
            'child' => [],
            'adult' => [
                'bronchitis' => [
                    'endpoint' => [
                        'MLModelId'       => 'ml-MsqH0SFgckb',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                    ],
                ],
                'pneumonia' => [
                    'endpoint' => [
                        'MLModelId'       => 'ml-J9bd1OQW3O1',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                    ],
                ],
                'standard' => [
                    'endpoint' => [
                        'MLModelId'       => 'ml-Wxp861rELAy',
                        'PredictEndpoint' => 'https://realtime.machinelearning.eu-west-1.amazonaws.com',
                    ],
                ],
            ],
        ],
    ],


];