@extends('admin.layouts.dashboard')

@section('header')
    المواقع
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                المواقع
                            </span>

                             <div class="float-right">
                                <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>صورة</th>
										<th>فيديو</th>
										<th>الحالة</th>
										<th>المستخدم</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $area->name }}</td>
											<td>{{ $area->description }}</td>
											<td>
                                                <button type="submit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#imageModal{{ $area->id }}">
                                                    <i class="fa fa-fw fa-mountain-sun"></i>
                                                </button>
                                                <!-- The Modal to show image -->
                                                <div class="modal fade" id="imageModal{{ $area->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <img src="{{ $area->image_url }}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
											<td>
                                                @if($area->video_url != null || $area->video_url != '')
                                                    <button type="submit" class="btn btn-outline-primary btn-sm"
                                                            data-toggle="modal" data-target="#vidoeModal{{ $area->id }}">
                                                        <i class="fa  fa-play-circle"></i></button>
                                                    <!-- The Modal to show image -->
                                                    <div class="modal fade" id="vidoeModal{{ $area->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <video controls class="w-100">
                                                                        <source src="{{$area->video_path}}" type="video/mp4">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </td>
											<td>
                                                @if($area->status == 1)
                                                    <span class="badge badge-success">نشط</span>
                                                @else
                                                    <span class="badge badge-danger">غير نشط</span>
                                                @endif
                                            </td>
											<td>{{ $area->user->name }}</td>

                                            <td>
                                                <form action="{{ route('areas.destroy',$area->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('areas.show',$area->id) }}"><i class="fa fa-fw fa-eye"></i> عرض</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('areas.edit',$area->id) }}"><i class="fa fa-fw fa-edit"></i>تعديل</a>
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
                {!! $areas->links() !!}
            </div>
        </div>
    </div>
@endsection
