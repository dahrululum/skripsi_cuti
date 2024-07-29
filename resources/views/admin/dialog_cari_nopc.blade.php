 
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
 
    <table class="table table-sm    table-bordered" id="tablena">
        <thead class="bg-info">
        <tr>
             
            <th> No.PC </th>
            <th> NIP/Nama Pegawai </th>
            <th> Jenis cuti </th>
            <th> Tanggal Awal Cuti </th>
            <th> Tanggal Akhir Cuti </th>
            <th> Alasan </th>
             
            <th> #  </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($aju as $aju)
            <?php 
               
            ?>
            <tr>
               
                <td>{{ $aju->no_pc }} </td>
                <td>{{ $aju->getPEG->nama_pegawai }}
                    <div class="small">{{ $aju->getPEG->nip }}</div>
                </td>
                
                <td>{{ $aju->getJC->nm_jenis_cuti }} </td>
                <td>{{ $aju->tgl_mulai }} </td>
                <td>{{ $aju->tgl_selesai }}</td>
                <td>{{ $aju->alasan }}</td>
                 
                <td class="text-center">
                    <a class="btn btn-success btn-xs" href="javascript:" onclick="return getBACK('<?=$aju->no_pc?>','<?=$aju->id_pegawai?>')"><i class="fa fa-edit"></i> Pilih</a>
                    
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>            
 
              
             