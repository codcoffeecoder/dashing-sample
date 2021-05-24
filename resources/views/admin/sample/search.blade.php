<x-dashing::filter-card>
    <x-slot name="title">
    Advanced Filter
    </x-slot>
    <x-dashing::search-input-field type="text" name="text" id="text" label="Text"/>
    <x-dashing::search-input-field type="text" name="username" id="username" label="User Name"/>
    <x-dashing::search-date-field name="dob" id="dob" label="Date of Birth"/>
    <x-dashing::search-date-field name="published_at" id="published_at" label="Post Published Date"/>
    <x-dashing::search-select-field name="select" id="select" :options="settings('sample_select')" label="Select"/>
    <x-dashing::search-select-field name="hobbies" id="hobbies" :options="settings('sample_hobbies')" label="Hobbies"/>
    <x-dashing::search-select-field name="marital" id="marital" :options="settings('sample_marital')" label="Marital"/>
    <x-dashing::search-select-field name="status" id="status" :options="settings('sample_status')" label="Status"/>
</x-dashing::filter-card>
