@extends('admin.layouts.dashboard')


@section('header')
    الخدمات
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الخدمات') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('إنشاء جديد') }}
                                </a>
                            </div>
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

                                        <th>العنوان</th>
                                        <th>الوصف</th>
                                        <th>الصورة</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                <button type="submit" class="btn btn-outline-primary btn-sm"
                                                    data-toggle="modal" data-target="#imageModal{{ $service->id }}">
                                                    <i class="fa fa-fw fa-mountain-sun"></i>
                                                </button>
                                                <!-- The Modal to show image -->
                                                <div class="modal fade" id="imageModal{{ $service->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <img src="{{ $service->image_url }}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                {{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('services.show',$service->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('services.edit', $service->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> تعديل</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> حذف</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
