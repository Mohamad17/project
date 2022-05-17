@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش اطلاعیه پیامکی </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
        <li class="breadcrumb-item active">اطلاع رسانی پیامکی</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعیه پیامکی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش اطلاعیه پیامکی</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.notify.sms.update', [$sms->id]) }}" method="post">
            @csrf
            {{ method_field('put') }}
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان پیامک</label>
                    <input class="form-control form-control-sm" value="{{ old('title',$sms->title) }}" name="title" type="text" placeholder="عنوان پیامک ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="published_at">تاریخ ارسال</label>
                    <input class="form-control form-control-sm d-none" value="{{ old('published_at',$sms->published_at) }}" name="published_at" id="published_at" type="text" placeholder="تاریخ انتشار ...">
                    <input class="form-control form-control-sm" value="{{ old('published_at',$sms->published_at) }}" id="published_at_view" type="text" placeholder="تاریخ انتشار ...">
                </fieldset>
                @error('published_at')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="status">وضعیت</label>
                    <select class="form-control form-control-sm" name="status" id="status">
                        <option value="0" @if (old('status',$sms->status)==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('status',$sms->status)==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('status')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="body">متن پیامک</label>
                    <textarea class="form-control form-control-sm" id="body" name="body" cols="6"> {{ old('body',$sms->body) }}</textarea>
                </fieldset>
                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$("#published_at_view").persianDatepicker({
			 viewMode: 'YYYY-MM-DD',
			 altField: '#published_at',
             timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
            }
		});
	})
</script>
@endsection