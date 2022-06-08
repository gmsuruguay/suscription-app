<div class="mb-3">
    <label class="form-label">Estado</label>
    <select class="form-control  @error('state_id') is-invalid @enderror" name="state_id" >
        <option value="">Selecciona el estado</option>
        @foreach ($states as $key => $value)
            <option value="{{ $value->id }}" {{  $value->id == old('state_id',$suscription->state_id)  ? 'selected' : '' }}> 
                {{ $value->name }} 
            </option>
        @endforeach  
    </select>    
    @error('state_id')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror  
</div>  


<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email',$suscription->email) }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror  
</div>