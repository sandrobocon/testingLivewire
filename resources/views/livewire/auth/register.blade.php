<form wire:submit.prevent="register">
    <div>
        <label for="email">Email</label>
        <input wire:model="email" type="text" id="email" name="email">
        @error('email') <span>{{ $message }}</span> @enderror

    </div>
    <div>
        <label for="password">Password</label>
        <input wire:model.lazy="password" type="password" id="password" name="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="passwordConfirmation">Password Confirmation</label>
        <input wire:model.lazy="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation">
        @error('passwordConfirmation') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <input type="submit" value="Register">
    </div>

</form>
