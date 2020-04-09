@extends('layouts.app')
@section('title') Inicio @stop
@section('top_title') Inicio @stop
@section('content')
<div class="card">
    <div class="card-header">
        <strong class="card-title"><?php echo '' ?></strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-sm btn-block btn-brand"> <i class="fa fa-eye"></i> Ver</a> 
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- .card --> 
<div class="view-more mb-3">
    <a href="{{ route('admin.invoices.index') }}" class="btn btn-block btn-brand"> <i class="fa fa-search"></i> Ver todo</a>
</div>
@endsection