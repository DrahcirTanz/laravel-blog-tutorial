@component('mail::message')
# Introduction

Thank you so much for registering!

One.

Two.

Three.

@component('mail::button', ['url' => 'https://wfma.wfma-online.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some Inspirational Quote.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
