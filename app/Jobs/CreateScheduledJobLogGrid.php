<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\ScheduledJobLog;
// Grids
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\EloquentDataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class CreateScheduledJobLogGrid extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $scheduledJobLogQueryBuilder = ScheduledJobLog::orderBy('id', 'desc');

      $wideColumns = [
        (new FieldConfig('start_time')),
        (new FieldConfig('end_time')),
      ];

      $wideCfg = (new GridConfig())->setDataProvider(
      new EloquentDataProvider(
      ($scheduledJobLogQueryBuilder)
      )
      )
      ->setColumns($wideColumns);
      $grid = new Grid($wideCfg);
      return array(
        'grid' => $grid,
      );
    }
}
