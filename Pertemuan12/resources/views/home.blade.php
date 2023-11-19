@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __($title) }}
                    <a href="{{ route('converter.create') }}" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Add New Converter</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">From Currency</th>
                                <th scope="col">From Currency Description</th>
                                <th scope="col">To Currency</th>
                                <th scope="col">To Currency Description</th>
                                <th scope="col">Conversion Rate</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($converters as $converter)
                            <tr>
                                <td>{{ $converter->from_currency }}</td>
                                <td>{{ $converter->from_currency_description }}</td>
                                <td>{{ $converter->to_currency }}</td>
                                <td>{{ $converter->to_currency_description }}</td>
                                <td>{{ $converter->conversion_rate }}</td>
                                <td class="flex">
                                    <a href="{{ route('converter.edit', $converter->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('converter.destroy', $converter->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- make a footer with default pagination laravel --}}
                        <tfoot>
                            <tr>
                                <td colspan="6" class="flex mx-auto">
                                    {{ $converters->links() }}
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
