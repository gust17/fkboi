@extends('padrao.padrao')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div style="color:#00ff75"
                                class="text-lg font-weight-bold  text-center text-uppercase mb-1">
                                Seu link de indicação</div>
                            <div class="h5 mb-0 font-weight-bold text-center text-gray-800">
                                <p style="font-size: 12px">{{ url('/indicacao', Auth::user()->link) }}</p>

                            </div>
                            <button style="background-color: #00ff75; color:black" class="btn btn-default btn-user btn-block"
                                onclick="copyToClipboard('#p1')">Click para copiar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <p style="opacity: 0;" id="p1">{{ url('indicacao', Auth::user()->link) }}</p>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
@endsection
