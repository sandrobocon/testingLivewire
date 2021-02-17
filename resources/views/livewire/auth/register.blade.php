<form wire:submit.prevent="register">
    <div>
        <label for="email">Email</label>
        <input wire:model="email" type="text" id="email" name="email">
        @error('email') <span>{{ $message }}</span> @enderror

    </div>
    <div>
        <label for="password">Password</label>
        <input wire:model="email" type="text" id="password" name="password">
        @error('password') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="passwordConfirmation">PasswordConfirmation</label>
        <input wire:model="email" type="text" id="passwordConfirmation" name="passwordConfirmation">
        @error('passwordConfirmation') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <input type="submit" value="Register">
    </div>

</form>
