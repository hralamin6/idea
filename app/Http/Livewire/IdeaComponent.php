<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class IdeaComponent extends Component
{
    use LivewireAlert, WithAuthRedirects;

    public $title, $description, $status='open', $category_id;

    public function addIdea()
    {
        $idea = $this->validate([
            'title' => 'required|max:111',
            'description' => 'required|max:1111',
            'status' => 'required',
            'category_id' => 'required',
        ]);
        Auth::user()->ideas()->create($idea);
        $this->alert('success', 'Successfully saved');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.idea-component');
    }
}
