<x-layout>
    <x-page-heading>
        Register
    </x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" required />
        <x-forms.input label="Password" name="password" type="password" required />
        
        
        <x-forms.button type="submit" class="w-full">
            Login
        </x-forms.button>


    </x-forms.form>
</x-layout>