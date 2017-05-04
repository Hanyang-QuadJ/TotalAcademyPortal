@extends('layouts.app')

@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>학생페이지입니다.</h1>
                <table id="student-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>이름</th>
                        <th>관리</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>이름</th>
                        <th>관리</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($students as $student)
                        <tr>

                            <td>{{$student->name}}</td>
                            <td>
                                <span>임지후</span>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
    </div>
</div>
@endsection
