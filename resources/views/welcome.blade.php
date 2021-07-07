@extends('layouts/app')
        @section('header')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8500f75e5b.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            /* Include the padding and border in an element's total width and height */
            * {
              box-sizing: border-box;
              font-family: Nunito, san-serif;
            }

            /* Remove margins and padding from the list */
            .wrap1 ul {
              margin: 0;
              padding: 0;
            }

            /* Style the list items */
            .wrap1 ul li {
              position: relative;
              padding: 12px 8px 12px 40px;
              background: #eee;
              font-size: 18px;
              transition: 0.2s;
              display: flex;
              flex-flow: row nowrap;
              align-items: center;
              justify-content: flex-start;


              /* make the list items unselectable */
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }

            /* Set all odd list items to a different color (zebra-stripes) */
            .wrap1 ul li:nth-child(odd) {
              background: #f9f9f9;
            }

            /* Darker background-color on hover */
            .wrap1 ul li:hover {
              background: #ddd;
            }

            .wrap1 ul li .task {
                flex-grow: 1;
            }

            .wrap1 ul li .action {
                margin: 5px 15px;
                vertical-align: middle;
            }

            .wrap1 ul li a {
                color: grey;
            }

            /* Style the header */
            .wrap1 .header1 {
              background-color: #f44336;
              padding: 30px 40px;
              color: white;
              text-align: center;
            }

            /* Clear floats after the header */
            .wrap1 .header1:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Style the input */
            .wrap1 input {
              margin: 0;
              border: none;
              border-radius: 0;
              width: 75%;
              padding: 10px;
              float: left;
              font-size: 16px;
            }

            /* Style the "Add" button */
            .wrap1 .addBtn {
              padding: 10px;
              width: 25%;
              background: #d9d9d9;
              color: #555;
              float: left;
              text-align: center;
              font-size: 16px;
              cursor: pointer;
              transition: 0.3s;
              border-radius: 0;
              border: none;
            }

            .wrap1 .addBtn:hover {
              background-color: #bbb;
            }
        </style>

        @endsection


        @section('content')

            @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
                </div>
            @endif

            <div class="wrap1">
        <form action="{{route('create-task')}}" method="post">
            @csrf
            <div id="myDIV" class="header1">
              <h2>My To Do List</h2>
              <input class="input1" type="text" name="newTask" placeholder="Title...">
              <button type="submit" class="addBtn">Add</button>
            </div>
        </form>
        <ul id="myUL">
            @foreach($tasks as $task)
              <li>
                <div class="task">
                    {{$task['title']}}
                </div>
                <div class="action change">
                    <a href="{{route('update-task', ['id'=>$task['id']])}}"><i class="fa fa-edit"></i></a>
                </div>
                <div class="action">
                    <a href="{{route('delete-task', ['id'=>$task['id']])}}"><i class="fa fa-trash-alt"></i></a>
                </div>
              </li>
            @endforeach
        </ul>
            </div>



    @endsection
