 
<?php 
// echo"Kdsub ".$uniqid;
// echo"Bidang ".$kdbidang;
?> 

 <script src="{{url('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
 <script src="{{url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
 <script> 
     $ ( function () {
         $('#tablena').DataTable(
            {
                "dom": 'rftip'
            }
         );
     })
 </script>            
 <div class="row">
    <div class="col-sm-12 border mb-2 p-1"> 
        <table class="p-2 col-sm-8">
             
            <tr>
                <td class="col-sm-4">Nama   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->nama_pegawai }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">NIP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->nip }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Unit Kerja   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->getUN->nm_unitkerja }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Jabatan   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->getJAB->nm_jabatan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Pangkat/Gol   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->getPANG->nm_pangkat }} - {{ $peg->getGOL->nm_golongan }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">No.HP   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->nohp }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Alamat   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $peg->alamat }}</td>
            </tr>
            <tr>
                <td class="col-sm-4" colspan="3"> &nbsp; </td>
                 
            </tr>
             
            
        </table>

    </div>
 </div>
    <table class="table table-sm  table-bordered" id="tablena">
        <thead class="bg-info">
        <tr>
             
            <th> No.PC </th>
           
            <th> Jenis cuti </th>
            <th> Tanggal Awal Cuti </th>
            <th> Tanggal Akhir Cuti </th>
            <th> Alasan </th>
            <th> Verifikasi Atasan Langsung </th>
            <th> Catatan Atasan </th> 
           

        </tr>
        </thead>
        <tbody>
            @foreach ($aju as $aju)
            <?php 
               
            ?>
            <tr>
               
                <td>{{ $aju->no_pc }} </td>
               
                
                <td>{{ $aju->getJC->nm_jenis_cuti }} </td>
                <td>{{ $aju->tgl_mulai }} </td>
                <td>{{ $aju->tgl_selesai }}</td>
                <td>{{ $aju->alasan }}</td>
                <td>
                    @if(empty($aju->getFPPC->atasan_langsung))
                    <div class="text-danger small">Belum Verifikasi Atasan</div> 

                     
                        
                    @else
                    <div>{{ $aju->getFPPC->atasan_langsung }}</div> 
                    <div>No. & Tgl. FPPC : {{ $aju->getFPPC->no_fppc }} / {{ $aju->getFPPC->tgl_fppc }}</div> 
                    
                    @endif
                </td>
                <td class="text-center">
                    @if(empty($aju->getFPPC->atasan_langsung))
                    <div class="text-danger small">Belum Verifikasi Atasan</div> 

                     
                        
                    @else
                    <div>{{ $aju->getFPPC->catatan_atasan }}</div> 
                    
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>            
 
              
             