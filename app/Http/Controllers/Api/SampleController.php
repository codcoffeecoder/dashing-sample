<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $models = Sample::query()
            ->filter($request->get('filters', ''))
            ->sorting($request->get('sort', ''),$request->get('direction', ''));
        $paginated = $models->paginate(25);
        foreach ($paginated as $model) {
            // $model->actionsView = view('admin.sample.actions',compact('model'))->render();
        }
        if ($request->get('filters','') != '') {
            $paginated->appends(['filters' => $request->get('filters','')]);
        }
        if ($request->get('sort','') != '') {
            $paginated->appends(['sort' => $request->get('sort',''), 'direction' => $request->get('direction','asc')]);
        }
        $currentUrl = $request->fullUrl();
        return response()->json([
              'status_code' => 200,
              'data' => compact('paginated','currentUrl'),
        ]);
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

        activity('Created Sample: ' . $model->id, $request->input(), $model);

        return response()->json([
            'status_code' => 200,
            'data' => $model,
        ]);
    }

    public function show(Sample $model)
    {
        return response()->json([
            'status_code' => 200,
            'data' => $model,
        ]);
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

        activity('Updated Sample: ' . $model->id, $request->input(), $model);

        return response()->json([
            'status_code' => 200,
            'data' => $model,
        ]);
    }

    public function destroy(Sample $model)
    {
        $model->delete();

        activity('Deleted Sample: ' . $model->id, [], $model);

        return response()->json([
            'status_code' => 200,
        ]);
    }
}
