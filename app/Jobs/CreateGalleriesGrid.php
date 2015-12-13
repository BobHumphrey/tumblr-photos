<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Gallery;
// Grids
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\EloquentDataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class CreateGalleriesGrid extends Job implements SelfHandling
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
    $narrowColumns = [
      (new FieldConfig('id'))
      ->setLabel('Actions')
      ->setSortable(true)
      ->setCallback(function ($val) {
        $iconShow = '<span class="fa fa-eye"></span>&nbsp;';
        $hrefShow = action('GalleriesController@show', [$val]);
        $iconUpdate = '<span class="fa fa-pencil"></span>&nbsp;';
        $hrefUpdate = action('GalleriesController@edit', [$val]);
        $iconDelete = '<span class="fa fa-times"></span>&nbsp;';
        $hrefDelete = action('GalleriesController@delete', [$val]);
        return '<a href="' . $hrefShow . '">' . $iconShow . '</a>&emsp;'
        . '<a href="' . $hrefUpdate . '">' . $iconUpdate . '</a>&emsp;'
        . '<a href="' . $hrefDelete . '">' . $iconDelete . '</a>';
      }),
      (new FieldConfig('name'))
      ->setSortable(true)
      ->setSorting(Grid::SORT_ASC),
      (new FieldConfig('url'))
      ->setCallback(function ($val) {
        return '<a href="' . $val . '" target="_blank">' . $val . '</a>';
      }),
    ];

    $additionalColumns = [
      (new FieldConfig('quality'))
      ->setLabel('Published')
      ->setCallback(function ($val) {
        if ($val) {
          return '<span class="fa fa-check"></span>&nbsp;';
        }
      }),
      (new FieldConfig('promo'))
      ->setCallback(function ($val) {
        if ($val) {
          return '<span class="fa fa-check"></span>&nbsp;';
        }
      }),
    ];

    $wideColumns = array_merge($narrowColumns, $additionalColumns);

    $narrowCfg = (new GridConfig())->setDataProvider(
    new EloquentDataProvider(
    (new Gallery)
    ->newQuery()
    )
    )
    ->setColumns($narrowColumns);
    $narrowGrid = new Grid($narrowCfg);

    $wideCfg = (new GridConfig())->setDataProvider(
    new EloquentDataProvider(
    (new Gallery)
    ->newQuery()
    )
    )
    ->setColumns($wideColumns);
    $grid = new Grid($wideCfg);
    return array(
      'narrowGrid' => $narrowGrid,
      'grid' => $grid,
    );
  }
}
