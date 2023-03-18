@extends('coordinator.layouts.dashboard')

@section('header')
    المشتركين
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                المشتركين
                            </span>

{{--                             <div class="float-right">--}}
{{--                                <a href="{{ route('coordinator.paths.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('إنشاء جديد') }}--}}
{{--                                </a>--}}
{{--                              </div>--}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>

										<th>المشترك</th>
										<th>رقم هاتف</th>
										<th>العنوان</th>
										<th>المسار</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscription as $sub)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

											<td>{{ $sub->user->name }}</td>
											<td>{{ $sub->user->phone_number }}</td>
											<td>{{ $sub->user->address }}</td>
											<td>
                                                @foreach ($sub->paths as $path)
                                                    <p>{{ $path->name }}</p>
                                                @endforeach
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
{{--                {!! $subs->links() !!}--}}
            </div>
        </div>
    </div>
@endsection
