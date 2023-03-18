@extends('admin.layouts.dashboard')

@section('header')
    الإدارة
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الإدارة') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admins.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>البريد الإلكتروني</th>
										<th>نوعه</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $admin->name }}</td>
											<td>{{ $admin->username }}</td>
											<td>{{ $admin->email }}</td>
											<td>
                                                @if($admin->super_admin)
                                                    مدير عام
                                                @else
                                                    مدير مساعد
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('admins.show',$admin->id) }}"><i class="fa fa-fw fa-eye"></i> عرض</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('admins.edit',$admin->id) }}"><i class="fa fa-fw fa-edit"></i> تعديل</a>
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
                {!! $admins->links() !!}
            </div>
        </div>
    </div>
@endsection
