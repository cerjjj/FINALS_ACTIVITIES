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
</div>
