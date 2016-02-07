<?php

?>

<div class="row">
  <div class="col-md-4">
    <img src={{$photoSrc}} class="img-responsive">
    {!! Form::hidden('photo_id', $photoId) !!}
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
  </div>
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('gallery_id', 'Gallery:') !!}
          {!! Form::select('gallery_id', $galleryList, null, ['class' => 'form-control']) !!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('submitted_date', 'Submitted Date:') !!}
          <div class="form-group">
            <div class='input-group date'>
              {!! Form::text('submitted_date', null, ['class' => 'form-control']) !!}
              <span class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('published_date', 'Reblog Date:') !!}
          <div class="form-group">
            <div class='input-group date'>
              {!! Form::text('published_date', null, ['class' => 'form-control']) !!}
              <span class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
