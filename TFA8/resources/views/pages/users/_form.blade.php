<div class="form-grid">
    <div class="field">
        <label for="username">Username <span class="required">*</span></label>
        <input id="username" name="username" type="text" value="{{ old('username', $user->username ?? '') }}" required maxlength="80" autocomplete="username">
        @error('username')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="field">
        <label for="full_name">Full name <span class="required">*</span></label>
        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $user->full_name ?? '') }}" required maxlength="255" autocomplete="name">
        @error('full_name')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="field">
        <label for="email">Email <span class="required">*</span></label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email ?? '') }}" required maxlength="255" autocomplete="email">
        @error('email')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="field">
        <label for="password">Password <span class="{{ isset($user) ? 'optional' : 'required' }}">{{ isset($user) ? 'Optional · leave blank to keep the current password' : 'Required · at least 8 characters' }}</span></label>
        <input id="password" name="password" type="password" {{ isset($user) ? '' : 'required' }} minlength="8" autocomplete="new-password">
        @error('password')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="field">
        <label for="password_confirmation">Confirm password {{ isset($user) ? '(if changing it)' : '' }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" {{ isset($user) ? '' : 'required' }} minlength="8" autocomplete="new-password">
    </div>
</div>
