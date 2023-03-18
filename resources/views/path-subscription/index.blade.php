@extends('layouts.app')

@section('template_title')
    Path Subscription
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Path Subscription') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('path-subscriptions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Path Id</th>
										<th>Subscription Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pathSubscriptions as $pathSubscription)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pathSubscription->path_id }}</td>
											<td>{{ $pathSubscription->subscription_id }}</td>

                                            <td>
                                                <form action="{{ route('path-subscriptions.destroy',$pathSubscription->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('path-subscriptions.show',$pathSubscription->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('path-subscriptions.edit',$pathSubscription->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pathSubscriptions->links() !!}
            </div>
        </div>
    </div>
@endsection
