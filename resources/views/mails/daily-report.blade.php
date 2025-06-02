@component('mail::message')
#Hello {{$user->first_name}},

The body of your message.
<br>
@foreach($alerts as $alert)
Information of Building {!! $alert->bin!!} given below.
@component('mail::table')
| Alert Type       | Total Alerts         | New Alerts  |
|-------------|:-------------:|:-------------:|
|DOB Violations| {{$alert->dobViolations()->count()}} | {{$alert->dobViolations()->new($date)->count()}} |
|DOB Complaints| {{$alert->dobComplaints()->count()}} | {{$alert->dobComplaints()->new($date)->count()}} |
|ECB Violations| {{$alert->ecbViolations()->count()}} | {{$alert->ecbViolations()->new($date)->count()}} |
|HPD Violations| {{$alert->hpdViolations()->count()}} | {{$alert->hpdViolations()->new($date)->count()}} |
|HPD Complaints| {{$alert->hpdComplaints()->count()}} | {{$alert->hpdComplaints()->new($date)->count()}} |
|OATH Hearings| {{$alert->oathHearings()->count()}} | {{$alert->oathHearings()->new($date)->count()}} |
@endcomponent

@endforeach

@component('mail::button', ['url' => 'https://pbs.nyc/portal'])
More Information
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
