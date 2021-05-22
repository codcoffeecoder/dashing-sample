<x-dashing::filter-card>
    <x-slot name="title">
    Advanced Filter
    </x-slot>
    <div class="form-group">
    <label for="text">Text</label>
    <x-dashing::search-input-field type="text" name="text" id="text"/>
    </div>

    <div class="form-group">
    <label for="username">User Name</label>
    <x-dashing::search-input-field type="text" name="username" id="username"/>
    </div>

    <div class="form-group">
    <label for="dob">Date of Birth</label>
    <x-dashing::search-date-field type="text" name="dob" id="dob"/>
    </div>

    <div class="form-group">
    <label for="date_time">Date Time</label>
    </div>

    <div class="form-group">
    <label for="published_at">Post Published Date</label>
    <x-dashing::search-date-field type="text" name="published_at" id="published_at"/>
    </div>

    <div class="form-group">
    <label for="select">Select</label>
    <x-dashing::search-select-field name="select" id="select" :options="settings('sample_select')"/>
    </div>

    <div class="form-group">
    <label for="hobbies">Hobbies</label>
    <x-dashing::search-select-field name="hobbies" id="hobbies" :options="settings('sample_hobbies')"/>
    </div>

    <div class="form-group">
    <label for="marital">Marital</label>
    <x-dashing::search-select-field name="marital" id="marital" :options="settings('sample_marital')"/>
    </div>

    <div class="form-group">
    <label for="status">Status</label>
    <x-dashing::search-select-field name="status" id="status" :options="settings('sample_status')"/>
    </div>
</x-dashing::filter-card>
