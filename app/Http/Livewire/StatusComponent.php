<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class StatusComponent extends Component
{
public $allIdea, $considering, $count;

    public function render()
    {
        $this->count = Idea::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("count(case when status = 'open' then 'open' end) as open")
            ->selectRaw("count(case when status = 'considering' then 'considering' end) as considering")
            ->selectRaw("count(case when status = 'in-progress' then 'in-progress' end) as in_progress")
            ->selectRaw("count(case when status = 'implemented' then 'implemented' end) as implemented")
            ->selectRaw("count(case when status = 'closed' then 'closed' end) as closed")
            ->first()
            ->toArray();
        return view('livewire.status-component');
    }
}
