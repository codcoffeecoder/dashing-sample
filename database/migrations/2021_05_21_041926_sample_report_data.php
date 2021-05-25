<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SampleReportData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        app(config('dashing.Models.Report'))->create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Sample Report',
            'queries' => ["select * from settings;","select * from roles;"],
            'status' => 'A',
        ]);
        app(config('dashing.Models.Cronjob'))->query()->create([
            'name' => 'Run Report',
            'command' => 'dashing:run:report --clearcache',
            'status' => 'A',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
