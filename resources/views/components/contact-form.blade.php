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

    <x-gotime-input wire:model="name" for="name" placeholder="Name*" />
    <x-gotime-input wire:model="email" for="email" placeholder="Email*" />
    <x-gotime-input wire:model="subject" for="subject" placeholder="Subject" />
    <x-gotime-textarea wire:model="message" for="message" placeholder="What would you like to say?" />
    <x-gotime-input type="hidden" for="recaptchaToken" x-ref="recaptchaToken" />

	<div class="flex">
        <button type="submit" class="btn primary">Contact Us</button>
		<div wire:loading>
			<div class="spinner ml"></div>
		</div>
	</div>

</form>
