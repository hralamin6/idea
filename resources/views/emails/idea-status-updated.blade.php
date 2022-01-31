@component('mail::message')
# Introduction

The idea: {{ $idea->titile }}
has been updated to status as
{{ $idea->status }}
@component('mail::button', ['url' => route('single.idea', $idea)])
See Idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
