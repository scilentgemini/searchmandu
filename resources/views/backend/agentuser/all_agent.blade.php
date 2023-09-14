@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.agent') }}" class="btn btn-inverse-info">Add Agent</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Agents</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Change</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allagent as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img class="wd-100 rounded-circle"
                                                    src="{{ !empty($item->photo) ? url('upload/agent_images/' . $item->photo) : url('img/no_image.jpg') }}"
                                                    alt="profile">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->role == 'agent')
                                                    <span>Agent</span>
                                                @else
                                                    <span>Imposter</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 'active')
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>Change</td>
                                            <td>
                                                <a href="{{ route('edit.agent', $item->id) }}"
                                                    class="btn btn-inverse-warning" title="Edit"><i
                                                        data-feather="edit"></i></a>
                                                <a href="{{ route('delete.agent', $item->id) }}" id="delete"
                                                    class="btn btn-inverse-danger" title="Delete"><i
                                                        data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
