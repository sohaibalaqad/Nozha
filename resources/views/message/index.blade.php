@extends('admin.layouts.dashboard')

@section('header')
    الرسائل
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الرسائل') }}
                            </span>

{{--                             <div class="float-right">--}}
{{--                                <a href="{{ route('messages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('Create New') }}--}}
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

										<th>الإسم</th>
										<th>الإيميل</th>
										<th>رقم الهاتف</th>
										<th>العنوان</th>
										<th>الرسالة</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $message->name }}</td>
											<td>{{ $message->email }}</td>
											<td>{{ $message->phone }}</td>
											<td>{{ $message->subject }}</td>
											<td>{{ $message->message }}</td>

                                            <td>
                                                <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('messages.show',$message->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('messages.edit',$message->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>--}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $messages->links() !!}
            </div>
        </div>
    </div>
@endsection
