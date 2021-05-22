<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sample;

class SampleController extends Controller
{
    protected $page_path = 'admin.';
    public function __construct()
    {
        $this->middleware(['auth_admin', 'can:access-admin-panel']);
        $this->middleware('intend_url')->only(['index', 'read']);
        $this->middleware('can:create-sample')->only(['create', 'store']);
        $this->middleware('can:read-sample')->only(['index', 'read']);
        $this->middleware('can:update-sample')->only(['edit', 'update']);
        $this->middleware('can:delete-sample')->only('destroy');

        // to protect your activity and reauthenticate if user is genuine
        // $this->middleware('reauth_admin')->only(['edit','destroy']);

        
        if (false == app()->runningInConsole()) {
            \Breadcrumbs::for('home', function ($trail) {
                $trail->push('sample Listing', route('sample'));
            });
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $models = Sample::query()
                ->checkBrand()
                ->filter($request->get('filters', ''))
                ->sorting($request->get('sort', ''),$request->get('direction', ''));
            $paginated = $models->paginate($request->get('take', 25));
            foreach ($paginated as $model) {
                $model->actionsView = view($this->page_path.'sample.actions',compact('model'))->render();
            }
            if ($request->get('filters','') != '') {
                $paginated->appends(['filters' => $request->get('filters','')]);
            }
            if ($request->get('sort','') != '') {
                $paginated->appends(['sort' => $request->get('sort',''), 'direction' => $request->get('direction','asc')]);
            }
            $links = $paginated->onEachSide(5)->links()->render();
            $currentUrl = $request->fullUrl();
            return compact('paginated','links','currentUrl');
        }
        $getUrl = route('sample');
        $html = [
            ['title' => 'Text', 'data' => 'text', 'sortable' => true, 'filterable' => true],
              ['title' => 'Resume', 'data' => 'resume', 'sortable' => false, 'filterable' => false],
              ['title' => 'Photo', 'data' => 'photo', 'sortable' => false, 'filterable' => false],
              ['title' => 'Gallery', 'data' => 'galleries', 'sortable' => false, 'filterable' => false],
              ['title' => 'User Name', 'data' => 'username', 'sortable' => false, 'filterable' => true],
              ['title' => 'Date of Birth', 'data' => 'dob', 'sortable' => false, 'filterable' => true],
              ['title' => 'Date Time', 'data' => 'date_time', 'sortable' => false, 'filterable' => true],
              ['title' => 'Post Published Date', 'data' => 'published_at', 'sortable' => false, 'filterable' => true],
              ['title' => 'Timing', 'data' => 'timing', 'sortable' => false, 'filterable' => false],
            ['title' => '', 'data' => 'actionsView'],
        ];
        return view($this->page_path.'sample.index', compact('html','getUrl'));
    }

