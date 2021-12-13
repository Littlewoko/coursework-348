@extends('layouts.newapp')

@section('title')
    All the Comments!
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js">
    </script>
    <p>
        Chaos
    </p>

    <div id="root">
        <ul>
            <li v-for="comment in comments">
                @{{ comment.comment_text }}
            </li>
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