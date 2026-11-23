<div class="form-grid">
    <div class="field"><label for="full_name">Full name <span class="required">*</span></label><input id="full_name" name="full_name" value="{{ old('full_name',$customer->full_name ?? '') }}" required maxlength="100">@error('full_name')<p class="field-error">{{ $message }}</p>@enderror</div>
    <div class="field"><label for="email">Email address <span class="required">*</span></label><input id="email" name="email" type="email" value="{{ old('email',$customer->email ?? '') }}" required maxlength="100">@error('email')<p class="field-error">{{ $message }}</p>@enderror</div>
    <div class="field"><label for="phone">Phone <span class="optional">Optional</span></label><input id="phone" name="phone" type="tel" value="{{ old('phone',$customer->phone ?? '') }}" maxlength="20">@error('phone')<p class="field-error">{{ $message }}</p>@enderror</div>
</div>
