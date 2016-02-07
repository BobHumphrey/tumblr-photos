<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Submission;
// Grids
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\EloquentDataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class CreateSubmissionsGrid extends Job implements SelfHandling
{
  protected $submissions;
  protected $page;
  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct($submissions, $page)
  {
    $this->submissions = $submissions;
    $this->page = $page;
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    $firstColumns = [
      (new FieldConfig('submission_id'))
      ->setLabel('Actions')
      ->setSortable(true)
      ->setCallback(function ($val) {
        $iconShow = '<span class="fa fa-eye"></span>&nbsp;';
        $hrefShow = action('SubmissionsController@show', [$val]);
        $iconUpdate = '<span class="fa fa-pencil"></span>&nbsp;';
        $hrefUpdate = action('SubmissionsController@edit', [$val]);
        $iconDelete = '<span class="fa fa-times"></span>&nbsp;';
        $hrefDelete = action('SubmissionsController@delete', [$val]);
        return '<a href="' . $hrefShow . '">' . $iconShow . '</a>&emsp;'
        . '<a href="' . $hrefUpdate . '">' . $iconUpdate . '</a>&emsp;'
        . '<a href="' . $hrefDelete . '">' . $iconDelete . '</a>';
      }),

    ];

    $photoColumn = [
      (new FieldConfig('photo.id'))
      ->setLabel('Photo')
      ->setCallback(function ($val, EloquentDataRow $row) {
        $rowData = $row->getSrc();
        $image = '<img src="/photo_files/thumbnail/' . $rowData->photo->file_name . '" />';
        $hrefShow = action('PhotosController@show', [$val]);
        return '<a href="' . $hrefShow . '">' . $image . '</a>';
      }),
    ];

    $galleryColumn = [
      (new FieldConfig('gallery.id'))
      ->setLabel('Site')
      ->setCallback(function ($val, EloquentDataRow $row) {
        $rowData = $row->getSrc();
        $hrefShow = action('GalleriesController@show', [$val]);
        return '<a href="' . $hrefShow . '">' . $rowData->gallery->name . '</a>';
      }),

      (new FieldConfig('submitted_date')),
      //->setSortable(true)
      //->setSorting(Grid::SORT_DESC),
    ];

    $additionalColumns = [
      (new FieldConfig)->setName('published_date')->setLabel('Reblog Date'),
      //->setSortable(true)
      //->setSorting(Grid::SORT_DESC),
    ];

    switch($this->page) {
      case "submissions":
      $gridColumns = array_merge($firstColumns, $photoColumn, $galleryColumn, $additionalColumns);
      $narrowGridColumns = array_merge($firstColumns, $photoColumn, $galleryColumn);
      break;
      case "photo":
      $gridColumns = array_merge($firstColumns, $galleryColumn, $additionalColumns);
      $narrowGridColumns = array_merge($firstColumns, $galleryColumn, $additionalColumns);
      break;
      case "gallery":
      $gridColumns = array_merge($firstColumns, $photoColumn, $additionalColumns);
      $narrowGridColumns = array_merge($firstColumns, $photoColumn, $additionalColumns);
      break;
    }

    $narrowCfg = (new GridConfig())->setDataProvider(
    new EloquentDataProvider(
    ($this->submissions)
    )
    )
    ->setColumns($narrowGridColumns);
    $narrowGrid = new Grid($narrowCfg);

    $gridCfg = (new GridConfig())->setDataProvider(
    new EloquentDataProvider(
    ($this->submissions)
    )
    )
    ->setColumns($gridColumns);
    $grid = new Grid($gridCfg);

    return array(
      'narrowGrid' => $narrowGrid,
      'grid' => $grid,
    );
  }
}
