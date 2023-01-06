<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Resident;
use App\Models\Household;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public const TEMPLATE_PATH_ACC = 'docx/ACCOMPLISHMENT_REPORT.docx';

    public function export()
    {
        $path = storage_path(self::TEMPLATE_PATH_ACC);
        $templateProcessor = new TemplateProcessor($path);

        $households = Household::with('residents')->get();
        // $residents = Resident::all();

        $templateProcessor->setValue('year', date('Y'));

        // count household
        $householdCount = $households->count();
        if ($householdCount <= 0) {
            $this->dispatchBrowserEvent('swalError', ['message' => 'No household record found!']);
            return redirect(route('household.index'));
        }

        $members = $households->pluck('residents')->flatten();

        // count of residents
        $resCount = $members->count();

        // dd($resCount);
        if ($resCount > 0) {
            $templateProcessor->cloneRow('n', $resCount);
            $i = 1;

            foreach ($members as $key => $member) {
                $templateProcessor->setValue('n#' . ($key + 1), $i);
                $templateProcessor->setValue('name#' . ($key + 1), $member->fullname);

                if ($member->gender == "Male") {
                    $templateProcessor->setValue('a#' . ($key + 1), "M");
                } else {
                    $templateProcessor->setValue('a#' . ($key + 1), "F");
                }

                $templateProcessor->setValue('b#' . ($key + 1), $member->age);
                $templateProcessor->setValue('bdate#' . ($key + 1), $member->bdate);
                $templateProcessor->setValue('c#' . ($key + 1), $member->marital_status);

                if ($key == 0 || $member->household_id != $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('d#' . ($key + 1), $households->where('id', $member->household_id)->first()->household_no);
                } else {
                    $templateProcessor->setValue('d#' . ($key + 1), '');
                }


                $templateProcessor->setValue('e#' . ($key + 1), $member->gender == "Male" && $member->pwd_type != null ? '✔' : ' ');
                $templateProcessor->setValue('g#' . ($key + 1), $member->gender == "Female" && $member->pwd_type != null ? '✔' : ' ');
                $templateProcessor->setValue('h#' . ($key + 1), $member->age >= 60 && $member->gender == "Male" ? '✔' : ' ');
                $templateProcessor->setValue('i#' . ($key + 1), $member->age >= 60 && $member->gender == "Female" ? '✔' : ' ');
                $templateProcessor->setValue('f#' . ($key + 1), ' ');


                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('j#' . ($key + 1), '');
                } else {
                    $swara = $households->where('id', $member->household_id)->first()->swara;
                    $templateProcessor->setValue('j#' . ($key + 1), $swara == 'NHTS' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('k#' . ($key + 1), '');
                } else {
                    $swara = $households->where('id', $member->household_id)->first()->swara;
                    $templateProcessor->setValue('k#' . ($key + 1), $swara == 'NHTS Non 4PCS' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('l#' . ($key + 1), '');
                } else {
                    $swara = $households->where('id', $member->household_id)->first()->swara;
                    $templateProcessor->setValue('l#' . ($key + 1), $swara == 'Non NHTS' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('m#' . ($key + 1), '');
                } else {
                    $salt = $households->where('id', $member->household_id)->first()->salt;
                    $templateProcessor->setValue('m#' . ($key + 1), $salt == 'Yes' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('o#' . ($key + 1), '');
                } else {
                    $salt = $households->where('id', $member->household_id)->first()->salt;
                    $templateProcessor->setValue('o#' . ($key + 1), $salt == 'No' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('p#' . ($key + 1), '');
                } else {
                    $herbal = $households->where('id', $member->household_id)->first()->herbal;
                    $templateProcessor->setValue('p#' . ($key + 1), $herbal == 'Vegetable Gardening' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('q#' . ($key + 1), '');
                } else {
                    $herbal = $households->where('id', $member->household_id)->first()->herbal;
                    $templateProcessor->setValue('q#' . ($key + 1), $herbal == 'Root Crops' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('r#' . ($key + 1), '');
                } else {
                    $grb_disposal = $households->where('id', $member->household_id)->first()->grb_disposal;
                    $templateProcessor->setValue('r#' . ($key + 1), $grb_disposal == 'Burning' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('s#' . ($key + 1), '');
                } else {
                    $grb_disposal = $households->where('id', $member->household_id)->first()->grb_disposal;
                    $templateProcessor->setValue('s#' . ($key + 1), $grb_disposal == 'Dumping' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('t#' . ($key + 1), '');
                } else {
                    $housing_status = $households->where('id', $member->household_id)->first()->housing_status;
                    $templateProcessor->setValue('t#' . ($key + 1), $housing_status == 'H1' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('u#' . ($key + 1), '');
                } else {
                    $housing_status = $households->where('id', $member->household_id)->first()->housing_status;
                    $templateProcessor->setValue('u#' . ($key + 1), $housing_status == 'H2' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('v#' . ($key + 1), '');
                } else {
                    $housing_status = $households->where('id', $member->household_id)->first()->housing_status;
                    $templateProcessor->setValue('v#' . ($key + 1), $housing_status == 'H3' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('w#' . ($key + 1), '');
                } else {
                    $housing_status = $households->where('id', $member->household_id)->first()->housing_status;
                    $templateProcessor->setValue('w#' . ($key + 1), $housing_status == 'H4' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('x#' . ($key + 1), '');
                } else {
                    $housing_status = $households->where('id', $member->household_id)->first()->housing_status;
                    $templateProcessor->setValue('x#' . ($key + 1), $housing_status == 'H5' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('y#' . ($key + 1), '');
                } else {
                    $water_source = $households->where('id', $member->household_id)->first()->water_source;
                    $templateProcessor->setValue('y#' . ($key + 1), $water_source == 'Level 1 - Faucet' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('z#' . ($key + 1), '');
                } else {
                    $water_source = $households->where('id', $member->household_id)->first()->water_source;
                    $templateProcessor->setValue('z#' . ($key + 1), $water_source == 'Level 2 - Hand Pump' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('aa#' . ($key + 1), '');
                } else {
                    $water_source = $households->where('id', $member->household_id)->first()->water_source;
                    $templateProcessor->setValue('aa#' . ($key + 1), $water_source == 'Level 3 - Deep Well' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('ad#' . ($key + 1), '');
                } else {
                    $electrification = $households->where('id', $member->household_id)->first()->electrification;
                    $templateProcessor->setValue('ad#' . ($key + 1), $electrification == 'With Kontador' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('ae#' . ($key + 1), '');
                } else {
                    $electrification = $households->where('id', $member->household_id)->first()->electrification;
                    $templateProcessor->setValue('ae#' . ($key + 1), $electrification == 'Without Kontador' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('ah#' . ($key + 1), '');
                } else {
                    $env_sanitation = $households->where('id', $member->household_id)->first()->env_sanitation;
                    $templateProcessor->setValue('ah#' . ($key + 1), $env_sanitation == 'With CR' ? '✔' : ' ');
                }

                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('ai#' . ($key + 1), '');
                } else {
                    $env_sanitation = $households->where('id', $member->household_id)->first()->env_sanitation;
                    $templateProcessor->setValue('ai#' . ($key + 1), $env_sanitation == 'Without CR' ? '✔' : ' ');
                }

                $templateProcessor->setValue('ac#' . ($key + 1), $member->is_voter == "true"  ? '✔' : ' ');
                $i++;
            }

            $total_fam = $households->sum('total_fam');
            $templateProcessor->setValue('ta', $total_fam);

            $templateProcessor->setValue('tb', $members->where('gender', 'Male')->where('pwd_type', '!=', null)->count());
            $templateProcessor->setValue('tc', $members->where('gender', 'Female')->where('pwd_type', '!=', null)->count());
            $templateProcessor->setValue('td', $members->where('age', '>=', 60)->where('gender', 'Male')->count());
            $templateProcessor->setValue('te', $members->where('age', '>=', 60)->where('gender', 'Female')->count());
            $templateProcessor->setValue('tf', $households->where('swara',  'NHTS')->count());
            $templateProcessor->setValue('tg', $households->where('swara',  'NHTS Non 4PCS')->count());
            $templateProcessor->setValue('th', $households->where('swara',  'Non NHTS')->count());
            $templateProcessor->setValue('ti', $households->where('salt',  'Yes')->count());
            $templateProcessor->setValue('tj', $households->where('salt',  'No')->count());
            $templateProcessor->setValue('tk', $households->where('herbal',  'Vegetable Gardening')->count());
            $templateProcessor->setValue('tl', $households->where('herbal',  'Root Crops')->count());
            $templateProcessor->setValue('tm', $households->where('grb_disposal',  'Burning')->count());
            $templateProcessor->setValue('tn', $households->where('grb_disposal',  'Dumping')->count());
            $templateProcessor->setValue('to', $households->where('housing_status',  'H1')->count());
            $templateProcessor->setValue('tp', $households->where('housing_status',  'H2')->count());
            $templateProcessor->setValue('tq', $households->where('housing_status',  'H3')->count());
            $templateProcessor->setValue('tr', $households->where('housing_status',  'H4')->count());
            $templateProcessor->setValue('ts', $households->where('housing_status',  'H5')->count());
            $templateProcessor->setValue('tt', $households->where('water_source',  'Level 1 - Faucet')->count());
            $templateProcessor->setValue('tu', $households->where('water_source',  'Level 2 - Hand Pump')->count());
            $templateProcessor->setValue('tv', $households->where('water_source',  'Level 3 - Deep Well')->count());
            $templateProcessor->setValue('tw', $households->sum('total_voter'));
            $templateProcessor->setValue('tx', $households->where('electrification',  'With Kontador')->count());
            $templateProcessor->setValue('ty', $households->where('electrification',  'Without Kontador')->count());
            $templateProcessor->setValue('tz', $households->where('env_sanitation',  'With CR')->count());
            $templateProcessor->setValue('t1', $households->where('env_sanitation',  'Without CR')->count());
        }


        $filename = 'acc-' . date('Y-m-d');
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
        return view('livewire.report.export');
    }
}
