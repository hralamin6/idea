@component('mail::message')
# Introduction
The body of your message.
{{$comment->user->name}} commented on your idea

**{{ $comment->idea->title }}
@component('mail::button', ['url' => route('single.idea', $comment->idea->id)])
Go to idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
