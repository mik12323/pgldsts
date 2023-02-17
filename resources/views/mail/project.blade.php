@component('mail::message')
# Hey, {{ $user->fname }} you have new project available!


Project Name: {{ $project->projectName }} <br>
Reference no.: {{ $project->referenceNumber }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Check it now!
@endcomponent
<br>
Thanks,<br>
Provincial Government of Lanao del Sur Tracking System

@endcomponent
