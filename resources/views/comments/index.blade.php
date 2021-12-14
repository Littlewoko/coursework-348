@extends('layouts.newapp')

@section('title')
    All the Comments!
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js">
    </script>
    
    <div id="root">
        <h2>
            New Comment
        </h2>
        comment_text: <input type="text" id="input"
            v-model="newCommentText">
        <select name="consumer_id" v-model="newConsumerId">
            @foreach ($consumers as $consumer)
                <option value="{{ $consumer->id }}">
                    {{ $consumer->name }}
                </option>
            @endforeach
        </select>
        <button @click="createComment">Post</button>

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
                newCommentText: '',
                newConsumerId: '', 
                comments: [],
            },
            methods: {
                createComment: function(){
                    axios.post("{{ route ('api.comments.store') }}",
                    {
                        comment_text: this.newCommentText,
                        consumer_id: this.newConsumerId,
                    }).then(response=>{
                        this.comments.push(response.data);
                        this.newCommentText = '';
                        this.newConsumerId = '';
                    }).catch(response=>{
                        console.log(response);
                    })
                },
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