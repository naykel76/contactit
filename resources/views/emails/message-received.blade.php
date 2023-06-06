<x-mail::message>

# New Website Enquiry:

**From:** {{ $enquiry['name'] }}

**E-Mail Address:** {{ $enquiry['email'] }}

**Phone:** {{ $enquiry['phone'] ?? null}}

**Subject:** {{ $enquiry['subject'] ?? null}}

**Message:** {{ $enquiry['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
