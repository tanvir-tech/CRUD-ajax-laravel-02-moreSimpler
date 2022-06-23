@extends('layouts/master')
@section("content")


<div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">
                    <h3>Student form</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">id</th>
                                    <td>Value</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="col-lg-4">
                        <form >
                            <form>
                                <h4 id="addHead" class="text-center">Add Student</h4>
                                <h4 id="updateHead" class="text-center">Update Student</h4>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>


                                <input type="hidden" id="id">
                                <button type="submit" id="addButton" class="btn btn-success" onclick="addData()">Add</button>
                                <button id="updateButton" class="btn btn-warning" type="submit" onclick="editData()">Update</button>
                                {{-- <button class="btn btn-success" id="submitForm" type="submit">Add</button> --}}
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        
        <script src="{{asset('Frontend/student-form.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                 }   
            })

            $(document).ready(function () {

                $('#addHead').show();
                $('#updateHead').hide();
                $('#addButton').show();
                $('#updateButton').hide();

                alldata();

                // $('form').submit(function (e) {
                //     e.preventDefault();
                //     addData();
                //     alldata();
                // });



            });
        </script>
@endsection