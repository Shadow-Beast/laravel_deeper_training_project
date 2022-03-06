<x-app-layout>
    @auth
        <p>You are logged in !!!</p>
    @endauth
    @guest
        <p>Hello, Guest</p>
    @endguest
</x-app-layout>