<?php

use App\Core\DocStatus;
use App\Models\Services;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('header')->nullable();
            $table->string('subheader')->nullable();
            $table->text('list')->default(json_encode([
               'translations' => [
                'es' => [
                    'values'=> [],
                ],
                'en' => [
                    'values'=> [],
                ],
               ]

            ]));
            $table->text('trans')->default(json_encode([
                'translations' => [
                    'es' => [
                        'title' => '',
                        'header' => '',
                        'subheader' => '',
                    ],
                    'en' => [
                        'title' => '',
                        'header' => '',
                        'subheader' => '',
                    ],
                ]
            ]));
            $table->text('picture')->nullable();
            $table->string(DocStatus::COLUMN_NAME, DocStatus::LENGTH_COL)->default(DocStatus::ACTIVE);
            $table->timestamps();
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }

    private function insertData()
    {
        $date = now();

        $data = [
            [
                'title' => 'LIMPIEZA RESIDENCIAL ESTÁNDAR',
                'header' => '',
                'subheader' => '',
                'list' => json_encode([
                    'translations' => [
                        'es' => [
                            'values' => [
                                ['title' => 'Limpieza de baños (lavamanos, inodoros, duchas, espejos)', 'is_active' => true, 'order' => 1],
                                ['title' => 'Aspirado y fregado de pisos', 'is_active' => true, 'order' => 2],
                                ['title' => 'Limpieza de cocina (superficies, microondas exterior, fregadero)', 'is_active' => true, 'order' => 3],
                                ['title' => 'Limpieza de polvo en muebles, marcos, y superficies', 'is_active' => true, 'order' => 4],
                                ['title' => 'Sacar la basura', 'is_active' => true, 'order' => 5]
                            ],
                        ],
                        'en' => [
                            'values' => [
                                ['title' => 'Bathroom cleaning (sinks, toilets, showers, mirrors)', 'is_active' => true, 'order' => 1],
                                ['title' => 'Vacuuming and mopping floors', 'is_active' => true, 'order' => 2],
                                ['title' => 'Kitchen cleaning (surfaces, exterior microwave, sink)', 'is_active' => true, 'order' => 3],
                                ['title' => 'Dusting furniture, frames, and surfaces', 'is_active' => true, 'order' => 4],
                                ['title' => 'Taking out the trash', 'is_active' => true, 'order' => 5]
                            ],
                        ],
                    ]
                ]),
                'trans' => json_encode([
                    'translations' => [
                        'es' => [
                            'title' => 'LIMPIEZA RESIDENCIAL ESTÁNDAR',
                            'header' => '',
                            'subheader' => '',
                        ],
                        'en' => [
                            'title' => 'STANDARD RESIDENTIAL CLEANING',
                            'header' => '',
                            'subheader' => '',
                        ],
                    ]
                ])
            ],
            [
                'title' => 'LIMPIEZA PROFUNDA',
                'header' => 'Incluye lo del servicio estándar.',
                'subheader' => '',
                'list' => json_encode([
                    'translations' => [
                        'es' => [
                            'values' => [
                                ['title' => 'Limpieza de baños (lavamanos, inodoros, duchas, espejos)', 'is_active' => true, 'order' => 1],
                                ['title' => 'Aspirado y fregado de pisos', 'is_active' => true, 'order' => 2],
                                ['title' => 'Limpieza de cocina (superficies, microondas exterior, fregadero)', 'is_active' => true, 'order' => 3],
                                ['title' => 'Limpieza de polvo en muebles, marcos, y superficies', 'is_active' => true, 'order' => 4],
                                ['title' => 'Sacar la basura', 'is_active' => true, 'order' => 5],
                                ['title' => 'Limpieza profunda de cocina (interior de microondas, hornos y refrigeradores si se solicita)', 'is_active' => true, 'order' => 6],
                                ['title' => 'Limpieza de ventilaciones, persianas, y detrás de muebles', 'is_active' => true, 'order' => 7],
                                ['title' => 'Desinfección más detallada de superficies de alto contacto', 'is_active' => true, 'order' => 8],
                            ],
                        ],
                        'en' => [
                            'values' => [
                                ['title' => 'Bathroom cleaning (sinks, toilets, showers, mirrors)', 'is_active' => true, 'order' => 1],
                                ['title' => 'Vacuuming and mopping floors', 'is_active' => true, 'order' => 2],
                                ['title' => 'Kitchen cleaning (surfaces, exterior microwave, sink)', 'is_active' => true, 'order' => 3],
                                ['title' => 'Dusting furniture, frames, and surfaces', 'is_active' => true, 'order' => 4],
                                ['title' => 'Taking out the trash', 'is_active' => true, 'order' => 5],
                                ['title' => 'Deep kitchen cleaning (interior of microwave, ovens, and refrigerators if requested)', 'is_active' => true, 'order' => 6],
                                ['title' => 'Cleaning vents, blinds, and behind furniture', 'is_active' => true, 'order' => 7],
                                ['title' => 'More detailed disinfection of high-touch surfaces', 'is_active' => true, 'order' => 8],
                            ],
                        ],
                    ]
                ]),
                'trans' => json_encode([
                    'translations' => [
                        'es' => [
                            'title' => 'LIMPIEZA PROFUNDA',
                            'header' => 'Incluye lo del servicio estándar.',
                            'subheader' => '',
                        ],
                        'en' => [
                            'title' => 'DEEP CLEANING',
                            'header' => 'Includes standard service.',
                            'subheader' => '',
                        ],
                    ]
                ])
            ],
            [
                'title' => 'LIMPIEZA DE MUDANZA',
                'header' => 'Servicio completo para casas vacías.',
                'subheader' => '',
                'list' => json_encode([
                    'translations' => [
                        'es' => [
                            'values' => [
                                ['title' => 'Limpieza interna de gabinetes y electrodomésticos', 'is_active' => true, 'order' => 1],
                                ['title' => 'Limpieza de armarios, puertas y ventanas', 'is_active' => true, 'order' => 2],
                                ['title' => 'Eliminación de residuos', 'is_active' => true, 'order' => 3],
                            ],
                        ],
                        'en' => [
                            'values' => [
                                ['title' => 'Internal cleaning of cabinets and appliances', 'is_active' => true, 'order' => 1],
                                ['title' => 'Cleaning of closets, doors, and windows', 'is_active' => true, 'order' => 2],
                                ['title' => 'Waste removal', 'is_active' => true, 'order' => 3],
                            ],
                        ],
                    ]
                ]),
                'trans' => json_encode([
                    'translations' => [
                        'es' => [
                            'title' => 'LIMPIEZA DE MUDANZA',
                            'header' => 'Servicio completo para casas vacías.',
                            'subheader' => '',
                        ],
                        'en' => [
                            'title' => 'MOVE-OUT CLEANING',
                            'header' => 'Complete service for empty houses.',
                            'subheader' => '',
                        ],
                    ]
                ])
            ],
            [
                'title' => 'LIMPIEZA DE DRIVEWAY',
                'header' => '',
                'subheader' => '',
                'list' => json_encode([
                    'translations' => [
                        'es' => [
                            'values' => [
                                ['title' => 'Barrido y preparación inicial', 'is_active' => true, 'order' => 1],
                                ['title' => 'Aplicación de detergente/desengrasante', 'is_active' => true, 'order' => 2],
                                ['title' => 'Lavado a presión (power washing)', 'is_active' => true, 'order' => 3],
                                ['title' => 'Tratamiento antimanchas y sellado (opcional por valor adicional)', 'is_active' => false, 'order' => 4],
                            ],
                        ],
                        'en' => [
                            'values' => [
                                ['title' => 'Sweeping and initial preparation', 'is_active' => true, 'order' => 1],
                                ['title' => 'Detergent/degreaser application', 'is_active' => true, 'order' => 2],
                                ['title' => 'Pressure washing', 'is_active' => true, 'order' => 3],
                                ['title' => 'Stain treatment and sealing (optional for additional cost)', 'is_active' => false, 'order' => 4],
                            ],
                        ],
                    ]
                ]),
                'trans' => json_encode([
                    'translations' => [
                        'es' => [
                            'title' => 'LIMPIEZA DE DRIVEWAY',
                            'header' => '',
                            'subheader' => '',
                        ],
                        'en' => [
                            'title' => 'DRIVEWAY CLEANING',
                            'header' => '',
                            'subheader' => '',
                        ],
                    ]
                ])
            ],
            [
                'title' => 'SERVICIOS ADICIONALES',
                'header' => '',
                'subheader' => '',
                'list' => json_encode([
                    'translations' => [
                        'es' => [
                            'values' => [
                                ['title' => 'Limpieza de ventanas interiores', 'is_active' => true, 'order' => 1],
                                ['title' => 'Limpieza de interiores de horno/refrigerador', 'is_active' => true, 'order' => 2],
                                ['title' => 'Lavado de ropa y cambio de sábanas', 'is_active' => true, 'order' => 3],
                                ['title' => 'Organización de armarios o espacios pequeños', 'is_active' => true, 'order' => 4],
                                ['title' => 'Aromatización ambiental natural', 'is_active' => true, 'order' => 5],
                                ['title' => 'Limpieza en hogares con mascotas', 'is_active' => true, 'order' => 6],
                                ['title' => 'Otros personalizados por cliente', 'is_active' => true, 'order' => 7],
                            ],
                        ],
                        'en' => [
                            'values' => [
                                ['title' => 'Interior window cleaning', 'is_active' => true, 'order' => 1],
                                ['title' => 'Interior oven/refrigerator cleaning', 'is_active' => true, 'order' => 2],
                                ['title' => 'Laundry and bed linen change', 'is_active' => true, 'order' => 3],
                                ['title' => 'Organization of closets or small spaces', 'is_active' => true, 'order' => 4],
                                ['title' => 'Natural ambient aromatization', 'is_active' => true, 'order' => 5],
                                ['title' => 'Cleaning in homes with pets', 'is_active' => true, 'order' => 6],
                                ['title' => 'Other customized services per client', 'is_active' => true, 'order' => 7],
                            ],
                        ],
                    ]
                ]),
                'trans' => json_encode([
                    'translations' => [
                        'es' => [
                            'title' => 'SERVICIOS ADICIONALES',
                            'header' => '',
                            'subheader' => '',
                        ],
                        'en' => [
                            'title' => 'ADDITIONAL SERVICES',
                            'header' => '',
                            'subheader' => '',
                        ],
                    ]
                ])
            ],
        ];

        foreach ($data as $key => $value) {
            $data[$key]['created_at'] = $date;
            $data[$key]['updated_at'] = $date;
        }
        Services::insert($data);
    }
};
