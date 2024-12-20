<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png"> 
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My Auth App</title>
    
</head>
<body>
  <div id="loginpage">
    <button id="signInButton"><i class="fa fa-google" style="font-size:20px;color: aqua;"></i> Sign In with Google</button>
    <button id="signOutButton">Sign Out</button>

    <div id="message">
        <p>You have signed in as <span id="userName"></span> with the email <span id="userEmail"></span> </p>
    </div>
  </div>
    
<?php
include 'connection.php';
?>

<script type="module">
  
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.0.0/firebase-app.js";
 

  import { getAuth, GoogleAuthProvider, signInWithPopup, signOut, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.0.0/firebase-auth.js";
  
 // For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDXIbUIbKYmKVPUtfrzCPAxLb2t4r_Jlww",
  authDomain: "account-f83b4.firebaseapp.com",
  databaseURL: "https://account-f83b4-default-rtdb.firebaseio.com",
  projectId: "account-f83b4",
  storageBucket: "account-f83b4.appspot.com",
  messagingSenderId: "374695878902",
  appId: "1:374695878902:web:72ea054fbd780f98650cd7",
  measurementId: "G-D0XY2VX61J"
};



  const app = initializeApp(firebaseConfig);
  const auth = getAuth();
  const provider = new GoogleAuthProvider()

  const signInButton = document.getElementById("signInButton");
  const signOutButton = document.getElementById("signOutButton");
  const message = document.getElementById("message");
  const userName = document.getElementById("userName");
  const userEmail = document.getElementById("userEmail");

  signOutButton.style.display = "none";
  message.style.display = "none";

  const userSignIn = async() => {
    signInWithPopup(auth, provider)
    .then((result) => {
        const user = result.user
        console.log(user);
    }).catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message
    })
  }

  const userSignOut = async() => {
    signOut(auth).then(() => {
        alert("You have signed out successfully!");
    }).catch((error) => {})
  }

  onAuthStateChanged(auth, (user) => {
    if(user) {
      signOutButton.style.display = "block";
      message.style.display = "block";
      userName.innerHTML = user.displayName;
      userEmail.innerHTML = user.email;
      location.href = "users/user_1/user_1.php";
    } 
    else 
    {
      signOutButton.style.display = "none";
      message.style.display = "none";
    }
  })

  signInButton.addEventListener('click', userSignIn);
  signOutButton.addEventListener('click', userSignOut);



</script>
</body>
</html>