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
        $household = Household::with('residents')->where('id', $id)->first();
        // check first  if household is not null
        if ($household != null) {
            // delete first the resident records with the household_id of the household
            $household->residents->each->delete();
            // then delete the household
            $household->delete();
            return redirect()->route('household.index');
        } else {
            $this->dispatchBrowserEvent('swal:deleted', ['message' => 'Household not found!']);
        }

        return redirect()->route('household.index');
    }

    public function render()
    {
        return view('livewire.household.delete');
    }
}
