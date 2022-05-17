@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش اولویت تیکت </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش تیکت ها </a></li>
        <li class="breadcrumb-item active"> اولویت تیکت</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش اولویت تیکت</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش اولویت تیکت</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.ticket.priority.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.ticket.priority.update', $ticketPeriority->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان اولویت تیکت</label>
                    <input class="form-control form-control-sm" value="{{ old('name', $ticketPeriority->name) }}" name="name" type="text" placeholder="عنوان اولویت تیکت ...">
                </fieldset>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="status">وضعیت</label>
                    <select class="form-control form-control-sm" name="status" id="status">
                        <option value="0" @if (old('status', $ticketPeriority->status)==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('status', $ticketPeriority->status)==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('status')
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