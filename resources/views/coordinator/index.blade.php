@extends('admin.layouts.dashboard')

@section('header')
    المنسقين
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('المنسقين') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('coordinators.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('جديد') }}
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

										<th>الإسم</th>
										<th>إسم المستخدم</th>
										<th>الإيميل</th>
										<th>رقم الهاتف</th>
										<th>الحلة</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coordinators as $coordinator)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $coordinator->name }}</td>
											<td>{{ $coordinator->username }}</td>
											<td>{{ $coordinator->email }}</td>
											<td>{{ $coordinator->phone_number }}</td>
											<td>
                                                @if($coordinator->status == 'active')
                                                    <span class="badge badge-success">نشط</span>
                                                @else
                                                    <span class="badge badge-danger">غير نشط</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('coordinators.destroy',$coordinator->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('coordinators.show',$coordinator->id) }}"><i class="fa fa-fw fa-eye"></i> عرض</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('coordinators.edit',$coordinator->id) }}"><i class="fa fa-fw fa-edit"></i> تعديل</a>
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
                {!! $coordinators->links() !!}
            </div>
        </div>
    </div>
@endsection
