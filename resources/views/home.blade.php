@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter message</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('crypt')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="encrypt_method" value="BF-OFB" checked> BF-OFB
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encrypt_method" value="AES-256-CBC"> AES-256-CBC
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encrypt_method" value="AES-128-CBC"> AES-128-CBC
                            </label>
                        </div>
                        <input type="file" class="float-left" name="file" id="file">
                        <button type="submit" class="btn btn-success float-right" id="crypt">
                            encrypt <i class="fas fa-lock"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div id="message-block">
                @foreach($messages as $message)
                    @include('message')
                @endforeach
            </div>
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
