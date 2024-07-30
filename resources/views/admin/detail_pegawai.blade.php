 
<div class="row ml-1">
    <div class="col-sm-6 border p-0">
        <div class="bg-dark p-2 mb-2">Detail Pegawai</div>
        <table class="p-2 col-sm-12">
             
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
    <div class="mx-2 col-sm-5 border p-0"> 
        <div class="bg-info p-2 mb-4">Detail Cuti</div>
        <table class="p-2 col-sm-12">
            <tr>
                <td class="col-sm-4 text-primary">No & Tgl Permohonan Cuti   </td>
                <td class="col-sm-1 text-primary">:</td>
                <td class=" text-primary">
                    <?php 
                     $tglcuti=Carbon::parse($pc->tgl_pc)->isoFormat('DD MMMM YYYY');    
                    ?>
                    {{ $pc->no_pc }} / {{$tglcuti}}</td>
            </tr>
            <tr>
                <td class="col-sm-4" colspan="3"> &nbsp; </td>
                 
            </tr> 
            <tr>
                <td class="col-sm-4">Jenis Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $pc->getJC->nm_jenis_cuti }}</td>
            </tr>
            <tr>
                <td class="col-sm-4">Periode Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> 
                    <?php 
                         $tglawalna=Carbon::parse($pc->tgl_mulai)->isoFormat('DD MMMM YYYY');
                         $tglakhirna=Carbon::parse($pc->tgl_selesai)->isoFormat('DD MMMM YYYY');    
                    ?>
                    <b>{{$tglawalna}}</b> s/d <b>{{$tglakhirna}}</b> 
                </td>
            </tr>
            <tr>
                <td class="col-sm-4">Lama cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $pc->lama_cuti }} hari</td>
            </tr>
            <tr>
                <td class="col-sm-4">Alasan Cuti   </td>
                <td class="col-sm-1">:</td>
                <td> {{ $pc->alasan }}</td>
            </tr>
             
           
            <tr>
                <td class="col-sm-4">Alamat Selama Cuti </td>
                <td class="col-sm-1">:</td>
                <td> {{ $pc->alamat_cuti }}</td>
            </tr>
           
             
            
        </table>
    </div>
</div>
<div class="row p-2 mt-2">
    <div class="col-sm-9"></div>
    <div class="col-sm-2"><a href="#modal_riwayatcuti" data-toggle="modal" data-idpegawai="{{$peg->id_pegawai}}" data-nopc="{{$pc->no_pc}}" class="btn btn-primary"> <i class="fa fa-search"></i> Cek Riwayat Cuti</a></div>
</div>



              
             