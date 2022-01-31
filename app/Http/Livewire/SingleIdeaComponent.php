<?php

namespace App\Http\Livewire;

use App\Mail\IdeaStatusChangedMail;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SingleIdeaComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $status;
    public $idea;
    public $isNotify;
    public $isVoted;
    public $comment;
    public $votes_count;
    protected $listeners = ['changedStatus' => 'changedStatus', 'deleteIdea', 'deleteComment'];
    public $state=[];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status;
        $this->state = $this->idea->toArray();
        $this->votes_count = $this->idea->votes()->count();
    }
    public function deleteIdea(Idea $idea)
    {
        $idea->delete();
        $this->alert('success', 'Successfully deleted');
        return redirect()->route('home');
    }
    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        $this->alert('success', 'Successfully deleted');
    }

    public function vote(Idea $idea)
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
    public function addComment()
    {
        if (!\auth()->check()){
            return redirect()->route('login');
        }
       $this->validate(
            [
                'comment' => 'required|max:111',
            ]);
        $this->idea->comments()->create([
            'user_id' => \auth()->id(),
            'body' => $this->comment,
        ]);
        $this->reset('comment');
        $this->goToPage($this->idea->comments()->paginate(5)->lastPage());
        $this->emit('commendAdded');
        $this->alert('success', 'Successfully updated');
    }

    public function changeStatus()
    {
        $this->idea->update(['status' => $this->status]);
        $this->alert('success', 'Successfully status updated');
        $this->emit('ideaStatusUpdated');

//        if ($this->isNotify){
//            $this->idea->votes()->select('name', 'email')->chunk(100, function ($voters){
//                foreach ($voters as $user){
//                    Mail::to($user)->queue(new IdeaStatusChangedMail($this->idea->id));
//                }
//            });
//        }

    }
    public function changedStatus($value)
    {
        return redirect()->to('/?status='.$value);    }

    public function render()
    {
        $backUrl = url()->previous() != url()->full()? url()->previous(): route('home');
        $this->isVoted = $this->idea->isVotedByUser(Auth::user());
        $comments = $this->idea->comments()->with(['user'])->paginate(5)->withQueryString();
        return view('livewire.single-idea-component', compact('backUrl', 'comments'));
    }
}
