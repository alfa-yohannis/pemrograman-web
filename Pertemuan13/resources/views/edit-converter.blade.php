@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __( $title ) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('converter.update', $converter->id) }}" method="POST">
                      @method('PUT')
                      @csrf
                      <div class="mb-3">
                        <label for="from_currency" class="form-label">From Currency</label>
                        <input type="text" class="form-control" id="from_currency" aria-describedby="emailHelp" name="from_currency" value="{{ $converter['from_currency'] }}">
                      </div>
                      <div class="mb-3">
                        <label for="from_currency_description" class="form-label">From Currency Description</label>
                        <input type="text" class="form-control" id="from_currency_description" name="from_currency_description" value="{{ $converter['from_currency_description'] }}">
                      </div>
                      <div class="mb-3">
                        <label for="to_currency" class="form-label">To Currency</label>
                        <input type="text" class="form-control" id="to_currency" aria-describedby="emailHelp" name="to_currency" value="{{ $converter['to_currency'] }}">
                      </div>
                      <div class="mb-3">
                        <label for="to_currency_description" class="form-label">To Currency Description</label>
                        <input type="text" class="form-control" id="to_currency_description" name="to_currency_description" value="{{ $converter['to_currency_description'] }}">
                      </div>
                      <div class="mb-3">
                        <label for="conversion_rate" class="form-label">Conversion Rate</label>
                        <input type="number" class="form-control" id="conversion_rate" name="conversion_rate" value="{{ $converter['conversion_rate'] }}">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection