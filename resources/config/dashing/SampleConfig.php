<?php

return [
    'ready' => false, // set true when you are ready to generate CRUD
    'migration' => true,
    'table_name' => '', // leave empty to use model's naming convention
    'menu_icon' => 'fas fa-link',
    'menu_name' => '', // leave empty to use model name
    'orderable' => false, // in case your module need to reorder the display seq. set false to disabled, set "order group" fieldname to enabled. Field name must declared in the form section
    'form' => [

        'markdown' => [
            'label' => 'Markdown',
            'type' => 'markdown',
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => false,
            'migration' => 'longText:{%field%}|nullable',
            'validation' => [
                'create' => 'required|min:4',
                'update' => 'required|min:4',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'text' => [
            'label' => 'Text',
            'type' => 'text',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => true,
            'sortable' => true,
            'migration' => 'string:{%field%}|nullable|default:',
            'validation' => [
                'create' => 'required|min:4',
                'update' => 'required|min:4',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'resume' => [
            'label' => 'Resume',
            'type' => 'file',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => false,
            'migration' => 'text:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'photo' => [
            'label' => 'Photo',
            'type' => 'image',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => false,
            'migration' => 'text:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'galleries' => [
            'label' => 'Gallery',
            'type' => 'image',
            'class' => '',
            'attributes' => [
                'multiple' => 'multiple',
            ],
            'list' => true,
            'search' => false,
            'migration' => 'json:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => 'array',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'username' => [
            'label' => 'User Name',
            'type' => 'text',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => true,
            'migration' => 'string:{%field%}|nullable|default:',
            'validation' => [
                'create' => 'required|min:4',
                'update' => 'required|min:4',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'dob' => [
            'label' => 'Date of Birth',
            'type' => 'date', // https://www.daterangepicker.com
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => true,
            'migration' => 'date:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => 'datetime:Y-m-d',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'date_time' => [
            'label' => 'Date Time',
            'type' => 'datetime',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => true,
            'migration' => 'datetime:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => true,
        ],

        'published_at' => [
            'label' => 'Post Published Date',
            'type' => 'date',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => true,
            'migration' => 'date:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => true,
        ],

        'timing' => [
            'label' => 'Timing',
            'type' => 'time',
            'class' => '',
            'attributes' => [],
            'list' => true,
            'search' => false,
            'migration' => 'time:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => true,
        ],

        'age' => [
            'label' => 'Age',
            'type' => 'number',
            'class' => '',
            'attributes' => [
                'min' => 1,
                'max' => 100,
                'test' => 'hello world',
            ],
            'list' => false,
            'search' => false,
            'migration' => 'integer:{%field%}|nullable|default:0',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'editor' => [
            'label' => 'Editor',
            'type' => 'editor',
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => false,
            'migration' => 'longText:{%field%}|nullable',
            'validation' => [
                'create' => 'required|min:4',
                'update' => 'required|min:4',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'textarea' => [
            'label' => 'Textarea',
            'type' => 'textarea',
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => false,
            'migration' => 'longText:{%field%}|nullable',
            'validation' => [
                'create' => 'required|min:4',
                'update' => 'required|min:4',
            ],
            'options' => [],
            'casts' => '',
            'mutators' => [],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'select' => [
            'label' => 'Select',
            'type' => 'select',
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => true,
            'migration' => 'string:{%field%}|nullable|default:',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [ // will be added in settings model
                'option_1' => 'Option 1',
                'option_2' => 'Option 2',
            ],
            'casts' => '',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'hobbies' => [
            'label' => 'Hobbies',
            'type' => 'checkbox',
            'class' => '',
            'attributes' => [],
            'stacked' => true,
            'list' => false,
            'search' => true,
            'migration' => 'json:{%field%}|nullable',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [ // will be added in settings model
                'coding' => 'Coding',
                'sport' => 'Sport',
                'coffee' => 'Making Coffee',
            ],
            'casts' => 'array',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'marital' => [
            'label' => 'Marital',
            'type' => 'radio',
            'class' => '',
            'attributes' => [],
            'stacked' => false,
            'list' => false,
            'search' => true,
            'migration' => 'string:{%field%}|nullable|default:',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [ // will be added in settings model
                'single' => 'Single & Available',
                'married' => 'Married & Not Available',
                'seperated' => 'Seperated & Soon Divorce',
                'divorced' => 'Divorce & Available',
            ],
            'casts' => '',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'status' => [
            'label' => 'Status',
            'type' => 'select',
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => true,
            'migration' => 'string:{%field%},1|nullable|default:',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            'options' => [ // will be added in settings model
                'A' => 'Active',
                'I' => 'Inactive',
            ],
            'casts' => '',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => '',
            'user_timezone' => false,
        ],

        'author_id' => [
            'label' => 'Author',
            'type' => 'select', // empty to exclude form
            'class' => '',
            'attributes' => [],
            'list' => false,
            'search' => false,
            'migration' => 'integer:{%field%}|nullable|default:0',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            // 'options' => "app(config('dashing.Models.User'))->query()->pluck('name','id')", // "app('App/User')->query()->pluck('name','id')"
            // if both options and model_options are set at same time, model_options will be priority and ignored options
            'model_options' => "app(config('dashing.Models.User'))->query()->pluck('name','id')->toArray()",
            'casts' => '',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => [
                'author' => 'belongsTo:App\User,author_id,id',
            ],
            'user_timezone' => false,
        ],

        'another_user_id' => [
            'label' => 'Another Users',
            'type' => 'datalist',
            'class' => '',
            'attributes' => [
                'multiple' => 'multiple',
                ],
            'list' => false,
            'search' => false,
            'migration' => 'integer:{%field%}|nullable|default:0',
            'validation' => [
                'create' => 'required',
                'update' => 'required',
            ],
            // 'options' => "app(config('dashing.Models.User'))->query()->pluck('name','id')", // "app('App/User')->query()->pluck('name','id')"
            // if both options and model_options are set at same time, model_options will be priority and ignored options
            'model_options' => "app(config('dashing.Models.User'))->query()->pluck('name','id')->toArray()",
            'casts' => '',
            'mutators' => [
                'get' => '',
                'set' => '',
            ],
            'relationship' => [
                'another_user' => 'belongsTo:App\User,another_user_id,id',
            ],
            'user_timezone' => false,
        ],
    ],

    'appends' => [
        'status_name' => 'return settings(\'{%model_variable%}_status\')[$this->attributes[\'status\']] ?? $this->attributes[\'status\'];',
    ],
];
