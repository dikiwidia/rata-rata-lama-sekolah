<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\RRLamaSekolah\Models\Bantenprov\RRLamaSekolah\RRLamaSekolah;

class BantenprovRRLamaSekolahSeederRRLamaSekolah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $rr_lama_sekolahs = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($rr_lama_sekolahs as $rr_lama_sekolah) {
            $model = RRLamaSekolah::updateOrCreate(
                [
                    'label' => $rr_lama_sekolah->label,
                ],
                [
                    'description' => $rr_lama_sekolah->description,
                ]
            );
            $model->save();
        }
	}
}
