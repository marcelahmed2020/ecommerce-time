# Introduction
<h3>From your Websit -{{ $details['site_name']  }}-</h3>
<h4> Hi, I'm  {{ $details['name'] }}  And My E-mail {{ $details['email'] }} </h4>
<p>Telephone Is :{{ $details['telephone']  }} </p>
<p>Subject Is :{{ $details['subject']  }} </p>
<p>Message Is :{{ $details['message']  }} </p>
Thanks,<br>
{{ config('app.name') }}
