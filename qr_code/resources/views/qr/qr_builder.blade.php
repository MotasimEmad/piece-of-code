@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('QR Builder') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-8">
                            <form method="POST" action="{{ route('do_qr_builder') }}">
                                @csrf
                                <div class="form-group">
                                    <lable for="name">Name</lable>
                                    <input type="text" name="name" class="form-control" required/> 
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group mt-3">
                                    <lable for="body">Body</lable>
                                    <input type="text" name="body" class="form-control" required/> 
                                    @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <lable for="qr_size">QR Code Size</lable>
                                            <select name="qr_size" class="form-control">
                                                <option value="300">300x300</option>
                                                <option value="600">600x600</option>
                                                <option value="900">900x900</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <lable for="qr_type">QR Code Type</lable>
                                            <select name="qr_type" class="form-control">
                                                <option value="png">PNG</option>
                                                <option value="svg">svg</option>
                                                <option value="900">900x900</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Generate QR Code
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-4">
                            @if (session('code'))
                                {!! session('code') !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection