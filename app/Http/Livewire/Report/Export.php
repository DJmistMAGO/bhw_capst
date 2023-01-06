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
        $residents = Resident::all();


        // $resCount = $residents->count();
        $male = $residents->where('gender', 'Male')->count();
        $female = $residents->where('gender', 'Female')->count();
        $families = $households->sum('total_fam');

        $h1 = $households->where('housing_status', 'H1')->count();
        $h2 = $households->where('housing_status', 'H2')->count();
        $h3 = $households->where('housing_status', 'H3')->count();
        $h4 = $households->where('housing_status', 'H4')->count();
        $h5 = $households->where('housing_status', 'H5')->count();
        $h6 = $households->where('housing_status', 'H6')->count();

        $wsL1 = $households->where('water_source', 'Level 1 - Faucet')->count();
        $wsL2 = $households->where('water_source', 'Level 2 - Hand Pump')->count();
        $wsL3 = $households->where('water_source', 'Level 3 - Deep Well')->count();

        $pwdCount = $households->sum('total_pwd');
        $seniorCount = $households->sum('total_senior');

        $malePwd = $residents->where('pwd_type', '!=', null)->where('gender', '==', 'Male')->count();
        $femalePwd = $residents->where('pwd_type', '!=', null)->where('gender', '==', 'Female')->count();

        $withSanitation = $households->where('env_sanitation', '==', 'Without CR')->count();
        $useSalt = $households->where('salt', '==', 'Yes')->count();
        $herbalCount = $households->where('herbal', '!=', null)->count();

        $withElect = $households->where('electrification', '==', 'With Kontador')->count();

        $withAnimal = $households->where('animal_owned', '!=', null)->count();
        $withVehicle = $households->where('vehicle', '!=', null)->count();
        $voterCount = $households->sum('total_voter');

        $p1Count = $households->where('purok', '==', 'Purok 1')->count();
        $p2Count = $households->where('purok', '==', 'Purok 2')->count();
        $p3Count = $households->where('purok', '==', 'Purok 3')->count();
        $p4Count = $households->where('purok', '==', 'Purok 4')->count();
        $p5Count = $households->where('purok', '==', 'Purok 5')->count();
        $p6Count = $households->where('purok', '==', 'Sitio Matanac')->count();

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

                if ($key > 0) {
                    if ($member->household_id == $members[$key - 1]->household_id) {
                        $templateProcessor->setValue('d#' . ($key + 1), '');
                    } else {
                        $templateProcessor->setValue('d#' . ($key + 1), $households->where('id', $member->household_id)->first()->household_no);
                    }
                } else {
                    $templateProcessor->setValue('d#' . ($key + 1), $households->where('id', $member->household_id)->first()->household_no);
                }

                if ($member->gender == "Male" && $member->pwd_type != null) {
                    $templateProcessor->setValue('e#' . ($key + 1), '✔');
                } else {
                    $templateProcessor->setValue('e#' . ($key + 1), ' ');
                }
                if ($member->gender == "Female" && $member->pwd_type != null) {
                    $templateProcessor->setValue('g#' . ($key + 1), '✔');
                } else {
                    $templateProcessor->setValue('g#' . ($key + 1), ' ');
                }

                if ($member->age >= 60 && $member->gender == "Male") {
                    $templateProcessor->setValue('h#' . ($key + 1), '✔');
                } else {
                    $templateProcessor->setValue('h#' . ($key + 1), ' ');
                }
                if ($member->age >= 60 && $member->gender == "Female") {
                    $templateProcessor->setValue('i#' . ($key + 1), '✔');
                } else {
                    $templateProcessor->setValue('i#' . ($key + 1), ' ');
                }

                $templateProcessor->setValue('f#' . ($key + 1), ' ');

                if ($key > 0) {
                    if ($member->household_id == $members[$key - 1]->household_id) {
                        $templateProcessor->setValue('j#' . ($key + 1), '');
                    } else {
                        if ($households->where('id', $member->household_id)->first()->swara == 'NHTS') {
                            $templateProcessor->setValue('j#' . ($key + 1), '✔');
                        } else {
                            $templateProcessor->setValue('j#' . ($key + 1), ' ');
                        }
                    }
                } else {
                    if ($households->where('id', $member->household_id)->first()->swara == 'NHTS') {
                        $templateProcessor->setValue('j#' . ($key + 1), '✔');
                    } else {
                        $templateProcessor->setValue('j#' . ($key + 1), ' ');
                    }
                }

                if ($key > 0) {
                    if ($member->household_id == $members[$key - 1]->household_id) {
                        $templateProcessor->setValue('k#' . ($key + 1), '');
                    } else {
                        if ($households->where('id', $member->household_id)->first()->swara == 'NHTS Non 4PCS') {
                            $templateProcessor->setValue('k#' . ($key + 1), '✔');
                        } else {
                            $templateProcessor->setValue('k#' . ($key + 1), ' ');
                        }
                    }
                } else {
                    if ($households->where('id', $member->household_id)->first()->swara == 'NHTS Non 4PCS') {
                        $templateProcessor->setValue('k#' . ($key + 1), '✔');
                    } else {
                        $templateProcessor->setValue('k#' . ($key + 1), ' ');
                    }
                }


                // new code revised
                if ($key > 0 && $member->household_id == $members[$key - 1]->household_id) {
                    $templateProcessor->setValue('l#' . ($key + 1), '');
                } else {
                    $swara = $households->where('id', $member->household_id)->first()->swara;
                    $templateProcessor->setValue('l#' . ($key + 1), $swara == 'Non NHTS' ? '✔' : ' ');
                }
                // end of revision


                $i++;
            }
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
