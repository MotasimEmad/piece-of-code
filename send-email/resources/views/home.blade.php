@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Send Email') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-8">
                            <form method="POST" action="{{ route('send_email')}}">
                                @csrf
                                <div class="form-group">
                                    <lable for="name">Name</lable>
                                    <input type="text" name="name" class="form-control" required/> 
                                </div>

                                <div class="form-group mt-3">
                                    <lable for="email">Email</lable>
                                    <input type="email" name="email" class="form-control" required/> 
                                </div>

                                <div class="form-group mt-3">
                                    <lable for="subject">Subject</lable>
                                    <input type="text" name="subject" class="form-control" required/> 
                                </div>

                                <div class="form-group mt-3">
                                    <lable for="body">Message</lable>
                                    <textarea type="text" name="body" class="form-control" required></textarea> 
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection