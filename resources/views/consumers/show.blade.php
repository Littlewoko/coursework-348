@extends('layouts.newapp')

@section('title')
    {{ $consumer->name }}
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js">
    </script>
    <ul>
        <li>ID: {{ $consumer->id }}</li>
        <li>Name: {{ $consumer->name }}</li>
        <li>
            D.O.B: 
            {{ $consumer->date_of_birth ?? 'Unknown'}}
        </li>

    </ul>

    <a href="{{ route('consumers.index') }}">
            All Consumers
    </a>
    <form method="POST" 
        action="{{ route('consumers.destroy', [$consumer]) }}">
        @csrf
        
        <button type="submit">
            Destroy
        </button>
    </form>

    <div id="root">
        <h2>
            Comments
        </h2>

        <ul>
            <div v-for="comment in comments">
                <li v-if="comment.consumer_id == {{ $consumer->id }}">
                    @{{ comment.comment_text }}
                </li>
            </div>
        </ul>
    </div>


    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
            },
            mounted(){
                axios.get("{{route('api.comments.index')}}")
                .then(response=>{
                    this.comments = response.data;
                }).catch(response=>{
                    console.log(response);
                })
            }
        });
    </script>
@endsection
