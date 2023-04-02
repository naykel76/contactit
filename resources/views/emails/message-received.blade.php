<x-mail::message>

# New Website Enquiry:

**From:** {{ $enquiry['name'] }}

**E-Mail Address:** {{ $enquiry['email'] }}

**Phone:** {{ $enquiry['phone'] ?? null}}

**Subject:** {{ $enquiry['subject'] ?? null}}

**Message:** {{ $enquiry['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
