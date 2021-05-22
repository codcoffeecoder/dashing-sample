<x-dashing::app-layout>
    <x-slot name="header">
        Sample Management - Show
    </x-slot>
    <x-slot name="breadcrumb">
        {{ \Breadcrumbs::render('breadcrumb') }}
    </x-slot>
    <x-dashing::content-card class="col-max">
        <div class="px-5">
            <x-dashing::display-field name="markdown" id="markdown" label="Markdown" value="{!! $model->markdown !!}" type="markdown"/>
                <x-dashing::display-field name="text" id="text" label="Text" :value="$model->text" type="text"/>
                <x-dashing::display-field name="resume" id="resume" label="Resume" :value="$model->resume" type="file"/>
                <x-dashing::display-field name="photo" id="photo" label="Photo" :value="$model->photo" type="image"/>
                <x-dashing::display-field name="galleries" id="galleries" label="Gallery" :value="$model->galleries" type="image"/>
                <x-dashing::display-field name="username" id="username" label="User Name" :value="$model->username" type="text"/>
                <x-dashing::display-field name="dob" id="dob" label="Date of Birth" :value="$model->dob" type="date"/>
                <x-dashing::display-field name="date_time" id="date_time" label="Date Time" :value="$model->date_time" type="datetime"/>
                <x-dashing::display-field name="published_at" id="published_at" label="Post Published Date" :value="$model->published_at" type="date"/>
                <x-dashing::display-field name="timing" id="timing" label="Timing" :value="$model->timing" type="text"/>
                <x-dashing::display-field name="age" id="age" label="Age" :value="$model->age" type="text"/>
                <x-dashing::display-field name="editor" id="editor" label="Editor" value="{!! $model->editor !!}" type="editor"/>
                <x-dashing::display-field name="textarea" id="textarea" label="Textarea" :value="$model->textarea" type="text"/>
                <x-dashing::display-field name="select" id="select" label="Select" :value="$model->select" type="text"/>
                <x-dashing::display-field name="hobbies" id="hobbies" label="Hobbies" :value="$model->hobbies" type="list"/>
                <x-dashing::display-field name="marital" id="marital" label="Marital" :value="$model->marital" type="text"/>
                <x-dashing::display-field name="status" id="status" label="Status" :value="$model->status" type="text"/>
                <x-dashing::display-field name="author_id" id="author_id" label="Author" :value="$model->author_id" type="text"/>
                <x-dashing::display-field name="another_user_id" id="another_user_id" label="Another Users" :value="$model->another_user_id" type="list"/>
        </div>
    </x-dashing::content-card>
@push('scripts')
<script>
    $(document).ready(function() {
    });
</script>
@endpush
</x-dashing::app-layout>
