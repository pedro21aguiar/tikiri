@extends('themes.default1.admin.layout.admin')
@section('content')
<section class="content-header">
    <h1> {{Lang::get('service::lang.edit_cab')}} </h1>

</section>
<div class="box box-primary">

    <div class="box-header with-border">
        <h4> {{ucfirst($cab->name)}} </h4>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ooops!</strong> Houveram alguns problemas com a sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('success')}}
        </div>
        @endif
        <!-- fail message -->
        @if(Session::has('fails'))
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.failed')}}.
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('fails')}}
        </div>
        @endif
        {!! Form::model($cab,['url'=>'service-desk/cabs/'.$cab->id,'method'=>'patch']) !!}
    </div><!-- /.box-header -->
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name',Lang::get('service::lang.name')) !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}             
            </div>
            <div class="form-group col-md-6 {{ $errors->has('head') ? 'has-error' : '' }}">
                {!! Form::label('head',Lang::get('service::lang.head')) !!}
                {!! Form::select('head',[''=>Lang::get('lang.select'),Lang::get('lang.agents')=>$agents],null,['class'=>'form-control']) !!}             
            </div>
            <div class="form-group col-md-6 {{ $errors->has('approvers') ? 'has-error' : '' }}">
                {!! Form::label('approvers',Lang::get('service::lang.members')) !!}
                {!! Form::select('approvers',[''=>Lang::get('lang.select'),Lang::get('lang.agents')=>$agents],null,['class'=>'form-control','multiple'=>true]) !!}             
            </div>
            <div class="form-group col-md-6 {{ $errors->has('aproval_mandatory') ? 'has-error' : '' }}">
                <div class="col-md-12">
                    {!! Form::label('aproval_mandatory',Lang::get('service::lang.approval_mandatory')) !!}
                </div>
                <div class="col-md-12">
                    <p>É obrigatória a aprovação de todos os membros selecionados?</p>
                    <div class="col-md-3">
                        <p> {!! Form::radio('aproval_mandatory',1) !!} Sim</p>
                    </div>
                    <div class="col-md-3">
                        <p> {!! Form::radio('aproval_mandatory',0) !!} Não</p>
                    </div>
                </div>    
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <div class="box-footer">
        {!! Form::submit(Lang::get('lang.save'),['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.box -->
</div>



@stop