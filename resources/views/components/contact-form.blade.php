@push('head')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha_site_key') }}"></script>
@endpush

<form x-data="{
        execute(){
            grecaptcha.ready(() => {
                grecaptcha.execute('{{ config('services.recaptcha_site_key') }}', { action: 'contact' })
                .then((token) => {
                    {{-- set the hidden input value --}}
                    this.$refs.recaptchaToken.value = token;
                    {{-- set livewire token value --}}
                    $wire.set('recaptchaToken', token);
                })
                .then(() => {
                    $wire.submitForm()
                })
            })
        }
    }" x-on:submit.prevent="execute">

    @csrf

    <x-honeypot />

    <x-input wire:model="name" for="name" label="Name" req />
    <x-input wire:model="email" for="email" label="Email" type="email" req />
    <x-input wire:model="subject" for="subject" label="Subject" />
    <x-textarea wire:model="message" for="message" label="What is your message?" req />
    <x-input type="hidden" for="recaptchaToken" x-ref="recaptchaToken" />

    <div class="flex">
        <button type="submit" class="btn primary">Contact Us</button>
        <div wire:loading>
            <div class="spinner ml"></div>
        </div>
    </div>

</form>
