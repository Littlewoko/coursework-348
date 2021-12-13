@extends('layouts.newapp')

@section('title')
    All the Comments!
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js">
    </script>
    
    <div id="create">
        <h2>
            New Comment
        </h2>
        time_posted: <input type="text" id="input"
            v-model="newTimePosted">
        comment_text: <input type="text" id="input"
            v-model="newCommentText">
        consumer_id: <input type="text" id="input"
            v-model="newConsumerId">
        <button @click="createComment">Post</button>
    </div>

    <div id="show">
        <ul>
            <li v-for="comment in comments">
                @{{ comment.comment_text }}
            </li>
        </ul>
    </div>

    <script>
        var app = new Vue({
            el: "#create",
            data: {
                newTimePosted: '',
                newCommentText: '',
                newConsumerId: '', 
            },
            methods:{
                createComment:function(){
                    axios.post("{{route('api.comments.store')}}",
                    {
                        time_posted: this.newTimePosted,
                        comment_text: this.newCommentText,
                        consumer_id: this.newConsumerId
                    }).then(response=>{
                        this.comments.push(response.data);
                    }).catch(response=>{
                        console.log(response);
                    })
                }
            }
        });
    </script>
    <script>
        var app = new Vue({
            el: "#show",
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