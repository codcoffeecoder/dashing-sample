<x-dashing::app-layout>
    <x-slot name="header">
        Sample Management - Create
    </x-slot>
    <x-slot name="breadcrumb">
        {{ \Breadcrumbs::render('breadcrumb') }}
    </x-slot>
    <x-dashing::content-card class="col-max">
        <div class="px-5">
            <x-dashing::form ajax="true" method="POST" action="{{ route('sample.store') }}">
                <x-dashing::markdown-field name="markdown" id="markdown" label="Markdown" class=""  :value="$model->markdown ?? ''"/>
                <x-dashing::input-field type="text" name="text" id="text" label="Text" class=""  :value="$model->text ?? ''"/>
                <x-dashing::file-field type="file" name="resume" id="resume" label="Resume" class=""  :value="$model->resume ?? ''"/>
                <x-dashing::image-field type="image" name="photo" id="photo" label="Photo" class=""  :value="$model->photo ?? ''"/>
                <x-dashing::image-field type="image" name="galleries" id="galleries" label="Gallery" class="" multiple="multiple" :value="$model->galleries ?? ''"/>
                <x-dashing::input-field type="text" name="username" id="username" label="User Name" class=""  :value="$model->username ?? ''"/>
                <x-dashing::date-field name="dob" id="dob" label="Date of Birth" class=""  :value="$model->dob ?? ''"/>
                <x-dashing::datetime-field name="date_time" id="date_time" label="Date Time" class=""  :value="$model->date_time ?? ''"/>
                <x-dashing::date-field name="published_at" id="published_at" label="Post Published Date" class=""  :value="$model->published_at ?? ''"/>
                <x-dashing::time-field name="timing" id="timing" label="Timing" class=""  :value="$model->timing ?? ''"/>
                <x-dashing::input-field type="number" name="age" id="age" label="Age" class="" min="1" max="100" test="hello world" :value="$model->age ?? ''"/>
                <x-dashing::editor-field name="editor" id="editor" label="Editor" class=""  :value="$model->editor ?? ''"/>
                <x-dashing::textarea-field name="textarea" id="textarea" label="Textarea" class=""  :value="$model->textarea ?? ''"/>
                <x-dashing::select-field name="select" id="select" label="Select" class=""  :options="settings('sample_select')" :selected="$model->select ?? []" />
                <x-dashing::checkboxes-field name="hobbies" id="hobbies" label="Hobbies" :options="settings('sample_hobbies')" :checked="$model->hobbies ?? []" :isGroup="false" class="" :stacked="1"/>
                <x-dashing::radios-field name="marital" id="marital" label="Marital" :options="settings('sample_marital')" :checked="$model->marital ?? []" :isGroup="false" :stacked="0"/>
                <x-dashing::select-field name="status" id="status" label="Status" class=""  :options="settings('sample_status')" :selected="$model->status ?? []" />
                <x-dashing::select-field name="author_id" id="author_id" label="Author" class=""  :options="app(config('dashing.Models.User'))->query()->pluck('name','id')->toArray()" :selected="$model->author_id ?? []" />
                <x-dashing::select-field name="another_user_id" id="another_user_id" label="Another Users" class="" multiple="multiple" :options="app(config('dashing.Models.User'))->query()->pluck('name','id')->toArray()" :selected="$model->another_user_id ?? []" datalist/>
                <x-dashing::button-field class="btn btn-primary">Submit</x-dashing::button-field>
            </x-dashing::form>
        </div>
    </x-dashing::content-card>
@push('scripts')
<script>
    $(document).ready(function() {
    });
</script>
@endpush
</x-dashing::app-layout>

