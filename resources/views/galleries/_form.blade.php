<div class="form-group">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('url', 'Url:') !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="row">
  <div class="checkbox-line">
    <div class="col-md-3">
      {!! Form::hidden('ignore_this_site', false) !!}
      {!! Form::checkbox('ignore_this_site') !!} Ignore
    </div>  
  </div>
</div>

<div class="row">
  <div class="delete-buttons">
    <div class="col-sm-3 col-md-2">
      {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
  </div>
</div>
