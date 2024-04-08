<x-guest-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <section
        class="flex flex-wrap justify-center bg-kuning-difest py-[3rem]"
        aria-label="Section Our Location n Our Media"
    >
        <div class="bg-neutral w-auto p-3 rounded-lg mx-auto mt-5 text-neutral-100">
            <div class="flex justify-between mb-3 gap-[3rem]">
                <h1 class="text-3xl mb-4">Form Pendaftaran Seminar</h1>
                <a
                    href="{{ route('landing.index') }}"
                    class="btn btn-error btn-sm"
                >&times;</a>
            </div>
            <hr class="py-4">
            <form
                action="{{ route('landing.daftar-seminar.store') }}"
                method="post"
                class="grid gap-3 p-2"
                enctype="multipart/form-data"
            >
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-neutral-100">Pilih Status</span>
                    </div>
                    <select
                        class="select select-bordered w-full bg-neutral-100 text-neutral-900"
                        name="status"
                        id="status"
                    >
                        <option
                            value="pilih"
                            selected
                        >-- Pilih --</option>
                        <option value="0">Pelajar / Mahasiswa</option>
                        <option value="1">Umum</option>
                    </select>
                    @error('status')
                    <small class="text-error">{{ $message }}</small>
                    @enderror
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-neutral-100">Nama</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Inputkan Nama Lengkap"
                        class="input input-bordered bg-neutral-100 text-neutral-900"
                        name="name"
                        required
                    />
                    @error('name')
                    <small class="text-error">{{ $message }}</small>
                    @enderror
                </label>

                <label
                    class="hidden form-control w-full"
                    id="input_instance"
                >
                    <div class="label">
                        <span class="label-text text-neutral-100">Asal Kampus / Sekolah</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Inputkan No Whatsapp atau telp"
                        class="input input-bordered bg-neutral-100 text-neutral-900"
                        name="instance"
                    />
                </label>

                <label
                    class="hidden form-control w-full"
                    id="address"
                >
                    <div class="label">
                        <span class="label-text text-neutral-100">Alamat</span>
                    </div>
                    <textarea
                        placeholder="Inputkan Alamat lengkap"
                        class="textarea textarea-bordered bg-neutral-100 text-neutral-900"
                        name="address"
                    ></textarea>
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-neutral-100">No Telp <small class="text-error">* yang dapat
                                dihubungi</small></span>
                    </div>
                    <input
                        type="text"
                        placeholder="Inputkan No Whatsapp atau telp"
                        class="input input-bordered bg-neutral-100 text-neutral-900"
                        name="phone"
                        required
                    />
                    @error('phone')
                    <small class="text-error">{{ $message }}</small>
                    @enderror
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-neutral-100">Apakah akan datang ke acara secara offline?</span>
                    </div>
                    <select
                        class="select select-bordered w-full bg-neutral-100 text-neutral-900"
                        name="is_offline"
                        id="is_offline"
                    >
                        <option
                            value="pilih"
                            selected
                        >-- Pilih --</option>
                        <option value="0">Ya</option>
                        <option value="1">Tidak</option>
                    </select>
                    @error('is_offline')
                    <small class="text-error">{{ $message }}</small>
                    @enderror
                </label>

                <label
                    class="form-control w-full hidden"
                    id="input_payment_method"
                >
                    <div class="label">
                        <span class="label-text text-neutral-100">Pilih metode pembayaran yang digunakan</span>
                    </div>
                    <select
                        class="select select-bordered w-full bg-neutral-100 text-neutral-900"
                        name="payment_method"
                        id="payment_method"
                    >
                        <option
                            value="pilih"
                            selected
                        >-- Pilih --</option>
                        <option value="0">Cash</option>
                        <option value="1">Transfer</option>
                    </select>
                    <small>Note :</small>
                    <small class="text-error w-96">
                        Untuk siswa / mahasiswa diluar polsub disarankan untuk
                        transfer.
                    </small>
                    <small class="text-error w-96">
                        Untuk biaya tiket masuk sebesar Rp. 10.000, dan dapat ditransferkan ke BRI 438901006718502 a.n
                        Nasywa Fawziah Abror dan DANA 082319159717 a.n Stela Noer Rosa.
                    </small>
                </label>

                <label
                    class="form-control w-full hidden"
                    id="input_upload_payment"
                >
                    <div class="label">
                        <span class="label-text text-neutral-100">Bukti Pembayaran</span>
                    </div>
                    <input
                        type="file"
                        placeholder="Inputkan No Whatsapp atau telp"
                        class="file-input file-input-bordered bg-neutral-100 text-neutral-900"
                        name="upload_payment"
                        id="upload_payment"
                    />
                </label>

                <button
                    class="btn btn-success"
                    type="submit"
                >Daftar</button>
            </form>
        </div>
    </section>


    <script>
        const status = document.getElementById('status')
        const instance = document.getElementById('input_instance')
        const address = document.getElementById('address')
        const is_offline = document.getElementById('is_offline')
        const input_payment_method = document.getElementById('input_payment_method')
        const payment_method = document.getElementById('payment_method')
        const input_upload_payment = document.getElementById('input_upload_payment')
        const upload_payment = document.getElementById('upload_payment')

        status.addEventListener('change', () => {
            if (status.value === '0') {
                instance.classList.remove('hidden')
                address.classList.add('hidden')
            } else if (status.value === '1') {
                instance.classList.add('hidden')
                address.classList.remove('hidden')
            } else {
                instance.classList.remove('hidden')
                address.classList.remove('hidden')
            }
        })

        is_offline.addEventListener('change', () => {
            if (is_offline.value === '0') {
                input_payment_method.classList.remove('hidden')
            } else {
                input_payment_method.classList.add('hidden')
            }
        })

        payment_method.addEventListener('change', () => {
            if (payment_method.value === '1') {
                input_upload_payment.classList.remove('hidden')
                upload_payment.setAttribute('required', 'true')
            } else {
                input_upload_payment.classList.add('hidden')
                upload_payment.removeAttribute('required')
            }
        })
    </script>
</x-guest-layout>