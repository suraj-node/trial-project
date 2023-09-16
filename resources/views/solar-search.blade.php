<div class="row">
    @if ($search)
        <div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
            <span class="text-sm">
                <span class="text-sm">
                    @if ($total)
                        @if ($total > 1)
                            {{ $total }} results
                        @elseif($total == 1)
                            {{ $total }} result
                        @endif
                    @else
                        No record
                    @endif
                    found for <strong> &quot;{{ $search }}&quot; <a href="{{ $back_url }}" style="float: right"
                            class="alert-link text-white">Back</a></strong>
                </span>
            </span>
        </div>
    @endif

    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible text-white mt-3" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
        </div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible text-white mt-3" role="alert">
            <span class="text-sm">{{ Session::get('error') }}</span>
        </div>
    @endif

</div>

<form method="get" action="{{ $search_url }}" enctype="application/x-www-form-urlencoded">


    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <input type="text" name="search" class="form-control"
                            placeholder="{{ $placeholder_search }}" autocomplete="off">
                    </div>
                    <div class="col-md-2 mb-1 mt-3">
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</form>
