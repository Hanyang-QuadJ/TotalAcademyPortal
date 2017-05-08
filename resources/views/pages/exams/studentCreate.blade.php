@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>학생추가</h2>
            <form action="/exam/student/{{$exam->id}}" method="post">
                {{ csrf_field() }}
                <select name="student" class="form-control" id="exam-studentCreate">


                    @foreach($students as $student)
                        @if($exam->students->contains($student))
                        @else()
                            <option value="{{$student->id}}">{{$student->name}}</option>
                        @endif
                    @endforeach

                </select>
                <label>점수</label>

                <input class="form-control" name="score" type="text">
                <button class="btn btn-primary" type="submit">제출</button>
            </form>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#exam-studentCreate').select2();
            $('#exam-studentCreate').select2().maximizeSelect2Height();
        });
    </script>
@endsection
