<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Photo;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\EloquentDataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class CreatePhotoGrid extends Job implements SelfHandling
{
  protected $newOnly;
  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct($newOnly)
  {
    $this->newOnly = $newOnly;
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    if ($this->newOnly) {
      $photosQueryBuilder = Photo::where('posted_date', '=', '0000-00-00');
    }
    else {
      $photosQueryBuilder = Photo::where('id', '>', 0);
    }
    $photos = $photosQueryBuilder->get();
    $gridColumns = [
      (new FieldConfig('id'))
      ->setLabel('Actions')
      ->setSortable(true)
      ->setCallback(function ($val, EloquentDataRow $row) {
        $rowData = $row->getSrc();
        $iconShow = '<span class="fa fa-eye"></span>&nbsp;';
        $hrefShow = action('PhotosController@show', [$val]);
        $iconUpdate = '<span class="fa fa-pencil"></span>&nbsp;';
        $hrefUpdate = action('PhotosController@edit', [$val]);
        $iconDelete = '<span class="fa fa-times"></span>&nbsp;';
        $hrefDelete = action('PhotosController@delete', [$val]);
        $iconTumblr = '<span class="fa fa-tumblr-square"></span>&nbsp;';
        $hrefTumblr = $rowData->url;
        return '<a href="' . $hrefShow . '">' . $iconShow . '</a>&emsp;'
        . '<a href="' . $hrefUpdate . '">' . $iconUpdate . '</a>&emsp;'
        . '<a href="' . $hrefDelete . '">' . $iconDelete . '</a>&emsp;'
        . '<a href="' . $hrefTumblr . '" target="_blank">' . $iconTumblr . '</a>';
      }),
      (new FieldConfig('file_name'))
      ->setLabel('Photo')
      ->setCallback(function ($val, EloquentDataRow $row) {
        $rowData = $row->getSrc();
        $image = '<img src="/photo_files/thumbnail/' . $val . '" />';
        $hrefShow = action('PhotosController@show', [$rowData->id]);
        return '<a href="' . $hrefShow . '">' . $image . '</a>';
      }),
      (new FieldConfig('posted_date'))
      ->setSortable(true)
      ->setSorting(Grid::SORT_DESC),
      (new FieldConfig('notes'))->setSortable(true),
      (new FieldConfig('notes_last30'))
      ->setSortable(true)
      ->setLabel('Last 30 Days'),
      (new FieldConfig('notes_last10'))
      ->setSortable(true)
      ->setLabel('Last 10 Days'),
    ];

    $gridCfg = (new GridConfig())->setDataProvider(
    new EloquentDataProvider(
    ($photosQueryBuilder)
    )
    )
    ->setColumns($gridColumns);
    $grid = new Grid($gridCfg);

    return array(
      'narrowGrid' => null,
      'grid' => $grid,
    );
  }
}
