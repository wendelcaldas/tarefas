<style>
    .sidebar{
        width: 14%;
        height: 100vh;

        box-shadow: 3px 3px 3px 3px rgb(171, 171, 171);
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 1;
    }
    .fotoperfil{
        width: 80%;
        height: 160px;
        background-color: rgb(255, 255, 255);
        border-radius: 50%;
        margin-top: 5vh;
        background-image: url('/images/eu.png');
        background-size: cover;
    }
    #nome{
        margin-top: 10px;
        margin-bottom: 0px;
    }
    #nivel{
        font-weight: bold;
    }
    .menu-lateral{
        height: 50%;
    }
    
</style>

<div class="sidebar">
    <div class="fotoperfil">
        
    </div>
    <p id="nome"> {{ auth()->user()->name }} </p>
    <p id="nivel">nivel 26</p>
    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
        <div class="progress-bar text-bg-warning" style="width: 75%">75%</div>
    </div>
    <section class="menu-lateral">

    </section>
    <form method="POST" action="{{ route('logout') }}">
        @csrf <!-- Adicione um campo de token CSRF para segurança -->
        <button>LOGOUT</button>
    </form>

</div>