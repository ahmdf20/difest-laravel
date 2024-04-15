<x-dashboard-layout>
  <x-slot name="title">{{ $title }}</x-slot>
  <div class="bg-neutral p-3 rounded-lg mx-auto max-w-7xl mt-5 text-neutral-100">
    <h1 class="text-3xl mb-4">Tabel Penilian Karya</h1>
    <hr class="py-4">
    <div class="overflow-x-auto">
      <table
        class="table"
        id="table_submission_grading"
      >
        <!-- head -->
        <thead>
          <tr>
            <th>#</th>
            <th>Karya Dari</th>
            <th>Dari Lomba</th>
            <th>Karya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if (auth()->user()->role == 'judge')
          @foreach ($submissions as $key => $submission)
          @if (auth()->user()->from_competition == $submission->user->from_competition)
          <tr>
            <th>{{ $key + 1 }}</th>
            <td>{{ $submission->user?->name }}</td>
            <td>{{ $submission->user?->from_competition }}</td>
            <td>
              <div class="dropdown dropdown-hover">
                <div
                  tabindex="0"
                  role="button"
                  class="btn m-1"
                >Lihat Karya</div>
                <ul
                  tabindex="0"
                  class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52"
                >
                  <li>
                    <a
                      href="{{ asset('storage/' . $submission->submission) }}"
                      target="_blank"
                    >Karya</a>
                  </li>
                  <li>
                    <a
                      href="{{ asset('storage/' . $submission->submission_desc) }}"
                      target="_blank"
                    >Deskripsi
                      Karya</a>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <div class="dropdown dropdown-hover">
                <div
                  tabindex="0"
                  role="button"
                  class="btn m-1"
                >Nilai</div>
                <ul
                  tabindex="0"
                  class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52"
                >
                  <li>
                    <a href="{{ route('submission-grading.penilaian-karya', ['submission' => $submission->id]) }}">Penilaian
                      Karya</a>
                  </li>
                  <li>
                    <a href="{{ route('submission-grading.penilaian-presentasi', ['submission' => $submission->id]) }}">Penilaian
                      Presentasi</a>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          @endif
          @endforeach
          @else
          @foreach ($submissions as $key => $submission)
          <tr>
            <th>{{ $key + 1 }}</th>
            <td>{{ $submission->user?->name }}</td>
            <td>{{ $submission->user?->from_competition }}</td>
            <td>
              <div class="dropdown dropdown-hover">
                <div
                  tabindex="0"
                  role="button"
                  class="btn m-1"
                >Lihat Karya</div>
                <ul
                  tabindex="0"
                  class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52"
                >
                  <li>
                    <a
                      href="{{ asset('storage/' . $submission->submission) }}"
                      target="_blank"
                    >Karya</a>
                  </li>
                  <li>
                    <a
                      href="{{ asset('storage/' . $submission->submission_desc) }}"
                      target="_blank"
                    >Deskripsi
                      Karya</a>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <a
                href="{{ route('submission-grading.detail-penilaian', ['submission' => $submission->id]) }}"
                class="btn m-1"
              >Detail Penilaian</a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $('#table_submission_grading').DataTable()
  </script>

  @if (Session::get('message'))
  <script>
    Swal.fire({
                title: `{{ Session::get('title') }}`,
                text: `{{ Session::get('message') }}`,
                icon: `{{ Session::get('icon') }}`
            })
  </script>
  @endif
</x-dashboard-layout>
