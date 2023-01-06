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

        $age1m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '<=', 4)->count();
        });
        $age1f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '<=', 4)->count();
        });
        $age2m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age2f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 5)->where('age', '<=', 9)->count();
        });
        $age3m_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Male')->where('age', '>=', 10)->where('age', '<=', 14)->count();
        });
        $age3f_p1 = $households_purok1->sum(function ($household) {
            return $household->residents->where('gender', 'Female')->where('age', '>=', 10)->where('age', '<=', 14)->count();
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
