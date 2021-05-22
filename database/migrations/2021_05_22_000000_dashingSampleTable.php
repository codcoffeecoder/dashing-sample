<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DashingSampleTable extends Migration
{
    public function up()
    {
        cache()->tags(['fillable'])->flush();
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('markdown')->nullable();
            $table->string('text')->nullable()->default('');
            $table->text('resume')->nullable();
            $table->text('photo')->nullable();
            $table->json('galleries')->nullable();
            $table->string('username')->nullable()->default('');
            $table->date('dob')->nullable();
            $table->datetime('date_time')->nullable();
            $table->date('published_at')->nullable();
            $table->time('timing')->nullable();
            $table->integer('age')->nullable()->default(0);
            $table->longText('editor')->nullable();
            $table->longText('textarea')->nullable();
            $table->string('select')->nullable()->default('');
            $table->json('hobbies')->nullable();
            $table->string('marital')->nullable()->default('');
            $table->string('status', 1)->nullable()->default('');
            $table->integer('author_id')->nullable()->default(0);
            $table->integer('another_user_id')->nullable()->default(0);
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
            
        });
        $user_id = 1;

        app(config('dashing.Models.Setting'))->create(['created_by' => $user_id, 'updated_by' => $user_id, 'key' => 'sample_select','value' => ['option_1' => 'Option 1','option_2' => 'Option 2']]);
        app(config('dashing.Models.Setting'))->create(['created_by' => $user_id, 'updated_by' => $user_id, 'key' => 'sample_hobbies','value' => ['coding' => 'Coding','sport' => 'Sport','coffee' => 'Making Coffee']]);
        app(config('dashing.Models.Setting'))->create(['created_by' => $user_id, 'updated_by' => $user_id, 'key' => 'sample_marital','value' => ['single' => 'Single & Available','married' => 'Married & Not Available','seperated' => 'Seperated & Soon Divorce','divorced' => 'Divorce & Available']]);
        app(config('dashing.Models.Setting'))->create(['created_by' => $user_id, 'updated_by' => $user_id, 'key' => 'sample_status','value' => ['A' => 'Active','I' => 'Inactive']]);
        app(config('dashing.Models.Permission'))->createGroup('sample', ['create-sample', 'read-sample', 'update-sample', 'delete-sample'], $user_id);
    }
    public function down()
    {
        app(config('dashing.Models.Setting'))->where('key','sample_select')->forceDelete();
        app(config('dashing.Models.Setting'))->where('key','sample_hobbies')->forceDelete();
        app(config('dashing.Models.Setting'))->where('key','sample_marital')->forceDelete();
        app(config('dashing.Models.Setting'))->where('key','sample_status')->forceDelete();
        app(config('dashing.Models.Permission'))->where('group', 'sample')->delete();
        Schema::dropIfExists('samples');
    }
}
