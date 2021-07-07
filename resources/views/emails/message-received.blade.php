@component('mail::message')
# New Enquiry:

**From:** {{ $enquiry['name'] }}

**E-Mail Address:** {{ $enquiry['email'] }}

**Subject:** {{ $enquiry['subject'] }}

**Message:** {{ $enquiry['message'] }}

@endcomponent

