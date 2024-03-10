<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('حذف حساب کاربری') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('با این کار تمام اطلاعات حساب کاربری شما از بین می رود') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('حذف حساب کاربری') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('مطمئن هستید میخواهید حساب کاربری خود را حذف کنید؟') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('قبل از این کار لطفا دقت کنید چون با این کار تمامی اطلاعات شما از سیستم حذف شده و قابل بازگشت نیست') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('انصراف') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('حذف') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
