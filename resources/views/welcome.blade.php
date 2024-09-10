@extends('layouts.app')
<nav>
    <a href="{{ route('login') }}" class="bg-blue-500 px-5 py-2 rounded-md text-white">Login</a>
    <a href="{{ route('register') }}" class="bg-blue-500 px-5 py-2 rounded-md text-white">Register</a>
    <h1 class="text-3xl font-bold underline">Welcome</h1>
</nav>
