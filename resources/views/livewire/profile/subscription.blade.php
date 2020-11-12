<x-jet-action-section>
    <x-slot name="title">
        {{ __('Subscription') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Your current paid subscription.') }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="plan" value="{{ __('Plan') }}" /> {{ $plan->nickname }}
            <x-jet-label for="amount" value="{{ __('Amount') }}" /> ${{ $plan->amount/100 }}
        </div>
    </x-slot>
</x-jet-action-section>