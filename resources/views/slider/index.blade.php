@extends('admin.layouts.dashboard')

@section('header')
    سلايدر
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('سلايدر') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>الصورة</th>
										<th>العنوان</th>
										<th>الوصف</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td><button type="submit" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#imageModal{{ $slider->id }}">
                                                    <i class="fa fa-fw fa-mountain-sun"></i>
                                                </button>
                                                <!-- The Modal to show image -->
                                                <div class="modal fade" id="imageModal{{ $slider->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <img src="{{ $slider->image_uri }}" class="img-fluid">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                    </td>
											<td>{{ $slider->title }}</td>
											<td>{{ $slider->description }}</td>

                                            <td>
                                                <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('sliders.show',$slider->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('sliders.edit',$slider->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sliders->links() !!}
            </div>
        </div>
    </div>
@endsection
