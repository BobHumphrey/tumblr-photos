<div class="row">
  <div class="col-md-4">
    <img src={{$photoSrc}} class="img-responsive">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
  </div>
  <div class="col-md-8">
    <div class="form-group">
      {!! Form::label('file_name', 'File Name:') !!}
      {!! Form::text('file_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('url', 'Url:') !!}
      {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('posted_date', 'Posted Date:') !!}
          <div class="form-group">
            <div class='input-group date'>
              {!! Form::text('posted_date', null, ['class' => 'form-control']) !!}
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
