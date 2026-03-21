<x-layout>
    <x-page-heading>
        New Job
    </x-page-heading>
    <x-forms.form method="POST" action="/job" enctype="multipart/form-data">
        <x-forms.input label="Title" name="title" type="text" required placeholder="Frontend Developer" />
        <x-forms.input label="Salary" name="salary" type="text" required placeholder="$50,000 - $60,000" />
        <x-forms.input label="Location" name="location" type="text" required placeholder="New York" />

        <x-forms.select label='Schedule' name='schedule'>
            <option value="full-time">Full-Time</option>
            <option value="part-time">Part-Time</option>
            <option value="contract">Contract</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" type="text"  placeholder="https://google.com" />
        <x-forms.checkbox label="Feature (Cost Extra)" name="featured" />

        <x-forms.divider />
        <x-forms.input label="Tags (comma separated)" name="tags" type="text"  placeholder="Laravel, Vue, Remote" />
    
    <x-forms.button type="submit" class="w-full">
        publish
    </x-forms.button>

    </x-forms.form>
</x-layout>