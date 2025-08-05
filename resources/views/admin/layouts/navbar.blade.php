 <nav class="navbar navbar-default navbar-fixed">
     <div class="container-fluid">
       <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    @php
        $breadcrumbs = generate_breadcrumbs();
        $currentTitle = count($breadcrumbs) > 0
            ? $breadcrumbs[count($breadcrumbs) - 1]['title']
            : 'Dashboard';
    @endphp

    <a class="navbar-brand" href="#">
        {{ $currentTitle }}
    </a>
</div>

         <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: center; gap: 20px;">
                 <!-- Account Link -->
                 <li style="list-style: none;">
                     <a href="{{ route('users.profile', auth()->user()->id) }}"
                         style="color: #999; text-decoration: none;">
                         Account
                     </a>
                 </li>

                 <!-- Logout Button Styled as Link -->
                 <li style="list-style: none;">
                     <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                         @csrf
                         <button type="submit"
                             style="background: none; border: none; padding: 0; margin: 0; color: #999; text-decoration: none; cursor: pointer;">
                             Log out
                         </button>
                     </form>
                 </li>
             </ul>

         </div>
     </div>
 </nav>
