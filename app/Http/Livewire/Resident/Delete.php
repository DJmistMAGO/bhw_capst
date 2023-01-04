<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;
use App\Models\Resident;

class Delete extends Component
{
    public $resident;

    public $listeners = ['delete'];

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->resident->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $resident = Resident::where('id', $id)->first();
        if ($resident != null) {
            $resident->delete();
            return redirect()->to('/resident');
        }
        return redirect()->to('/resident')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.resident.delete');
    }
}
