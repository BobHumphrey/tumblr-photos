<div class="form-group">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('url', 'Url:') !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('membership_date', 'Membership Date:') !!}
    <div class="form-group">
        <div class='input-group date'>
            {!! Form::text('membership_date', null, ['class' => 'form-control']) !!}
            <span class="input-group-addon">
                <span class="fa fa-calendar"></span>
            </span>
        </div>
    </div>
</div>

<div class="row">
  <div class="checkbox-line">
    <div class="col-md-3">
      {!! Form::hidden('quality', false) !!} 
      {!! Form::checkbox('quality') !!} Quality
    </div>  
    <div class="col-md-3">
      {!! Form::hidden('promo', false) !!} 
      {!! Form::checkbox('promo') !!} Promo
    </div> 
    <div class="col-md-3">
      {!! Form::hidden('accepts_members', false) !!} 
      {!! Form::checkbox('accepts_members') !!} Accepts members
    </div> 
    <div class="col-md-3">
      {!! Form::hidden('member', false) !!} 
      {!! Form::checkbox('member') !!} Member
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

