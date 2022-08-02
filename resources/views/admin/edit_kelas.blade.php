@include('admin.layouts.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        @include('admin.layouts.sidebar')
        <!-- Layout container -->
        <div class="layout-page">
          @include('admin.layouts.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                  <div class="card">
                      <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stiped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nis</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Tahun Ajar</th>
                                   <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $account)
          <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
            <td>{{ $account->username }}</td>
            <td>{{ $account->name }}</td>
            <form action="{{route('data-kelas.update', $account->id)}}" method='post'>
                @method('PUT')
                @csrf
                <td>
                    <select class="form-select" name="kelas">
                    <option selected>{{ $account->kelas}} </option>
                    <option value="1 Madrasah">1 Madrasah </option>
                    <option value="2 Madrasah">2 Madrasah </option>
                    <option value="3 Madrasah">3 Madrasah </option>
                    <option value="4 Madrasah">4 Madrasah </option>
                    <option value="5 Madrasah">5 Madrasah </option>
                    <option value="6 Madrasah">6 Madrasah </option>
                </select>
                </td>
                <td>
                    <select class="form-select" name="tahun_ajar">
                        @for ($i=date('Y'); $i>=date('Y')-32; $i-=1)
                            <option value='{{$i.'-'.$i+1}}'> {{$i.'-'.$i+1}} </option>
                        @endfor
                    
                   
                </select>
                </td>
            
            
            <td><button type="submit" class="btn btn-sm btn-success">Update</button></td>
          </tr>
          </form>
          @endforeach
                            </tbody>
                        </table>
                    </div>
                      </div>
                    <!-- </div>
    <div class="row"> -->
    <div class="page-bottom" style="margin: 20px">
        <br/>
        <!-- pagination -->
          Current Page: {{ $accounts->currentPage() }}<br>
          Jumlah Data: {{ $accounts->total() }}<br>
          Data perhalaman: {{ $accounts->perPage() }}<br>
          <br>
          {{ $accounts->links() }}
       </div>
              </div>
            </div>
            <!-- / Content -->
            @include('admin.layouts.foot')
           