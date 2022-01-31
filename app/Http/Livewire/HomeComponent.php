<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $category, $status, $search, $filter;
    protected $queryString = [
        'category' => ['except'=>''],
        'filter' => ['except'=>''],
        'status' => ['except'=>''],
        'search' => ['except'=>'']
    ];
    protected $listeners = [
        'changedStatus' => 'changedStatus',
        'confirmed',
    ];

    public $state=[], $idea;

    public function confirmed(idea $idea)
    {
        $idea->delete();
        $this->alert('success', 'Successfully deleted');
    }
    public function loadIdea( $idea)
    {
        $this->idea = Idea::where('id', $idea)->first();
        $this->state = $this->idea->toArray();
    }
    public function addIdea()
    {
        Validator::make(
            $this->state,
            [
                'title' => 'required|max:111',
                'description' => 'required|max:1111',
                'status' => 'required',
                'category_id' => 'required',
            ])->validate();
        $this->idea->update($this->state, ['user_id' => \auth()->id()]);
        $this->emit('ideaUpdated');

        $this->alert('success', 'Successfully updated');
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function changedStatus($value)
    {
        $this->status = $value;
    }
    public function vote(idea $idea)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        if ($idea->isVotedByUser(Auth::user())!=true){
            $idea->votes()->attach(Auth::id());
            $this->alert('success', 'Voted');
        }else{
            $idea->votes()->detach(Auth::id());
            $this->alert('success', 'Unvoted');
        }

    }
    public function updatedPage()
    {

    }
    public function deleteModal()
    {
        $this->dispatchBrowserEvent('showConfirmation',[
            'title' => 'Are you sure!',
            'icon' => 'warning',
            'text' => 'You cant be able tto revert this',
            'confirmButtonText' => 'Submit',
        ]);
    }

    public function render()
    {
        $ideas = Idea::with('user', 'category')
            ->when($this->category, function($query){
                return $query->where('category_id', $this->category);
            })
            ->when($this->status, function($query) {
                return $query->where('status', $this->status);
            })
            ->when($this->search, function($query) {
                return $query->where('title', 'like', '%'.$this->search.'%');
            })
            ->when($this->filter && $this->filter == 'top-voted' , function($query) {
                return $query->orderByDesc('votes_count');
            })
            ->when($this->filter && $this->filter == 'my-ideas' , function($query) {
                return $query->where('user_id', \auth()->id());
            })
            ->withCount([
                'votes',
                'votes as voted_by_user' => function (Builder $query){
                    $query->where('user_id', auth()->id());
                }
            ])
            ->latest()->simplePaginate(10);
        return view('livewire.home-component', compact('ideas'));
    }
}
