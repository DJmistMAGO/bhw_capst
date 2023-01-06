<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Resident;
use App\Models\Household;
use PhpOffice\PhpWord\TemplateProcessor;

class PurokExport extends Component
{
    public const TEMPLATE_PATH_sum = 'docx/SURVEY_SUMMARY_BARANGAY.docx';

    public function export()
    {
        $path = storage_path(self::TEMPLATE_PATH_sum);
        $templateProcessor = new TemplateProcessor($path);

        $households = Household::with('residents')->get();
        $residents = Resident::all();

        $households = $households->sortBy('purok');
        $households_purok1 = $households->where('purok', 'Purok 1');
        $households_purok2 = $households->where('purok', 'Purok 2');
        $households_purok3 = $households->where('purok', 'Purok 3');
        $households_purok4 = $households->where('purok', 'Purok 4');
        $households_purok5 = $households->where('purok', 'Purok 5');
        $households_sitio = $households->where('purok', 'Sitio Matanac');

        $res_p1 = $households_purok1->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p2 = $households_purok2->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p3 = $households_purok3->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p4 = $households_purok4->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p5 = $households_purok5->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_sitio = $households_sitio->map(function ($household) {
            return $household->residents->count();
        })->sum();


        $templateProcessor->setValue('p1_pop', $res_p1);
        $templateProcessor->setValue('p2_pop', $res_p2);
        $templateProcessor->setValue('p3_pop', $res_p3);
        $templateProcessor->setValue('p4_pop', $res_p4);
        $templateProcessor->setValue('p5_pop', $res_p5);
        $templateProcessor->setValue('s_pop', $res_sitio);

        $templateProcessor->setValue('p1_hCount', $households_purok1->count());
        $templateProcessor->setValue('p2_hCount', $households_purok2->count());
        $templateProcessor->setValue('p3_hCount', $households_purok3->count());
        $templateProcessor->setValue('p4_hCount', $households_purok4->count());
        $templateProcessor->setValue('p5_hCount', $households_purok5->count());
        $templateProcessor->setValue('s_hCount', $households_sitio->count());

        // count male residents in each purok and set value
        $male_p1 = $households_purok1->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        $male_p2 = $households_purok2->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        $male_p3 = $households_purok3->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        $male_p4 = $households_purok4->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        $male_p5 = $households_purok5->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        $male_sitio = $households_sitio->map(function ($household) {
            return $household->residents->where('gender', 'Male')->count();
        })->sum();

        // count female by purok
        $female_p1 = $households_purok1->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $female_p2 = $households_purok2->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $female_p3 = $households_purok3->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $female_p4 = $households_purok4->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $female_p5 = $households_purok5->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $female_sitio = $households_sitio->map(function ($household) {
            return $household->residents->where('gender', 'Female')->count();
        })->sum();

        $templateProcessor->setValue('p1_mCount', $male_p1);
        $templateProcessor->setValue('p2_mCount', $male_p2);
        $templateProcessor->setValue('p3_mCount', $male_p3);
        $templateProcessor->setValue('p4_mCount', $male_p4);
        $templateProcessor->setValue('p5_mCount', $male_p5);
        $templateProcessor->setValue('s_mCount', $male_sitio);

        $templateProcessor->setValue('p1_fCount', $female_p1);
        $templateProcessor->setValue('p2_fCount', $female_p2);
        $templateProcessor->setValue('p3_fCount', $female_p3);
        $templateProcessor->setValue('p4_fCount', $female_p4);
        $templateProcessor->setValue('p5_fCount', $female_p5);
        $templateProcessor->setValue('s_fCount', $female_sitio);

        $templateProcessor->setValue('p1_fams', $households_purok1->sum('total_fam'));
        $templateProcessor->setValue('p2_fams', $households_purok2->sum('total_fam'));
        $templateProcessor->setValue('p3_fams', $households_purok3->sum('total_fam'));
        $templateProcessor->setValue('p4_fams', $households_purok4->sum('total_fam'));
        $templateProcessor->setValue('p5_fams', $households_purok5->sum('total_fam'));
        $templateProcessor->setValue('s_fams', $households_sitio->sum('total_fam'));

        $templateProcessor->setValue('p1wcr', $households_purok1->where('env_sanitation', 'With CR')->count());
        $templateProcessor->setValue('p2wcr', $households_purok2->where('env_sanitation', 'With CR')->count());
        $templateProcessor->setValue('p3wcr', $households_purok3->where('env_sanitation', 'With CR')->count());
        $templateProcessor->setValue('p4wcr', $households_purok4->where('env_sanitation', 'With CR')->count());
        $templateProcessor->setValue('p5wcr', $households_purok5->where('env_sanitation', 'With CR')->count());
        $templateProcessor->setValue('swcr', $households_sitio->where('env_sanitation', 'With CR')->count());

        $templateProcessor->setValue('p1wocr', $households_purok1->where('env_sanitation', 'Without CR')->count());
        $templateProcessor->setValue('p2wocr', $households_purok2->where('env_sanitation', 'Without CR')->count());
        $templateProcessor->setValue('p3wocr', $households_purok3->where('env_sanitation', 'Without CR')->count());
        $templateProcessor->setValue('p4wocr', $households_purok4->where('env_sanitation', 'Without CR')->count());
        $templateProcessor->setValue('p5wocr', $households_purok5->where('env_sanitation', 'Without CR')->count());
        $templateProcessor->setValue('swocr', $households_sitio->where('env_sanitation', 'Without CR')->count());



        $templateProcessor->setValue('p1a', $households_purok1->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('p1b', $households_purok1->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('p1c', $households_purok1->where('water_source', 'Level 3 - Deep Well')->count());

        $templateProcessor->setValue('p2a', $households_purok2->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('p2b', $households_purok2->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('p2c', $households_purok2->where('water_source', 'Level 3 - Deep Well')->count());

        $templateProcessor->setValue('p3a', $households_purok3->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('p3b', $households_purok3->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('p3c', $households_purok3->where('water_source', 'Level 3 - Deep Well')->count());

        $templateProcessor->setValue('p4a', $households_purok4->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('p4b', $households_purok4->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('p4c', $households_purok4->where('water_source', 'Level 3 - Deep Well')->count());

        $templateProcessor->setValue('p5a', $households_purok5->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('p5b', $households_purok5->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('p5c', $households_purok5->where('water_source', 'Level 3 - Deep Well')->count());

        $templateProcessor->setValue('sa', $households_sitio->where('water_source', 'Level 1 - Faucet')->count());
        $templateProcessor->setValue('sb', $households_sitio->where('water_source', 'Level 2 - Pump')->count());
        $templateProcessor->setValue('sc', $households_sitio->where('water_source', 'Level 3 - Deep Well')->count());


        $templateProcessor->setValue('p1pills', $households_purok1->where('fam_planning', 'Pills')->count());
        $templateProcessor->setValue('p2pills', $households_purok2->where('fam_planning', 'Pills')->count());
        $templateProcessor->setValue('p3pills', $households_purok3->where('fam_planning', 'Pills')->count());
        $templateProcessor->setValue('p4pills', $households_purok4->where('fam_planning', 'Pills')->count());
        $templateProcessor->setValue('p5pills', $households_purok5->where('fam_planning', 'Pills')->count());
        $templateProcessor->setValue('spills', $households_sitio->where('fam_planning', 'Pills')->count());

        $templateProcessor->setValue('p1dmpa', $households_purok1->where('fam_planning', 'DMPA')->count());
        $templateProcessor->setValue('p2dmpa', $households_purok2->where('fam_planning', 'DMPA')->count());
        $templateProcessor->setValue('p3dmpa', $households_purok3->where('fam_planning', 'DMPA')->count());
        $templateProcessor->setValue('p4dmpa', $households_purok4->where('fam_planning', 'DMPA')->count());
        $templateProcessor->setValue('p5dmpa', $households_purok5->where('fam_planning', 'DMPA')->count());
        $templateProcessor->setValue('sdmpa', $households_sitio->where('fam_planning', 'DMPA')->count());

        $templateProcessor->setValue('p1smda', $households_purok1->where('fam_planning', 'SMDA')->count());
        $templateProcessor->setValue('p2smda', $households_purok2->where('fam_planning', 'SMDA')->count());
        $templateProcessor->setValue('p3smda', $households_purok3->where('fam_planning', 'SMDA')->count());
        $templateProcessor->setValue('p4smda', $households_purok4->where('fam_planning', 'SMDA')->count());
        $templateProcessor->setValue('p5smda', $households_purok5->where('fam_planning', 'SMDA')->count());
        $templateProcessor->setValue('ssmda', $households_sitio->where('fam_planning', 'SMDA')->count());

        $templateProcessor->setValue('p1btl', $households_purok1->where('fam_planning', 'BTL')->count());
        $templateProcessor->setValue('p2btl', $households_purok2->where('fam_planning', 'BTL')->count());
        $templateProcessor->setValue('p3btl', $households_purok3->where('fam_planning', 'BTL')->count());
        $templateProcessor->setValue('p4btl', $households_purok4->where('fam_planning', 'BTL')->count());
        $templateProcessor->setValue('p5btl', $households_purok5->where('fam_planning', 'BTL')->count());
        $templateProcessor->setValue('sbtl', $households_sitio->where('fam_planning', 'BTL')->count());

        $templateProcessor->setValue('p1lam', $households_purok1->where('fam_planning', 'LAM')->count());
        $templateProcessor->setValue('p2lam', $households_purok2->where('fam_planning', 'LAM')->count());
        $templateProcessor->setValue('p3lam', $households_purok3->where('fam_planning', 'LAM')->count());
        $templateProcessor->setValue('p4lam', $households_purok4->where('fam_planning', 'LAM')->count());
        $templateProcessor->setValue('p5lam', $households_purok5->where('fam_planning', 'LAM')->count());
        $templateProcessor->setValue('slam', $households_sitio->where('fam_planning', 'LAM')->count());

        $templateProcessor->setValue('p1con', $households_purok1->where('fam_planning', 'CONDOM')->count());
        $templateProcessor->setValue('p2con', $households_purok2->where('fam_planning', 'CONDOM')->count());
        $templateProcessor->setValue('p3con', $households_purok3->where('fam_planning', 'CONDOM')->count());
        $templateProcessor->setValue('p4con', $households_purok4->where('fam_planning', 'CONDOM')->count());
        $templateProcessor->setValue('p5con', $households_purok5->where('fam_planning', 'CONDOM')->count());
        $templateProcessor->setValue('scon', $households_sitio->where('fam_planning', 'CONDOM')->count());

        $templateProcessor->setValue('p1others', $households_purok1->where('fam_planning', 'IUD')->count());
        $templateProcessor->setValue('p2others', $households_purok2->where('fam_planning', 'IUD')->count());
        $templateProcessor->setValue('p3others', $households_purok3->where('fam_planning', 'IUD')->count());
        $templateProcessor->setValue('p4others', $households_purok4->where('fam_planning', 'IUD')->count());
        $templateProcessor->setValue('p5others', $households_purok5->where('fam_planning', 'IUD')->count());
        $templateProcessor->setValue('sothers', $households_sitio->where('fam_planning', 'IUD')->count());

        $templateProcessor->setValue('p1imp', $households_purok1->where('fam_planning', 'IMPLANT')->count());
        $templateProcessor->setValue('p2imp', $households_purok2->where('fam_planning', 'IMPLANT')->count());
        $templateProcessor->setValue('p3imp', $households_purok3->where('fam_planning', 'IMPLANT')->count());
        $templateProcessor->setValue('p4imp', $households_purok4->where('fam_planning', 'IMPLANT')->count());
        $templateProcessor->setValue('p5imp', $households_purok5->where('fam_planning', 'IMPLANT')->count());
        $templateProcessor->setValue('simp', $households_sitio->where('fam_planning', 'IMPLANT')->count());
        // 0-4
        $age1m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });

        // 5-9
        $age2m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });

        // 10-14
        $age3m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });

        // 15-19
        $age4m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });

        // 20-24
        $age5m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });

        // 25-29
        $age6m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });

        // 30-34
        $age7m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });

        // 35-39
        $age8m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });

        // 40-44
        $age9m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });

        // 45-49
        $age10m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });

        // 50-54
        $age11m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });

        // 55-59
        $age12m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });

        // 60-64
        $age13m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });

        // 65-69
        $age14m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });

        // 70 and above
        $age15m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('p1a-m', $age1m_p1);
        $templateProcessor->setValue('p1a-f', $age1f_p1);
        $templateProcessor->setValue('p1a-total', $age1m_p1 + $age1f_p1);
        $templateProcessor->setValue('p1b-m', $age2m_p1);
        $templateProcessor->setValue('p1b-f', $age2f_p1);
        $templateProcessor->setValue('p1b-total', $age2m_p1 + $age2f_p1);
        $templateProcessor->setValue('p1c-m', $age3m_p1);
        $templateProcessor->setValue('p1c-f', $age3f_p1);
        $templateProcessor->setValue('p1c-total', $age3m_p1 + $age3f_p1);
        $templateProcessor->setValue('p1d-m', $age4m_p1);
        $templateProcessor->setValue('p1d-f', $age4f_p1);
        $templateProcessor->setValue('p1d-total', $age4m_p1 + $age4f_p1);
        $templateProcessor->setValue('p1e-m', $age5m_p1);
        $templateProcessor->setValue('p1e-f', $age5f_p1);
        $templateProcessor->setValue('p1e-total', $age5m_p1 + $age5f_p1);
        $templateProcessor->setValue('p1f-m', $age6m_p1);
        $templateProcessor->setValue('p1f-f', $age6f_p1);
        $templateProcessor->setValue('p1f-total', $age6m_p1 + $age6f_p1);
        $templateProcessor->setValue('p1g-m', $age7m_p1);
        $templateProcessor->setValue('p1g-f', $age7f_p1);
        $templateProcessor->setValue('p1g-total', $age7m_p1 + $age7f_p1);
        $templateProcessor->setValue('p1h-m', $age8m_p1);
        $templateProcessor->setValue('p1h-f', $age8f_p1);
        $templateProcessor->setValue('p1h-total', $age8m_p1 + $age8f_p1);
        $templateProcessor->setValue('p1i-m', $age9m_p1);
        $templateProcessor->setValue('p1i-f', $age9f_p1);
        $templateProcessor->setValue('p1i-total', $age9m_p1 + $age9f_p1);
        $templateProcessor->setValue('p1j-m', $age10m_p1);
        $templateProcessor->setValue('p1j-f', $age10f_p1);
        $templateProcessor->setValue('p1j-total', $age10m_p1 + $age10f_p1);
        $templateProcessor->setValue('p1k-m', $age11m_p1);
        $templateProcessor->setValue('p1k-f', $age11f_p1);
        $templateProcessor->setValue('p1k-total', $age11m_p1 + $age11f_p1);
        $templateProcessor->setValue('p1l-m', $age12m_p1);
        $templateProcessor->setValue('p1l-f', $age12f_p1);
        $templateProcessor->setValue('p1l-total', $age12m_p1 + $age12f_p1);
        $templateProcessor->setValue('p1m-m', $age13m_p1);
        $templateProcessor->setValue('p1m-f', $age13f_p1);
        $templateProcessor->setValue('p1m-total', $age13m_p1 + $age13f_p1);
        $templateProcessor->setValue('p1n-m', $age14m_p1);
        $templateProcessor->setValue('p1n-f', $age14f_p1);
        $templateProcessor->setValue('p1n-total', $age14m_p1 + $age14f_p1);
        $templateProcessor->setValue('p1o-m', $age15m_p1);
        $templateProcessor->setValue('p1o-f', $age15f_p1);
        $templateProcessor->setValue('p1o-total', $age15m_p1 + $age15f_p1);
        $templateProcessor->setValue('p1p-m', $male_p1);
        $templateProcessor->setValue('p1p-f', $female_p1);
        $templateProcessor->setValue('p1p-total', $male_p1 + $female_p1);

        // PUROK2
        // 0-4
        $age1m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });

        // 5-9
        $age2m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });

        // 10-14
        $age3m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });

        // 15-19
        $age4m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });

        // 20-24
        $age5m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });

        // 25-29
        $age6m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });

        // 30-34
        $age7m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });

        // 35-39
        $age8m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });

        // 40-44
        $age9m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });

        // 45-49
        $age10m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });

        // 50-54
        $age11m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });

        // 55-59
        $age12m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });

        // 60-64
        $age13m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });

        // 65-69
        $age14m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });

        // 70 and above
        $age15m_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_p2 = $households_purok2->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('p2a-m', $age1m_p2);
        $templateProcessor->setValue('p2a-f', $age1f_p2);
        $templateProcessor->setValue('p2a-total', $age1m_p2 + $age1f_p2);
        $templateProcessor->setValue('p2b-m', $age2m_p2);
        $templateProcessor->setValue('p2b-f', $age2f_p2);
        $templateProcessor->setValue('p2b-total', $age2m_p2 + $age2f_p2);
        $templateProcessor->setValue('p2c-m', $age3m_p2);
        $templateProcessor->setValue('p2c-f', $age3f_p2);
        $templateProcessor->setValue('p2c-total', $age3m_p2 + $age3f_p2);
        $templateProcessor->setValue('p2d-m', $age4m_p2);
        $templateProcessor->setValue('p2d-f', $age4f_p2);
        $templateProcessor->setValue('p2d-total', $age4m_p2 + $age4f_p2);
        $templateProcessor->setValue('p2e-m', $age5m_p2);
        $templateProcessor->setValue('p2e-f', $age5f_p2);
        $templateProcessor->setValue('p2e-total', $age5m_p2 + $age5f_p2);
        $templateProcessor->setValue('p2f-m', $age6m_p2);
        $templateProcessor->setValue('p2f-f', $age6f_p2);
        $templateProcessor->setValue('p2f-total', $age6m_p2 + $age6f_p2);
        $templateProcessor->setValue('p2g-m', $age7m_p2);
        $templateProcessor->setValue('p2g-f', $age7f_p2);
        $templateProcessor->setValue('p2g-total', $age7m_p2 + $age7f_p2);
        $templateProcessor->setValue('p2h-m', $age8m_p2);
        $templateProcessor->setValue('p2h-f', $age8f_p2);
        $templateProcessor->setValue('p2h-total', $age8m_p2 + $age8f_p2);
        $templateProcessor->setValue('p2i-m', $age9m_p2);
        $templateProcessor->setValue('p2i-f', $age9f_p2);
        $templateProcessor->setValue('p2i-total', $age9m_p2 + $age9f_p2);
        $templateProcessor->setValue('p2j-m', $age10m_p2);
        $templateProcessor->setValue('p2j-f', $age10f_p2);
        $templateProcessor->setValue('p2j-total', $age10m_p2 + $age10f_p2);
        $templateProcessor->setValue('p2k-m', $age11m_p2);
        $templateProcessor->setValue('p2k-f', $age11f_p2);
        $templateProcessor->setValue('p2k-total', $age11m_p2 + $age11f_p2);
        $templateProcessor->setValue('p2l-m', $age12m_p2);
        $templateProcessor->setValue('p2l-f', $age12f_p2);
        $templateProcessor->setValue('p2l-total', $age12m_p2 + $age12f_p2);
        $templateProcessor->setValue('p2m-m', $age13m_p2);
        $templateProcessor->setValue('p2m-f', $age13f_p2);
        $templateProcessor->setValue('p2m-total', $age13m_p2 + $age13f_p2);
        $templateProcessor->setValue('p2n-m', $age14m_p2);
        $templateProcessor->setValue('p2n-f', $age14f_p2);
        $templateProcessor->setValue('p2n-total', $age14m_p2 + $age14f_p2);
        $templateProcessor->setValue('p2o-m', $age15m_p2);
        $templateProcessor->setValue('p2o-f', $age15f_p2);
        $templateProcessor->setValue('p2o-total', $age15m_p2 + $age15f_p2);
        $templateProcessor->setValue('p2p-m', $male_p2);
        $templateProcessor->setValue('p2p-f', $female_p2);
        $templateProcessor->setValue('p2p-total', $male_p2 + $female_p2);

        // PUROK3
        $age1m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });
        $age2m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age3m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age4m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age5m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age6m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age7m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age8m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age9m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age10m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age11m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age12m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age13m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age14m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age15m_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_p3 = $households_purok3->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('p3a-m', $age1m_p3);
        $templateProcessor->setValue('p3a-f', $age1f_p3);
        $templateProcessor->setValue('p3a-total', $age1m_p3 + $age1f_p3);
        $templateProcessor->setValue('p3b-m', $age2m_p3);
        $templateProcessor->setValue('p3b-f', $age2f_p3);
        $templateProcessor->setValue('p3b-total', $age2m_p3 + $age2f_p3);
        $templateProcessor->setValue('p3c-m', $age3m_p3);
        $templateProcessor->setValue('p3c-f', $age3f_p3);
        $templateProcessor->setValue('p3c-total', $age3m_p3 + $age3f_p3);
        $templateProcessor->setValue('p3d-m', $age4m_p3);
        $templateProcessor->setValue('p3d-f', $age4f_p3);
        $templateProcessor->setValue('p3d-total', $age4m_p3 + $age4f_p3);
        $templateProcessor->setValue('p3e-m', $age5m_p3);
        $templateProcessor->setValue('p3e-f', $age5f_p3);
        $templateProcessor->setValue('p3e-total', $age5m_p3 + $age5f_p3);
        $templateProcessor->setValue('p3f-m', $age6m_p3);
        $templateProcessor->setValue('p3f-f', $age6f_p3);
        $templateProcessor->setValue('p3f-total', $age6m_p3 + $age6f_p3);
        $templateProcessor->setValue('p3g-m', $age7m_p3);
        $templateProcessor->setValue('p3g-f', $age7f_p3);
        $templateProcessor->setValue('p3g-total', $age7m_p3 + $age7f_p3);
        $templateProcessor->setValue('p3h-m', $age8m_p3);
        $templateProcessor->setValue('p3h-f', $age8f_p3);
        $templateProcessor->setValue('p3h-total', $age8m_p3 + $age8f_p3);
        $templateProcessor->setValue('p3i-m', $age9m_p3);
        $templateProcessor->setValue('p3i-f', $age9f_p3);
        $templateProcessor->setValue('p3i-total', $age9m_p3 + $age9f_p3);
        $templateProcessor->setValue('p3j-m', $age10m_p3);
        $templateProcessor->setValue('p3j-f', $age10f_p3);
        $templateProcessor->setValue('p3j-total', $age10m_p3 + $age10f_p3);
        $templateProcessor->setValue('p3k-m', $age11m_p3);
        $templateProcessor->setValue('p3k-f', $age11f_p3);
        $templateProcessor->setValue('p3k-total', $age11m_p3 + $age11f_p3);
        $templateProcessor->setValue('p3l-m', $age12m_p3);
        $templateProcessor->setValue('p3l-f', $age12f_p3);
        $templateProcessor->setValue('p3l-total', $age12m_p3 + $age12f_p3);
        $templateProcessor->setValue('p3m-m', $age13m_p3);
        $templateProcessor->setValue('p3m-f', $age13f_p3);
        $templateProcessor->setValue('p3m-total', $age13m_p3 + $age13f_p3);
        $templateProcessor->setValue('p3n-m', $age14m_p3);
        $templateProcessor->setValue('p3n-f', $age14f_p3);
        $templateProcessor->setValue('p3n-total', $age14m_p3 + $age14f_p3);
        $templateProcessor->setValue('p3o-m', $age15m_p3);
        $templateProcessor->setValue('p3o-f', $age15f_p3);
        $templateProcessor->setValue('p3o-total', $age15m_p3 + $age15f_p3);
        $templateProcessor->setValue('p3p-m', $male_p3);
        $templateProcessor->setValue('p3p-f', $female_p3);
        $templateProcessor->setValue('p3p-total', $male_p3 + $female_p3);

        // PUROK4
        $age1m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });
        $age2m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age3m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age4m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age5m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age6m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age7m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age8m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age9m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age10m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age11m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age12m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age13m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age14m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age15m_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_p4 = $households_purok4->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('p4a-m', $age1m_p4);
        $templateProcessor->setValue('p4a-f', $age1f_p4);
        $templateProcessor->setValue('p4a-total', $age1m_p4 + $age1f_p4);
        $templateProcessor->setValue('p4b-m', $age2m_p4);
        $templateProcessor->setValue('p4b-f', $age2f_p4);
        $templateProcessor->setValue('p4b-total', $age2m_p4 + $age2f_p4);
        $templateProcessor->setValue('p4c-m', $age3m_p4);
        $templateProcessor->setValue('p4c-f', $age3f_p4);
        $templateProcessor->setValue('p4c-total', $age3m_p4 + $age3f_p4);
        $templateProcessor->setValue('p4d-m', $age4m_p4);
        $templateProcessor->setValue('p4d-f', $age4f_p4);
        $templateProcessor->setValue('p4d-total', $age4m_p4 + $age4f_p4);
        $templateProcessor->setValue('p4e-m', $age5m_p4);
        $templateProcessor->setValue('p4e-f', $age5f_p4);
        $templateProcessor->setValue('p4e-total', $age5m_p4 + $age5f_p4);
        $templateProcessor->setValue('p4f-m', $age6m_p4);
        $templateProcessor->setValue('p4f-f', $age6f_p4);
        $templateProcessor->setValue('p4f-total', $age6m_p4 + $age6f_p4);
        $templateProcessor->setValue('p4g-m', $age7m_p4);
        $templateProcessor->setValue('p4g-f', $age7f_p4);
        $templateProcessor->setValue('p4g-total', $age7m_p4 + $age7f_p4);
        $templateProcessor->setValue('p4h-m', $age8m_p4);
        $templateProcessor->setValue('p4h-f', $age8f_p4);
        $templateProcessor->setValue('p4h-total', $age8m_p4 + $age8f_p4);
        $templateProcessor->setValue('p4i-m', $age9m_p4);
        $templateProcessor->setValue('p4i-f', $age9f_p4);
        $templateProcessor->setValue('p4i-total', $age9m_p4 + $age9f_p4);
        $templateProcessor->setValue('p4j-m', $age10m_p4);
        $templateProcessor->setValue('p4j-f', $age10f_p4);
        $templateProcessor->setValue('p4j-total', $age10m_p4 + $age10f_p4);
        $templateProcessor->setValue('p4k-m', $age11m_p4);
        $templateProcessor->setValue('p4k-f', $age11f_p4);
        $templateProcessor->setValue('p4k-total', $age11m_p4 + $age11f_p4);
        $templateProcessor->setValue('p4l-m', $age12m_p4);
        $templateProcessor->setValue('p4l-f', $age12f_p4);
        $templateProcessor->setValue('p4l-total', $age12m_p4 + $age12f_p4);
        $templateProcessor->setValue('p4m-m', $age13m_p4);
        $templateProcessor->setValue('p4m-f', $age13f_p4);
        $templateProcessor->setValue('p4m-total', $age13m_p4 + $age13f_p4);
        $templateProcessor->setValue('p4n-m', $age14m_p4);
        $templateProcessor->setValue('p4n-f', $age14f_p4);
        $templateProcessor->setValue('p4n-total', $age14m_p4 + $age14f_p4);
        $templateProcessor->setValue('p4o-m', $age15m_p4);
        $templateProcessor->setValue('p4o-f', $age15f_p4);
        $templateProcessor->setValue('p4o-total', $age15m_p4 + $age15f_p4);
        $templateProcessor->setValue('p4p-m', $male_p4);
        $templateProcessor->setValue('p4p-f', $female_p4);
        $templateProcessor->setValue('p4p-total', $male_p4 + $female_p4);

        // PUROK5
        $age1m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });
        $age2m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age3m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age4m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age5m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age6m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age7m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age8m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age9m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age10m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age11m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age12m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age13m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age14m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age15m_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_p5 = $households_purok5->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('p5a-m', $age1m_p5);
        $templateProcessor->setValue('p5a-f', $age1f_p5);
        $templateProcessor->setValue('p5a-total', $age1m_p5 + $age1f_p5);
        $templateProcessor->setValue('p5b-m', $age2m_p5);
        $templateProcessor->setValue('p5b-f', $age2f_p5);
        $templateProcessor->setValue('p5b-total', $age2m_p5 + $age2f_p5);
        $templateProcessor->setValue('p5c-m', $age3m_p5);
        $templateProcessor->setValue('p5c-f', $age3f_p5);
        $templateProcessor->setValue('p5c-total', $age3m_p5 + $age3f_p5);
        $templateProcessor->setValue('p5d-m', $age4m_p5);
        $templateProcessor->setValue('p5d-f', $age4f_p5);
        $templateProcessor->setValue('p5d-total', $age4m_p5 + $age4f_p5);
        $templateProcessor->setValue('p5e-m', $age5m_p5);
        $templateProcessor->setValue('p5e-f', $age5f_p5);
        $templateProcessor->setValue('p5e-total', $age5m_p5 + $age5f_p5);
        $templateProcessor->setValue('p5f-m', $age6m_p5);
        $templateProcessor->setValue('p5f-f', $age6f_p5);
        $templateProcessor->setValue('p5f-total', $age6m_p5 + $age6f_p5);
        $templateProcessor->setValue('p5g-m', $age7m_p5);
        $templateProcessor->setValue('p5g-f', $age7f_p5);
        $templateProcessor->setValue('p5g-total', $age7m_p5 + $age7f_p5);
        $templateProcessor->setValue('p5h-m', $age8m_p5);
        $templateProcessor->setValue('p5h-f', $age8f_p5);
        $templateProcessor->setValue('p5h-total', $age8m_p5 + $age8f_p5);
        $templateProcessor->setValue('p5i-m', $age9m_p5);
        $templateProcessor->setValue('p5i-f', $age9f_p5);
        $templateProcessor->setValue('p5i-total', $age9m_p5 + $age9f_p5);
        $templateProcessor->setValue('p5j-m', $age10m_p5);
        $templateProcessor->setValue('p5j-f', $age10f_p5);
        $templateProcessor->setValue('p5j-total', $age10m_p5 + $age10f_p5);
        $templateProcessor->setValue('p5k-m', $age11m_p5);
        $templateProcessor->setValue('p5k-f', $age11f_p5);
        $templateProcessor->setValue('p5k-total', $age11m_p5 + $age11f_p5);
        $templateProcessor->setValue('p5l-m', $age12m_p5);
        $templateProcessor->setValue('p5l-f', $age12f_p5);
        $templateProcessor->setValue('p5l-total', $age12m_p5 + $age12f_p5);
        $templateProcessor->setValue('p5m-m', $age13m_p5);
        $templateProcessor->setValue('p5m-f', $age13f_p5);
        $templateProcessor->setValue('p5m-total', $age13m_p5 + $age13f_p5);
        $templateProcessor->setValue('p5n-m', $age14m_p5);
        $templateProcessor->setValue('p5n-f', $age14f_p5);
        $templateProcessor->setValue('p5n-total', $age14m_p5 + $age14f_p5);
        $templateProcessor->setValue('p5o-m', $age15m_p5);
        $templateProcessor->setValue('p5o-f', $age15f_p5);
        $templateProcessor->setValue('p5o-total', $age15m_p5 + $age15f_p5);
        $templateProcessor->setValue('p5p-m', $male_p5);
        $templateProcessor->setValue('p5p-f', $female_p5);
        $templateProcessor->setValue('p5p-total', $male_p5 + $female_p5);

        // PUROK5
        $age1m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });
        $age2m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age3m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age4m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age4f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 15)->where('age', '<=', 19)->count();
        });
        $age5m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age5f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 20)->where('age', '<=', 24)->count();
        });
        $age6m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age6f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 25)->where('age', '<=', 29)->count();
        });
        $age7m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age7f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 30)->where('age', '<=', 34)->count();
        });
        $age8m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age8f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 35)->where('age', '<=', 39)->count();
        });
        $age9m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age9f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 40)->where('age', '<=', 44)->count();
        });
        $age10m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age10f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 45)->where('age', '<=', 49)->count();
        });
        $age11m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age11f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 50)->where('age', '<=', 54)->count();
        });
        $age12m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age12f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 55)->where('age', '<=', 59)->count();
        });
        $age13m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age13f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 60)->where('age', '<=', 64)->count();
        });
        $age14m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age14f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 65)->where('age', '<=', 69)->count();
        });
        $age15m_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 70)->count();
        });
        $age15f_s = $households_sitio->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 70)->count();
        });

        $templateProcessor->setValue('sa-m', $age1m_s);
        $templateProcessor->setValue('sa-f', $age1f_s);
        $templateProcessor->setValue('sa-total', $age1m_s + $age1f_s);
        $templateProcessor->setValue('sb-m', $age2m_s);
        $templateProcessor->setValue('sb-f', $age2f_s);
        $templateProcessor->setValue('sb-total', $age2m_s + $age2f_s);
        $templateProcessor->setValue('sc-m', $age3m_s);
        $templateProcessor->setValue('sc-f', $age3f_s);
        $templateProcessor->setValue('sc-total', $age3m_s + $age3f_s);
        $templateProcessor->setValue('sd-m', $age4m_s);
        $templateProcessor->setValue('sd-f', $age4f_s);
        $templateProcessor->setValue('sd-total', $age4m_s + $age4f_s);
        $templateProcessor->setValue('se-m', $age5m_s);
        $templateProcessor->setValue('se-f', $age5f_s);
        $templateProcessor->setValue('se-total', $age5m_s + $age5f_s);
        $templateProcessor->setValue('sf-m', $age6m_s);
        $templateProcessor->setValue('sf-f', $age6f_s);
        $templateProcessor->setValue('sf-total', $age6m_s + $age6f_s);
        $templateProcessor->setValue('sg-m', $age7m_s);
        $templateProcessor->setValue('sg-f', $age7f_s);
        $templateProcessor->setValue('sg-total', $age7m_s + $age7f_s);
        $templateProcessor->setValue('sh-m', $age8m_s);
        $templateProcessor->setValue('sh-f', $age8f_s);
        $templateProcessor->setValue('sh-total', $age8m_s + $age8f_s);
        $templateProcessor->setValue('si-m', $age9m_s);
        $templateProcessor->setValue('si-f', $age9f_s);
        $templateProcessor->setValue('si-total', $age9m_s + $age9f_s);
        $templateProcessor->setValue('sj-m', $age10m_s);
        $templateProcessor->setValue('sj-f', $age10f_s);
        $templateProcessor->setValue('sj-total', $age10m_s + $age10f_s);
        $templateProcessor->setValue('sk-m', $age11m_s);
        $templateProcessor->setValue('sk-f', $age11f_s);
        $templateProcessor->setValue('sk-total', $age11m_s + $age11f_s);
        $templateProcessor->setValue('sl-m', $age12m_s);
        $templateProcessor->setValue('sl-f', $age12f_s);
        $templateProcessor->setValue('sl-total', $age12m_s + $age12f_s);
        $templateProcessor->setValue('sm-m', $age13m_s);
        $templateProcessor->setValue('sm-f', $age13f_s);
        $templateProcessor->setValue('sm-total', $age13m_s + $age13f_s);
        $templateProcessor->setValue('sn-m', $age14m_s);
        $templateProcessor->setValue('sn-f', $age14f_s);
        $templateProcessor->setValue('sn-total', $age14m_s + $age14f_s);
        $templateProcessor->setValue('so-m', $age15m_s);
        $templateProcessor->setValue('so-f', $age15f_s);
        $templateProcessor->setValue('so-total', $age15m_s + $age15f_s);
        $templateProcessor->setValue('sp-m', $male_sitio);
        $templateProcessor->setValue('sp-f', $female_sitio);
        $templateProcessor->setValue('sp-total', $male_sitio + $female_sitio);



        $filename = 'sum-' . date('Y-m-d');
        $tempPath = 'reports/' . $filename . '.docx';

        // save the file, if folder not exist create it
        if (!file_exists(storage_path('reports'))) {
            mkdir(storage_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs(storage_path($tempPath));
        return response()->download(storage_path($tempPath));
    }

    public function render()
    {
        return view('livewire.report.purok-export');
    }
}
