<form wire:submit.prevent="register">
    <div>
        <label for="email">Email</label>
        <input wire:model="email" type="text" id="email" name="email">

    </div>
    <div>
        <label for="password">Password</label>
        <input wire:model="email" type="text" id="password" name="password">

    </div>
    <div>
        <label for="passwordConfirmation">PasswordConfirmation</label>
        <input wire:model="email" type="text" id="passwordConfirmation" name="passwordConfirmation">

    </div>

    <div>
        <input type="submit" value="Register">
    </div>

</form>
