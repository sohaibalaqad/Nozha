@extends('admin.layouts.dashboard')

@section('header')
    المسارات
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                المسارات
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paths.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>الأسم</th>
										<th>الوصف</th>
										<th>التاريخ</th>
										<th>البدء</th>
										<th>الإنتهاء</th>
										<th>صورة</th>
                                        <th>فيديو</th>
										<th>المسافة</th>
										<th>مصاريف</th>
										<th>الحالة</th>
										<th>الموقع</th>
										<th>المنسق</th>
                                        <th>العماليات</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paths as $path)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $path->name }}</td>
											<td>{{ $path->description }}</td>
											<td>{{ $path->date }}</td>
											<td>{{ $path->start }}</td>
											<td>{{ $path->end }}</td>
											<td>
                                                <button type="submit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#imageModal{{ $path->id }}">
                                                    <i class="fa fa-fw fa-mountain-sun"></i>
                                                </button>
                                                <!-- The Modal to show image -->
                                                <div class="modal fade" id="imageModal{{ $path->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <img src="{{ $path->image_url }}" class="img-fluid">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-outline-primary btn-sm"
                                                        data-toggle="modal" data-target="#vidoeModal{{ $path->id }}">
                                                    <i class="fa  fa-play-circle"></i></button>
                                                <!-- The Modal to show image -->
                                                <div class="modal fade" id="vidoeModal{{ $path->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <video controls class="w-100">
                                                                    <source src="{{$path->video_path}}" type="video/mp4">
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
											<td>{{ $path->distance }}</td>
											<td>{{ $path->fees }}</td>
											<td>
                                                @if($path->status == 1)
                                                    <span class="badge badge-success">نشط</span>
                                                @else
                                                    <span class="badge badge-danger">غير نشط</span>
                                                @endif
                                            </td>
											<td>{{ $path->area->name ?? '' }}</td>
											<td>{{ $path->coordinator->name ?? ''}}</td>

                                            <td>
                                                <form action="{{ route('paths.destroy',$path->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paths.show',$path->id) }}"><i class="fa fa-fw fa-eye"></i>عرض</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paths.edit',$path->id) }}"><i class="fa fa-fw fa-edit"></i>تعديل</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $paths->links() !!}
            </div>
        </div>
    </div>
@endsection
