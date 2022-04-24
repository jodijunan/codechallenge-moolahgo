<div>
    <div class="mt-10 container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
            >
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-600 text-sm font-bold">
                            Find Referral Code
                        </h6>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-gray-500 text-center mb-3 font-bold">
                        <small></small>
                    </div>
                    <form id="form-referral" wire:submit.prevent="submit">
                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                for="referralCode"
                            >Referral Code</label
                            ><input
                                type="text"
                                id="referralCode"
                                name="referralCode"
                                wire:model.defer="referralCode"
                                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="Referral Code"
                                style="transition: all 0.15s ease 0s;"
                            />
                        </div>
                        <div class="text-center mt-6">
                            <div wire:loading.remove wire:target="submit">
                                <input class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                       style="transition: all 0.15s ease 0s;"
                                       type="submit" value="Find"
                                >
                            </div>

                            <div wire:loading wire:target="submit"
                                 class="bg-gray-700 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                 style="transition: all 0.15s ease 0s;"
                            >
                                <button disabled>
                                    <i class="fas fa-sync fa-spin"></i> Find
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    @php
        $data = json_decode($data);
    @endphp
    @if(!empty($data) && $data->status == true)
        <div class="container mx-auto px-4">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
                >
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-gray-600 text-sm font-bold">
                                Users owner
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-gray-400" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{ $data->data->attributes->title }} {{ $data->data->attributes->fullName }}
                        <br>
                        <small>{{ $data->data->attributes->givenName }} - {{ $data->data->attributes->surname }}</small>
                        <small>{{ $data->data->attributes->registerBy }} - {{ $data->data->attributes->email }} - {{ $data->data->attributes->phoneNumber }}</small>

                        <div class="mt-4 text-gray-500 mb-3 font-bold">
                            <small>Referral Info</small>
                            <br>
                            Code : <pre>{{ $data->data->attributes->referral->referralCode }}</pre>
                            Benefit : {{ $data->data->attributes->referral->benefit->currency }} {{ $data->data->attributes->referral->benefit->balance }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($data) && $data->status == false)
        <div class="container mx-auto px-4">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
                    >
                        <div class="rounded-t mb-0 px-6 py-6">
                            <div class="text-center mb-3">
                                <h6 class="text-gray-600 text-sm font-bold">
                                    Users owner
                                </h6>
                            </div>
                            <hr class="mt-6 border-b-1 border-gray-400" />
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            Referral code not found :/
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
