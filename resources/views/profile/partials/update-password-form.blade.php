<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-row">
            <label class="field-label">Password Saat Ini</label>
            <div>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="form-row">
            <label class="field-label">Password Baru</label>
            <div>
                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="form-row">
            <label class="field-label">Konfirmasi Password</label>
            <div>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex items-center gap-4">
            <button type="submit" class="btn-save shadow-md" style="width: auto; padding: 0.75rem 2.5rem;">PERBARUI PASSWORD</button>

            @if (session('status') === 'password-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-emerald-600 font-semibold text-sm bg-emerald-50 px-4 py-2 rounded-full border border-emerald-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Berhasil disimpan
                </div>
            @endif
        </div>
    </form>
</section>
