<?php

namespace App\Http\Livewire\Household;

use Livewire\Component;
use App\Models\Household;

class Delete extends Component
{
    public $household;

    public $listeners = ['delete'];

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->household->id,
            'message' => 'Are you sure?'
        ]);
    }

    public function delete($id)
    {
        $abc = Household::where('id', $id)->first();
        if ($abc != null) {
            $abc->delete();
            return redirect()->to('/household');
        }
        return redirect()->to('/household')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.household.delete');
    }
}
