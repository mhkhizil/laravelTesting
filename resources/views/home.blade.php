<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @auth
  <h1>User is logged in </h1>
  <form action="/logout" method="post">
    @csrf
  <button>logout</button></form>
  <div>
    <h2>Create new blog post</h2>
    <form action="/create-post" method="post">
      @csrf
    <input type="text" name="title" id="" placeholder="title">
  <textarea name="body" id="" cols="30" rows="10" placeholder="body title..."></textarea>
<button>Save post</button></form>
  </div>
  <div>
    <h2>All posts</h2>
    @foreach ($posts as $post)
    <h2>{{$post['title']}}</h2>
    <p>{{$post['body']}}</p>
    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
    <form action="/delete-post/{{$post->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button>delete</button>
  </form>
    @endforeach
      
  
  </div>
    @else
    <div>
      <h2>Register </h2>
      <form action="/register" method="post">
          @csrf
          <input type="text" placeholder="name" name="name">
          <input type="text" placeholder="email" name="email">
  
          <input type="password" placeholder="password" name="password">
          <button>Register</button>
      </form>
    </div>
    <div>
      <h2>login </h2>
      <form action="/login" method="post">
          @csrf
          <input type="text" placeholder="name" name="loginname">
          <input type="password" placeholder="password" name="loginpassword">
  
     
          <button>login</button>
      </form>
    </div>
  @endauth
 
</body>
</html>