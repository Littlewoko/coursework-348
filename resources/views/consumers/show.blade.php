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

        <h2>
            New Comment
        </h2>
        Enter a comment: <input type="text" id="input" v-model="newCommentText">
        <button @click="createComment">Enter</button>
    </div>


    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
                newCommentText: '',
                consumer_id: "{{ $consumer->id }}", 
            },
            methods: {
                createComment: function(){
                    axios.post("{{ route ('api.comments.store') }}",
                    {
                        comment_text: this.newCommentText,
                        consumer_id: this.consumer_id,
                    }).then(response=>{
                        this.comments.push(response.data);
                        this.newCommentText = '';
                    }).catch(response=>{
                        console.log(response);
                    })
                }
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
