<nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                class="navbar-toggle collapsed" type="button">
            <i class="fa fa-reorder"></i>
        </button>
        <a href="{{route('getdashboard')}}" class="navbar-brand">Shiv Medical <i class="fa fa-medkit"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{route('getdashboard')}}"> Dashboard
                    <i class="fa fa-stethoscope" style="font-size: 15px"></i>
                </a>
            </li>
            <li>
                <a href="{{route('getbill')}}"> Billing
                    <i class="fa fa-money" style="color: #000000; font-size: 15px"></i>
                </a>
            </li>
            <li>
                <a href="{{route('product_get')}}">Product Entry
                    <i class="fa fa-plus-square" style="font-size: 15px"></i>
                </a>
            </li>
            <li>
                <a href="{{route('history')}}">History
                    <i class="fa fa-history" style="font-size: 15px"></i>
                </a>
            </li>
            <li>
                <a href="{{route('getpremium')}}">Premium Customers
                    <i class="fa fa-user" style="font-size: 15px"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </li>
        </ul>
    </div>
</nav>
