<h4 class="modal-title text-xs-center">Registrase</h4> 
@if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
                </ul>
        </div>
@endif