    public function create(Request $request)
    {
        \Breadcrumbs::for('breadcrumb', function ($trail) {
            $trail->parent('home');
            $trail->push('New Sample');
        });
        return view($this->page_path.'sample.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "markdown" => "required|min:4",
            "text" => "required|min:4",
            "resume" => "required",
            "photo" => "required",
            "galleries" => "required",
            "username" => "required|min:4",
            "dob" => "required",
            "date_time" => "required",
            "published_at" => "required",
            "timing" => "required",
            "age" => "required",
            "editor" => "required|min:4",
            "textarea" => "required|min:4",
            "select" => "required",
            "hobbies" => "required",
            "marital" => "required",
            "status" => "required",
            "author_id" => "required",
            "another_user_id" => "required",
        ]);
        if ($request->hasFile('resume')) {
            // $path = str_replace('public', 'storage', $request->file('resume')->store('public/sample/resume'));
            $path = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/resume', $request->file('resume')));
            unset($request['resume']);
            $request->merge([
                'resume' => $path,
            ]);
        }
          if ($request->hasFile('photo')) {
            // $path = str_replace('public', 'storage', $request->file('photo')->store('public/sample/photo'));
            $path = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/photo', $request->file('photo')));
            unset($request['photo']);
            $request->merge([
                'photo' => $path,
            ]);
        }
          $uploaded_files = [];
        if ($request->hasFile('galleries')) {
            foreach($request->file('galleries') as $key => $file)
            {
                // $uploaded_files[] = str_replace('public', 'storage', $request->file('galleries.'.$key)->store('public/sample/galleries'));
                $uploaded_files[] = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/galleries', $request->file('galleries.'.$key)));
            }
            unset($request['galleries']);
            $request->merge([
                'galleries' => $uploaded_files,
            ]);
        }
        $request->merge([
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        $model = Sample::query()->create($request->input());

        sendAlert([
            'brand_id' => 0,
            'link' => $model->readUrl,
            'message' => 'New '.$model->activity_name.' Added.',
            'sender_id' => auth()->id(),
            'receiver_id' => permissionUserIds('Read sample'),
            'icon' => $model->menu_icon
        ]);

        return response()->json([
            'status' => 'success',
            'flash' => 'Sample Created.',
            'reload' => false,
            'relist' => false,
            'redirect' => route('sample'),
        ]);
    }

    public function show(Sample $model)
    {
        \Breadcrumbs::for('breadcrumb', function ($trail) {
            $trail->parent('home');
            $trail->push('Show Sample');
        });
        return view($this->page_path.'sample.show', compact('model'));
    }

    public function edit(Request $request, Sample $model)
    {
        \Breadcrumbs::for('breadcrumb', function ($trail) {
            $trail->parent('home');
            $trail->push('Edit Sample');
        });
        return view($this->page_path.'sample.edit', compact('model'));
    }

    public function update(Request $request, Sample $model)
    {
        $request->validate([
            "markdown" => "required|min:4",
            "text" => "required|min:4",
            "resume" => "required",
            "photo" => "required",
            "galleries" => "required",
            "username" => "required|min:4",
            "dob" => "required",
            "date_time" => "required",
            "published_at" => "required",
            "timing" => "required",
            "age" => "required",
            "editor" => "required|min:4",
            "textarea" => "required|min:4",
            "select" => "required",
            "hobbies" => "required",
            "marital" => "required",
            "status" => "required",
            "author_id" => "required",
            "another_user_id" => "required",
        ]);
        if ($request->hasFile('resume')) {
            // $path = str_replace('public', 'storage', $request->file('resume')->store('public/sample/resume'));
            $path = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/resume', $request->file('resume')));
            unset($request['resume']);
            $request->merge([
                'resume' => $path,
            ]);
        }
          if ($request->hasFile('photo')) {
            // $path = str_replace('public', 'storage', $request->file('photo')->store('public/sample/photo'));
            $path = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/photo', $request->file('photo')));
            unset($request['photo']);
            $request->merge([
                'photo' => $path,
            ]);
        }
          $uploaded_files = [];
        if ($request->hasFile('galleries')) {
            foreach($request->file('galleries') as $key => $file)
            {
                // $uploaded_files[] = str_replace('public', 'storage', $request->file('galleries.'.$key)->store('public/sample/galleries'));
                $uploaded_files[] = str_replace('public', 'storage', Storage::disk('public')->putFile('sample/galleries', $request->file('galleries.'.$key)));
            }
            unset($request['galleries']);
            $request->merge([
                'galleries' => $uploaded_files,
            ]);
        }
        $request->merge([
            'updated_by' => auth()->id(),
        ]);

        $model->update($request->input());

        sendAlert([
            'brand_id' => 0,
            'link' => $model->readUrl,
            'message' => $model->activity_name.' Updated.',
            'sender_id' => auth()->id(),
            'receiver_id' => permissionUserIds('Read sample'),
            'icon' => $model->menu_icon
        ]);

        return response()->json([
            'status' => 'success',
            'flash' => 'Sample Updated.',
            'reload' => false,
            'relist' => false,
            'redirect' => route('sample.edit',[$model->id]),
        ]);
    }

    public function destroy(Sample $model)
    {
        sendAlert([
            'brand_id' => 0,
            'link' => null,
            'message' => $model->activity_name.' Deleted.',
            'sender_id' => auth()->id(),
            'receiver_id' => permissionUserIds('Read sample'),
            'icon' => $model->menu_icon
        ]);
        $model->delete();
        return response()->json([
            'status' => 'success',
            'flash' => 'Sample Deleted.',
            'reload' => false,
            'relist' => true,
            'redirect' => false,
        ]);
    }

    
}
