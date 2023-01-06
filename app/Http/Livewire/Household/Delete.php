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
        $household = Household::where('id', $id)->first();
        if ($household != null) {
            $household->delete();
            return redirect()->to('/household')->with('success', 'Household deleted successfully');
        }
        return redirect()->to('/household')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.household.delete');
    }
}
