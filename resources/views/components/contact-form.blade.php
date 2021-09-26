@section('head')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

<form {{ $attributes->merge([]) }} method="POST" action="{{ route('contact.store') }}">

    @csrf

    <x-honeypot />

    {{ $slot }}

    {{-- only remove top margin if there is no slot content --}}
    <x-formit::input for="name" type="name" label="Name" autocomplete="name" rowClasses="{{ $slot == '' ? 'nmt' : '' }}" />
    <x-formit::input for="email" type="email" label="E-mail Address" autocomplete="email" />
    <x-formit::input for="subject" type="subject" label="Subject" />
    <x-formit::textarea for="message" type="message" label="Message" />


    <div class="frm-row">
        <div class="g-recaptcha" data-sitekey="{{ config('naykel.recaptcha.site_key') }}" class></div>
        @error('g-recaptcha-response')
            <span class="txt-red" role="alert"> {{ $message }} </span>
        @enderror
    </div>

    <div class="frm-row">
        <button type="submit" class="btn primary">SUBMIT</button>
    </div>

</form>