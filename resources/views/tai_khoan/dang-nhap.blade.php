<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Signup</title>
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="signup">
      <h1 class="signup-heading">Sign up</h1>
      <button class="signup-social">
        <i class="fa fa-google signup-social-icon"></i>
        <span class="signup-social-text">Sign up with Google</span>
      </button>
      <div class="signup-or"><span>Or</span></div>
      <form action="#" class="signup-form" autocomplete="off">
        <label for="fullname" class="signup-label">Full name</label>
        <input type="text" id="fullname" class="signup-input" placeholder="Eg: John Doe">
        <label for="email" class="signup-label">Email</label>
        <input type="email" id="email" class="signup-input" placeholder="Eg: johndoe@gmai.com">
        <button class="signup-submit">Sign up</button>
      </form>
      <p class="signup-already">
        <span>Already have an account ?</span>
        <a href="#" class="signup-login-link">Login</a>
      </p>
    </div>
  </body>
</html>