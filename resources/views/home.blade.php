<!DOCTYPE html>
<html>
    <head></head>
    <body>
        @auth
        <p>Welcome</p>
        
        <a href="/dashboard">Dashboard</a>
            
        <a href="/logout">Logout</a>
        @endauth
        @guest
        <a href="/login">Login</a>
        @endguest
        
       
    
    </body>

</html>