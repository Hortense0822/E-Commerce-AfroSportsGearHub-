<?php
//start session
session_start();

//for header redirection
ob_start();

//funtion to check for login

function isLoggedIn() {

    return isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['role']) && !empty($_SESSION['role']);

}

function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === "1";
}

function hasError() {
    return isset($_SESSION['error']) && !empty($_SESSION['error']);
}

//function to get user ID


//function to check for role (admin, customer, etc)





