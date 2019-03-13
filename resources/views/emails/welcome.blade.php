@component('mail::message')
# Introduction

Hi {{$user->name}}, welcome to blog

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
