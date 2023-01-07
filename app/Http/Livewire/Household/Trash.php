<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Resident;
use App\Models\Household;

class Trash extends Component
{
    public $households;

    protected $listeners = ['restore', 'forceDelete'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->households->id,
            'message' => 'Are you sure to restore?'
        ]);
    }

    public function restore($id)
    {
        $hhold = Household::with('residents')->onlyTrashed()->where('id', $id)->first();
        $residents = Resident::where('household_id', $id)->onlyTrashed()->get();

        if ($hhold != null) {
            foreach ($residents as $resident) {
                $resident->restore();
            }
            $hhold->restore();
            return redirect()->to('/trashbin')->with('success', 'Household record has been successfully restored');
        }
    }

    public function forceDelConfirm()
    {
        $this->dispatchBrowserEvent('swal:forceDel', [
            'id' => $this->households->id,
            'message' => 'Are you sure to delete?'
        ]);
    }

    public function forceDelete($id)
    {
        $hhold = Household::with('residents')->onlyTrashed()->where('id', $id)->first();
        $residents = Resident::where('household_id', $id)->get();
        if ($hhold != null) {
            foreach ($residents as $resident) {
                $resident->forceDelete();
            }
            $hhold->forceDelete();
            return redirect()->to('/trashbin')->with('success', 'Household record has been deleted permanently!');
        }
        return redirect()->to('/trashbin')->with('error', 'Something went wrong');
    }


    public function render()
    {
        return view('livewire.household.trash');
    }
}
